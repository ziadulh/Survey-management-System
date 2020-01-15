@extends('admin.master')

@section('content')
    <div style="padding-left:20px">
        <form action="/surveyList/{{$data->id}}/update" method = 'post'>
            @csrf
            <br>
                Survey Name:<br>
                <input type="text" name="sname" value ='{{$data->name}}'>
                <br>
                Expire Date:<br>
                <input type="date" name="edate" value ='{{$data->edate}}'>
                <br>
                Published:<br>
                <input type="date" name="pdate" value ='{{$data->pdate}}'>
                <br><br>
                <input type="submit" value="Update">
            </form>
    </div>

@endsection
