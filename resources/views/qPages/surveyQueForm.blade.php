@extends('admin.master')

@section('content')
@include('Messages.message')

<h2 style="padding:10px">Questionaire</h2>

<form action="/survey/store" method = 'POST' style="padding-left:30px">
    @csrf
        <b>Survey Title</b>:<br>
        <select name="surveyautoid">
            @foreach ($data as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
        <br>
        <b>Question</b> :<br>
        <input type="text" name="name" value="{{ old('name') }}">
        <br>

        Option 1 : <br>
        <input type="text" name="option[]">
        <br> Option 2 : <br>
        <input type="text" name="option[]">
        <br> Option 3 : <br>
        <input type="text" name="option[]">
        <br> Option 4 : <br>
        <input type="text" name="option[]">
        <br> Option 5 : <br>
        <input type="text" name="option[]">




        <br><br><input type="submit" value="Submit">
    </form>

@endsection




