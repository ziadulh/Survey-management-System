<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\surveyPerformerProfession;

class surveyPerformerProfessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createProfession(){
        return view('surveyPerformerProfession.createProfession');
    }

    public function storeProfession(Request $request){
        $user_id = auth()->user()->id;

        $request->validate([
            "profession" => 'required',

        ]);


        $data = array(
            "profession" => $request->input('profession'),
            "publish" => $request->input('publish'),
            "created_by" => $user_id,
        );
        surveyPerformerProfession::create($data);

        return redirect('/surveyProfessionList')->with('success','Survey created');

    }

    public function surveyProfessionList(){
        $allDataFromSurveyProfessionTable = surveyPerformerProfession::all();
        return view('surveyPerformerProfession.surveyProfessionList')->with('allDataFromSurveyProfessionTable',$allDataFromSurveyProfessionTable);
    }

    public function editProfession($id){
        $allDataFromSurveyProfessionTable = surveyPerformerProfession::find($id);
        return view('surveyPerformerProfession.editProfession')->with('allDataFromSurveyProfessionTable',$allDataFromSurveyProfessionTable);
    }

    public function updateProfession(Request $request, $id)
    {
        $user_id = auth()->user()->id;

        $data = surveyPerformerProfession::find($id);
        $data->profession = $request->input('profession');
        $data->updated_by = $user_id;
        $data->publish = $request->input('publish');
        $data->save();

        return redirect('/surveyProfessionList')->with('success','Your profession information is updated');
    }

    public function destroy($id)  // function to delete survey and its corresponding questions and options from survey question and answer table
    {
        // to delete survey
        $data = surveyPerformerProfession::find($id);
        $data->delete();

        return redirect('/surveyProfessionList')->with('success', 'Selected profession is deleted');
    }
}
