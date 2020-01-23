{{-- @if(isset(Auth::user->id()))
    @extends('user.master')
@else
    @extends('admin.master')
@endif --}}
{{-- Line under this comment is trinary logic for set extends according to user type --}}
@extends(\Auth::check() ? 'admin.master' : 'user.master')




{{-- @extends('user.master') --}}

{{-- @extends('layouts.app') --}}
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    @section('content')




				<div class="container">
                    @if (Auth::check())
                    @include('Messages.message')
                    @else
                    <font size="4" color="Green">@include('Messages.message')</font><br>
                    @endif


				  <table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Name</th>
				        <th>Expired Date</th>
                        <th>Published Date</th>
                        @if (Auth::check())
                            <th></th>
                            <th></th>
                        @endif

				      </tr>
				    </thead>
			@foreach($data as $data)
				    <tbody>

                        @if (!Auth::check())
                            @if (($data->edate) >= date("Y-m-d"))

                                <tr>
                                    <td><a  href='surveyList/{{$data->id}}'>{{$data->name}}</a></td>
                                    <td>{{$data->edate}}</td>
                                    <td>{{$data->pdate}}</td>
                                    @if (Auth::check())
                                        <td><a href="surveyList/{{$data->id}}/edit">Edit</a></td>
                                        <td>
                                            <form action="surveyList/{{$data->id}}/delete" method="POST">
                                                @csrf
                                                <button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @endif
                        @if (Auth::check())
                            <tr>
                                    <td><a  href='surveyList/{{$data->id}}'><br>{{$data->name}}</a></td>
                                    <td><br>{{$data->edate}}</td>
                                    <td><br>{{$data->pdate}}</td>
                                    @if (Auth::check())
                                        <td><a href="surveyList/{{$data->id}}/edit" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
                                        <td>
                                            <form action="surveyList/{{$data->id}}/delete" method="POST">
                                                @csrf
                                                <button style="color:red" class="btn btn-app" type="submit"><i style="color:red;" class="fa fa-trash"></i>Delete</button>
                                            </form>
                                        </td>
                                    @endif
                            </tr>
                        @endif

				    </tbody>
			@endforeach
				  </table>
                </div>


    @endsection



</body>
</html>




