@extends('admin.master')
@section('content')


<form action="/surveyReport" method="get">
    <div class="box-body">
        <h3>Select Survey to get specific data </h3>
        <div class="input-group input-group-sm">

            <select class="form-control" name="survey">
                <option value="0">All</option>
                    @foreach ($survey as $key => $syrvey)
                        @if ($syrvey->id==$survey_id)
                            <option selected value="{{$syrvey->id}}">{{$syrvey->name}}</option>

                        @else
                            <option value="{{$syrvey->id}}">{{$syrvey->name}}</option>

                        @endif
                    @endforeach
            </select>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Submit</button>
            </span>
        </div>
    </div>
</form>



<div class="box-body">
    <table class="table table-bordered">
        <tbody>
          <tr>
            <th >Survey ID</th>
            <th >Question</th>
            <th>Option Name</th>
            <th>Occurence</th>
            <th>Out of</th>
            <th>Occurence G.View</th>
            <th>Out of P.view</th>
          </tr>

          @foreach ($optionArray as $a)

          <tr>
            @if(count($a->Occurence))
                <td>{{$a->ansID->survey_auto_id}}</td>
                <td>{{$a->que->name}}</td>
                <td>{{$a->ansID->options}}</td>
                <td>{{count($a->Occurence)}}</td>
                <td>{{count($a->OccurenceOutOf)}}</td>
                <td>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: {{(count($a->Occurence)/count($a->OccurenceOutOf))*100}}%"></div>
                    </div>
                </td>
                <td><span class="badge bg-red">{{number_format(((count($a->Occurence)/count($a->OccurenceOutOf))*100),2)}}%</span></td>
            @endif
          </tr>
          @endforeach
        </tbody>
    </table>
</div>



@endsection




