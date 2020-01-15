 {{-- used module --}}

 @extends(\Auth::check() ? 'admin.master' : 'user.master')

@section('content')


<div class="container">
    @include('Messages.message')
    <table class="table table-striped">
        <tr style="counter-increment: rowNumber">
          {{-- using '$qus[0]->info->surveyautoid' at form action to get desire id from qus --}}
            <form action="/surveyList/{{$qus[0]->info->surveyautoid}}/store" method="post">
                @csrf
                <br>
                <b><font size="5">Survey Questionaire : </font></b><br>
                <br>Profession :
                <br><div style="padding-top: 5px"><input type="text" name="profession"></div>
                @foreach ($qus as $question)
                    <h3>
                        <input type="hidden" name="question_h[]" value="{{$question->info->id}}">

                        {{-- <input type="" name="question" value="{{$question->info->id}}"readonly> {{$question->info->name}} --}}
                        &#8718; {{$question->info->name}}
                    </h3>
                    @foreach ($question->options as $option)
                        <input type="checkbox" name="option[]" value="{{$option->id}}"> {{$option->options}}<br>
                    @endforeach
                @endforeach
            <br><input type="submit" value="Submit">
            </form>
        </tr>
    </table>
</div>
@endsection



