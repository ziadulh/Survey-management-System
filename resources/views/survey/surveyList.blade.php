@extends('layouts.app')

@section('content')
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Survey Performer ID</th>
            <th scope="col">Performer Name</th>
          </tr>
        </thead>
        @foreach ($data as $data)
        <tbody>
            <tr>
              <th scope="row">{{$data->id}}</th>
              <td><a href="performedSurveyList/{{$data->id}}">{{$data->name}}</a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection

