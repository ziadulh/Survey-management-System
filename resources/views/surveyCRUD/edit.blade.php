@extends('admin.master')

@section('content')
@include('Messages.message')

    <form role="form" action="/surveyList/{{$data->id}}/update" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Survey Name</label>
                <input type="text" class="form-control" name="sname" value ='{{$data->name}}'>
            </div>

            <div class="form-group">
                <label>Experied Date:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" value="{{$data->edate}}" name="edate">
                </div>
                <!-- /.input group -->
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


@section('jsscript')
        <script>
            $(document).ready(function() {
                $("#reservation").datepicker({
                    format: 'yyyy-mm-dd'
                });
                });
        </script>
@endsection



