 {{-- used module --}}

 {{-- @extends(\Auth::check() ? 'admin.master' : 'user.master') --}}
 @extends('user.master')

@section('content')
<form role="form" action="/surveyList/{{$qus[0]->info->surveyautoid}}/store" method="post">
    @csrf
    <div class="container">

        <div class="box-body">

            <div class="form-group" style="padding-left:30px">
                <label>What is your profession?</label><br><br>
                <select class="form-control" name="profession">
                    @foreach ($profession as $profession)
                        <option value="{{$profession->id}}">{{$profession->profession}}</option>
                    @endforeach
                </select><br>
            </div><br><br>

            @foreach ($qus as $key => $question)
                <div class="form-group" style="padding-left:30px">
                    <input type="hidden" class="form-control" name="question_h[]" value="{{$question->info->id}}">
                    <label>{{$key+1}}. {{$question->info->name}}</label><br><br>
                    @foreach($question->options as $option)
                        <div class="checkbox">
                            <label>
                            <input type="checkbox"name="option[]" value="{{$option->id}}">{{$option->options}}<br>
                            </label>
                        </div>
                    @endforeach
                </div><br><br>
            @endforeach

            {{-- @if(Auth::check())
                <div style="padding-left:30px">
                    <select class="form-control" name="publish">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div><br>
            @endif --}}

            <div class="box-footer" style="padding-left:30px">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>

    </div>



</form>
@endsection



