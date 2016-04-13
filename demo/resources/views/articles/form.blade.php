<div class="form-group">
    {!! Form::label('title',"Title:") !!}
    {!! Form::text('title',null,['class'=>"form-control" ]) !!}
</div>
<div class="form-group">
    {!! Form::label('body',"Body:") !!}
    {!! Form::textarea('body',null,['class'=>"form-control" ]) !!}
</div>
<div class="form-group">
    {!! Form::label("tags","Tag:") !!}
    {!! Form::select("tags[]",$tags,$tag_list,['class'=>"form-control",'multiple' ]) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at',"Published On:") !!}
    {!! Form::input('date',"published_at",Carbon\Carbon::now()->format("Y-m-d"),['class'=>"form-control" ]) !!}
</div>
<div class="form-group">
    {!! Form::submit( "$buttonText" ,['class'=>'btn btn-primary form-control']) !!}
</div>