{{-- @if(isset(Auth::user->id()))
    @extends('user.master')
@else
    @extends('admin.master')
@endif --}}

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
                    <font size="4" color="Green">@include('Messages.message')</font><br>

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

				    </tbody>
			@endforeach
				  </table>
                </div>

	@endsection

</body>
</html>
