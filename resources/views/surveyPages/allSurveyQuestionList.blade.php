{{-- used module --}}




@extends('admin.master')
@section('content')<br>
@include('Messages.message')

<div class="container">
    <form action="/allSurveyQuestionList" method="get">
        <select name="survey">
            @foreach ($data3 as $key => $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Survey Questionaire</th>
            <th scope="col">Change</th>
            <th scope="col">Remove</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($qus as $question)
                <tr>
                    <td>{{$question->info->name}}</td>
                    <td><a href="/allSurveyQuestionList/{{$question->info->id}}">Edit</a></td>
                    <td>
                        <form action="/allSurveyQuestionListupdate/{{$question->info->id}}/delete" method="POST">
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection

























{{-- @section('content')

<table class="table">
    @foreach ( $qus as $question )
    <tr>
        <td>
            {{$question->info->name}}
        </td>
        <td>
            <br><a href="/allSurveyQuestionList/{{$question->info->id}}">Edit</a>
        </td>
        <br>
    </tr>
    @endforeach
</table>

@endsection --}}







{{-- @section('content')
<html>
        <b><font size="5">All Survey Questionaire : </font></b><br><br>

        @foreach ($qus as $question)

            <h3>
                <input type="hidden" name="question_h[]" value="{{$question->info->id}}">
                &#8718; {{$question->info->name}}
            </h3>
            @foreach ($question->options as $option)
                <input type="checkbox" name="option[]" value="{{$option->id}}"> {{$option->options}}
            @endforeach

            <br><a href="/allSurveyQuestionList/{{$question->info->id}}">Edit</a><br><br>


        @endforeach

    <br><input type="submit" value="Submit">

</html>
@endsection --}}










