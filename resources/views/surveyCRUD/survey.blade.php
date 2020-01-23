@extends('admin.master')


@section('content')<br>

    {{-- <tbody>
        <tr>
            @include('Messages.message')
            <div style="padding-left:20px">
                <form action="/store" method = 'POST'>
                    @csrf
                        <b>Survey Name:</b></b><br>
                        <input type="text" name="sname" >
                        <br>
                        Expire Date:<br>
                        <input type="date" name="edate">
                        <br>
                        Published:<br>
                        <input type="date" name="pdate">
                        <br><br>
                        <input type="submit" value="Submit">
                    </form>

            </div>
        </tr>
    </tbody>

</table> --}}

@include('Messages.message')

<form role="form" action="/store" method="post">
    @csrf
    <div class="box-body">
        <div class="form-group">
            <label>Survey Name</label>
            <input type="text" class="form-control" name="sname">
        </div>

        {{-- <div class="form-group">
            <label>Expire Date:</label>
            <input type="date" class="form-control" name="edate">
        </div> --}}

        <div class="form-group">
            <label>Experied Date:</label>

            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="reservation" name="edate">
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

{{-- // to get calender date --}}
@section('jsscript')
        <script>
            $(document).ready(function() {
                $("#reservation").datepicker({
                    format: 'yyyy-mm-dd'
                });
                });
        </script>
@endsection
