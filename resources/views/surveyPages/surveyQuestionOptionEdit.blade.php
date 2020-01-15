{{--
<form action="/performsurvey/questionaire/{{$data2[0]->que_auto_id}}/update" method="post">
    @csrf

    <select>
        @foreach ($data3 as $data)
            <option value="{{$data->name}}">{{$data->name}}</option>
        @endforeach
    </select><br>

    @foreach ($data1 as $data)
        <input type="text" name="name" placeholder="{{$data->name}}">
        <br>
    @endforeach


    @foreach ($data2 as $data)
        <input type="text" name="options" placeholder="{{$data->options}}"><br>
    @endforeach
    <br><br>
    <input type="submit" value="Submit">

</form> --}}
