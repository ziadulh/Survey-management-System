@extends('admin.master')

@section('content')
@include('Messages.message')

<form role="form" action="/survey/store" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label>Survey Title</label>
            <select class="form-control" name="surveyautoid">
                @foreach ($data as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Question:</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Option 1:</label>
            <input type="text" class="form-control" name="option[]">
        </div>

        <div class="form-group">
            <label>Option 2:</label>
            <input type="text" class="form-control" name="option[]">
        </div>

        <div class="form-group">
            <label>Option 3:</label>
            <input type="text" class="form-control" name="option[]">
        </div>

        <div class="form-group">
            <label>Option 4:</label>
            <input type="text" class="form-control" name="option[]">
        </div>

        <div class="form-group">
            <label>Option 5:</label>
            <input type="text" class="form-control" name="option[]">
        </div>
        <br>
        <div>
            <select class="form-control" name="publish">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div><br>

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div><br>
    </div>
</form>

@endsection




