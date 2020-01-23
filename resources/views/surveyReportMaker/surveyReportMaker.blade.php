@extends('admin.master')
@section('content')



<div class="box-body">
    <table class="table table-bordered">
        <tbody>
          <tr>
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




