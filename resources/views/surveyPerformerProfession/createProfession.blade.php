@extends('admin.master')


@section('content')
@include('Messages.message')

  <form role="form" action="/surveyProfessionCreatorForm/store" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label {{--for="exampleInputEmail1" --}}>Enter a Profession</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Profession" name="profession">
        </div>

        <div>
            <select class="form-control" name="publish">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div><br>

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
@endsection








