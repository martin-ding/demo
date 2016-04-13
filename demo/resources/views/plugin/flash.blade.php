@if(Session::has('flash_msg'))

    <div class="alert alert-success {{ Session::has('flash_important')? 'alert-important':'' }}">
        @if(Session::has('flash_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times;</button>
        @endif
        {{ session()->get('flash_msg') }}
        {{--{{session('flash_msg')}}--}}
    </div>
@endif