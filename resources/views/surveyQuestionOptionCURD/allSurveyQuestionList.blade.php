{{-- used module --}}




@extends('admin.master')
@section('content')<br>
@include('Messages.message')

<div class="container">


    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Survey Questions</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <form action="/allSurveyQuestionList" method="get">
                    <div class="box-body">
                        <div class="input-group input-group-sm">
                            <select class="form-control" name="survey">
                                <option value="0">All</option>
                                @foreach ($data3 as $key => $data)
                                    @if ($data->id==$survey_id)
                                     <option selected value="{{$data->id}}">{{$data->name}}</option>
                                    @else
                                     <option value="{{$data->id}}">{{$data->name}}</option>

                                    @endif

                                @endforeach

                            </select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </span>

                        </div>

                    </div>
                </form><br>



                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>SL No.</th>
                    <th>Survey Questionaire</th>
                    <th>Change</th>
                    <th>Remove</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach ($qus as $key => $question)
                        <tr>
                            <td><br>{{$key+1}}.</td>
                            <td><br>{{$question->info->name}}</td>
                            <td><a href="/allSurveyQuestionList/{{$question->info->id}}" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
                            <td>
                                <form action="/allSurveyQuestionListupdate/{{$question->info->id}}/delete" method="POST">
                                    @csrf
                                    <button style="color:red" class="btn btn-app" type="submit"><i style="color:red;" class="fa fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tr>
                  </tbody>
                  <tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

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










