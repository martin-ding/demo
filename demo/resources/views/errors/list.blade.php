@if($errors->any())
    <div class="alert-danger alert">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif