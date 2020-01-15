@extends('admin.master')


@section('content')<br>

    <tbody>
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

</table>
@endsection
