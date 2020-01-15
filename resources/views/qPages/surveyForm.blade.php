{{-- @extends('layouts.app')

@section('content')
<html>
    <form action="/storeSurvey" method="post">
        @csrf
        {{-- @foreach ($data as $first)
            <P>{{$first->id}}. {{$first->name}}</P>
            @foreach ($data as $second)
            {{$first->id}}
                @if ($first->id == $second->survey_auto_id)
                    {{$second->options}}
                @endif
            @endforeach
        @endforeach --}}

        <b><font size="5">Survey Questionaire : </font></b><br><br>
        @foreach ($qus as $key => $question)

            <h3>
                <input type="hidden" name="question_h[]" value="{{$question->info->id}}">

                {{-- <input type="" name="question" value="{{$question->info->id}}"readonly> {{$question->info->name}} --}}
                &#8718; {{$question->info->name}}
            </h3>
            @foreach ($question->options as $option)
                <input type="checkbox" name="option[]" value="{{$option->id}}"> {{$option->options}}<br>
            @endforeach
            // here to start
            <a href="/performsurvey/questionaire/{{$qus[$key]->info->id}}">Edit</a>

        @endforeach


        {{-- @foreach ($qus as $option)

            <h3 >
                <input type="" name="question[]" value="{{$option->id}}"> {{$option->options}}
                &#8718; {{$value->info->name}}
            </h3>
            @foreach ($value->options as $option)
                <input type="checkbox" name="option[]" value="{{$option->id}}"> {{$option->options}}<br>
            @endforeach

        @endforeach --}}

    <br><input type="submit" value="Submit">
    </form>





    </form>
</html>
@endsection







 --}}
