@extends('admin.master')


@section('content')


    <form action="/professionwise/surveyReport" method="get">
        <div class="box-body">
            <h3>Choose a profession type to show specific survey data according to profession: </h3>
            <div class="input-group input-group-sm">

                <select class="form-control" name="profession">
                    <option value="0">All</option>
                        @foreach ($profession as $key => $profession)
                            @if ($profession->id==$profession_id)
                            <option selected value="{{$profession->id}}">{{$profession->profession}}</option>

                            @else
                            <option value="{{$profession->id}}">{{$profession->profession}}</option>

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
                <th >Question</th>
                <th>Option Name</th>

                    @if ($profession_id)
                        <td>{{$type->profession}} responses</td>

                    @endif

                <th>Total responses No. </th>
                {{-- @if(!$type->profession)
                <th>{{$type->profession}} response</th>
                @endif --}}

                @if ($profession_id)
                    <th>Occurence G.View</th>
                    <th>Out of P.view</th>

                @endif

              </tr>

              @foreach ($optionArray as $a)

              <tr>
                @if(count($a->Occurence))
                    <td>{{$a->que->name}}</td>
                    <td>{{$a->ansID->options}}</td>
                    @if ($profession_id)
                    <td>{{count($a->type)}}</td>

                    @endif

                    <td>{{count($a->Occurence)}}</td>

                    @if ($profession_id)
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: {{(count($a->type)/count($a->Occurence))*100}}%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-red">{{number_format(((count($a->type)/count($a->Occurence))*100),2)}}%</span></td>

                    @endif





                @endif
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>

@endsection


{{-- @if ($data->id==$survey_id)
                            <option selected value="{{$data->id}}">{{$data->name}}</option>
                            @else
                            <option value="{{$data->id}}">{{$data->name}}</option>

                            @endif --}}
