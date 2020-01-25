<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveytable;
use App\nsurvey;
use App\Survey_question;
use App\Que_option;

class surveyController extends Controller
{
    // form to create a new survey
    public function survey(){
        return view('surveyCRUD.survey');
    }


    // function to store a new survey
    public function store(Request $request)
    {

        $request->validate([
            "sname" => 'required',
            "edate" => 'required|date',

        ]);

        $publishdate = date("Y-m-d");
        $user_id = auth()->user()->id;

        $data = array(
            "name" => $request->input('sname'),
            "edate" => $request->input('edate'),
            "pdate" => $publishdate,
            "created_by" => $user_id,
            "publish" => $request->input('publish'),
        );
        Nsurvey::create($data);
    	// $data = new nsurvey;
        // $data->name = $request->input('sname');
        // $data->edate = $request->input('edate');
        // $data->pdate = $request->input('pdate');

    	// $data->save();
    	return redirect('/surveyList')->with('success','Survey created');
    }


    // to show the list of all surveys
    public function list()  //used
    {
        $data = nsurvey::all();
        return view('surveyCRUD.surveyList')->with('data',$data);
    }



    // to edit a desire survey
    public function edit($id)  // used
    {
        $data = nsurvey::find($id);
        return view('surveyCRUD.edit')->with('data', $data);
    }


    // to store updated information of a survey
    public function update(Request $request, $id)
    {
        $request->validate([
            "sname" => 'required',
            "edate" => 'required|date',

        ]);
        $user_id = auth()->user()->id;

        $data = nsurvey::find($id);
        $data->name = $request->input('sname');
        $data->edate = $request->input('edate');
        $data->updated_by = $user_id;
        $data->publish = $request->input('publish');
        $data->save();

        return redirect('/surveyList')->with('success','Your survey information is updated');
    }

    public function destroy($id)  // function to delete survey and its corresponding questions and options from survey question and answer table
    {
        // to delete survey
        $data = nsurvey::find($id);
        $data->delete();

        // to delete questions
        $data2 = Survey_question::select('id')->where('surveyautoid','=',$id)->get();

        foreach($data2 as $key => $value){
             $dd = Survey_question::find($value->id);
             $dd->delete();
        }

        //to delete options
        $data3 = Que_option::select('id')->where('survey_auto_id','=',$id)->get();

        foreach($data3 as $key => $value){
            print_r($value->id);print_r(" ");
             $dd = Que_option::find($value->id);
             $dd->delete();
        }

        return redirect('/surveyList')->with('success', 'Survey is deleted');
    }

}
