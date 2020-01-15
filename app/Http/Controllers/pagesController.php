<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveytable;
use App\nsurvey;
use App\Survey_question;
use App\Que_option;

class pagesController extends Controller
{


    public function survey(){
        return view('pages.survey');
    }


    public function store(Request $request)
    {

        $request->validate([
            "sname" => 'required',
            "edate" => 'required',
            "pdate" => 'required',

        ]);

        $data = array(
            "name" => $request->input('sname'),
            "edate" => $request->input('edate'),
            "pdate" => $request->input('pdate'),
        );
        Nsurvey::create($data);
    	// $data = new nsurvey;
        // $data->name = $request->input('sname');
        // $data->edate = $request->input('edate');
        // $data->pdate = $request->input('pdate');

    	// $data->save();
    	return redirect('/surveyList')->with('success','Survey created');
    }

    public function list()  //used
    {
        $data = nsurvey::all();
        return view('pages.surveyList')->with('data',$data);
    }



    public function edit($id)  // used
    {
        $data = nsurvey::find($id);
        return view('pages.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "sname" => 'required',
            "edate" => 'required',
            "pdate" => 'required',

        ]);

        $data = nsurvey::find($id);
        $data->name = $request->input('sname');
        $data->edate = $request->input('edate');
        $data->pdate = $request->input('pdate');
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

        return redirect('/surveyList')->with('success', 'Selected survey is deleted');
    }

}
