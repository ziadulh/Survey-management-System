@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <font size="6" color="red">{{$error}}</font>
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        *{{session('success')}}<br>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
