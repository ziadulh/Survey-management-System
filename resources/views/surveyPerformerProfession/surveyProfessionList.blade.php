@extends('admin.master')

@section('content')
@include('Messages.message')


<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Survey Questions</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">



            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>SL No.</th>
                <th>Profession</th>
                <th>Change</th>
                <th>Remove</th>
              </tr>
              </thead>

              <tbody>
                @foreach ($allDataFromSurveyProfessionTable as $key => $allDataFromSurveyProfessionTable)
                    <tr>
                        <td><br>{{$key+1}}.</td>
                        <td><br>{{$allDataFromSurveyProfessionTable->profession}}</td>
                        <td><a href="surveyProfessionList/{{$allDataFromSurveyProfessionTable->id}}" class="btn btn-app"><i class="fa fa-edit"></i>Edit</a></td>
                        <td>
                            <form action="surveyProfessionList/{{$allDataFromSurveyProfessionTable->id}}/delete" method="POST">
                                @csrf
                                <button style="color:red" class="btn btn-app" type="submit"><i style="color:red;" class="fa fa-trash"></i>Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
              </tbody>

            </table>


          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection


