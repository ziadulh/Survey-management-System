{{-- used module --}}
@extends('admin.master')

@section('content')
<div style="padding-left:20px">
    <form action="/allSurveyQuestionListupdate/{{$data1[0]->id}}" method="post">
        @csrf
    @method('post')

        <select name="surveyautoid">
            @foreach ($data3 as $key => $data)
                <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
        </select><br><br>


            <input type="text" name="name" value="{{$data1[0]->name}}"><br><br>


        @foreach ($data2 as $data)
            <input type="text" name="option[{{$data->id}}]" value="{{$data->options}}"><br><br>
        @endforeach


        <button type="submit">update</button>
    </form>
</div>


@endsection
