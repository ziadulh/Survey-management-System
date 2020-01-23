{{-- used module --}}
@extends('admin.master')

@section('content')
{{-- <div style="padding-left:20px">
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
</div> --}}

<form role="form" action="/allSurveyQuestionListupdate/{{$data1[0]->id}}" method="post">
    @csrf
    <div class="box-body">
        <label>Survey Title</label>
        <div class="form-group">
            <select class="form-control" name="surveyautoid">
                @foreach ($data3 as $key => $data)
                    @if ($data->id == $surveyId)
                        <option selected value="{{$data->id}}">{{$data->name}}</option>
                    @else
                        <option value="{{$data->id}}">{{$data->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>Survey Question</label>
            <input type="text" class="form-control"name="name" value="{{$data1[0]->name}}">
        </div>
        <div class="form-group">
            <label>Question Options</label>
            @foreach ($data2 as $data)
                <input type="text" class="form-control" name="option[{{$data->id}}]" value="{{$data->options}}"><br>
            @endforeach
        </div>

        <div>
            <select class="form-control" name="publish">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
    </div>




    <br><div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


@endsection
