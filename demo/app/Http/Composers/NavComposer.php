<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

class NavComposer{

    public function compose(View $view){
        $view->with('latest',\App\Article::latest()->first());
    }
}