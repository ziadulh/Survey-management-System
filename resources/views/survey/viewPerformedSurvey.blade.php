@extends('layouts.app')

@section('content')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Question</th>
            <th scope="col">answer</th>
            <th scope="col">Changes Answer</th>
        </tr>
        </thead>
        @foreach ($data as $d)
            <tbody>
                <tr>
                <th>{{$d->name}}<br></th>
                <td>{{$d->options}}<br><br></td>
                <td><a href="/performedSurveyList/1/edit">Edit<br><br></a></td>
                </tr>
            </tbody>
        @endforeach
    </table>



@endsection





