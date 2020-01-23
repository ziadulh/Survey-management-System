


@extends('admin.master')


@section('content')
  <form role="form" action="/surveyProfessionList/{{$allDataFromSurveyProfessionTable->id}}/updated" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label>Enter a Profession</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$allDataFromSurveyProfessionTable->profession}}" name="profession">
        </div>

        <div>
            <select class="form-control" name="publish">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div><br>

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
  </form>
@endsection









