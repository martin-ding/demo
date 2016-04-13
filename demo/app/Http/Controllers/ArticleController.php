<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;

class ArticleController extends Controller{
    //

    function __construct(){

        $this->middleware('auth', ['only' => 'create']);
//        $this->middleware("auth",['except'=>'create']);

    }

    function index(){
//        $articles = Article::all();
//        $articles=Article::latest()->get();//get the last item first
        $articles = Article::orderBy('created_at', 'desc')->get();
//        $articles=Article::latest()->where('published_at','<=',Carbon::now())->get();
//        $articles=Article::latest()->unpublished()->get();
        return view("articles.all", compact("articles"));

    }

    /**
     * @param Article $article
     * @return $this
     */
    function show(Article $article){
//        dd($id);
//        $article = Article::find($id);
//        dd($article->published_at);
//        dd($article->created_at->addDays(8)->format("Y-m-d"));
//        dd($article->created_at->addMinutes(8)->diffForHumans());//generate a string like "41 minutes ago" cool
        return view('articles.show')->with('article', $article);
    }

    function create(){
//        $tags = Tag::lists('name','name');
        $tags = Tag::lists('name','id');
        return view('articles.create',compact('tags'));
    }

    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function store(CreateArticleRequest $request){


        //or you can you valiate function just like we define in
        //CreateArticleRequest

        $this->validate($request, ['title' => 'required']);

        $tags = $request->input('tags');
//        $inputs=Request::all();
//        $inputs['published_at']=Carbon::now();
//        $article=new Article;
//        $article->title="";

//        $article= new Article(['title'=>""]);

//        $request_arr=$request->all();
//        $request_arr['user_id']=\Auth::user()->id;



//        $article = new Article($request->all());
////        if you use Auth::user()->articles //it was a collection
//        Auth::user()->articles()->save($article);

        //和上面的几行代码是一样的

        $artice = Auth::user()->articles()->create($request->all());
        $artice->tags()->attach($tags);

//        Article::create(Request::all());
//        redirect(action("ArticleController@index"));
//        \Session::flash('flash_msg','your article has been created!');
//        flash()->success('your article has been created!');
        flash()->overlay("you have created an article!",'good job!');
//        session()->flash('flash_msg','your article has been created!');
//        session()->flash('flash_important','your article has been created!');
        return redirect('articles');
    }

    public function edit(Article $article){
        $tag_list = [1,2];

        $tags = Tag::lists('name','id');
//        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article','tags','tag_list'));

    }

    public function update(Article $article, CreateArticleRequest $request){
        $tags = $request->input('tags');
//        $article->tags()->detach($tags);
        $article->tags()->sync($tags);
        $article->update($request->all());
        return redirect('articles');
    }
}

