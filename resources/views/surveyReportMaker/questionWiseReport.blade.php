{{-- {{dd($arr[0])}} --}}


//
@foreach ($arr as $ar)
    {{$ar->que}}<br>

    @foreach ($ar->opt as $k => $d)<br>

    {{$d}}  {{"   :   "}}  {{$ar->selection[$k]}}

    @endforeach<br>

@endforeach
