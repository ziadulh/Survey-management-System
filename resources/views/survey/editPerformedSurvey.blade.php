@extends('layouts.app')

@section('content')
<html>
    <form action="/storeSurvey" method="post">
        @csrf


        <b><font size="5">Survey Questionaire : </font></b><br>

        <br>User ID :
        <br><input type="text" name="user_name"><br><br>

        @foreach ($qus as $question)

            <h3>
                <input type="hidden" name="question_h[]" value="{{$question->info->id}}">
                &#8718; {{$question->info->name}}
            </h3>
            @foreach ($question->options as $option)
                <input type="checkbox" name="option[]" value="{{$option->id}}"> {{$option->options}}<br>
            @endforeach

        @endforeach

    <br><input type="submit" value="Submit">
    </form>





    </form>
</html>
@endsection









