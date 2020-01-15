<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nsurvey;
use App\Survey_question;
use App\que_option;

class questionireController extends Controller
{
    public function sQueForm(){  // used
        $data = nsurvey::all();
        return view('qPages.surveyQueForm')->with('data',$data);
    }

    public function store(Request $request)
    {

        $request->validate([
            "name" => 'required',
            "surveyautoid" => 'required',

        ]);
        $data = array(
            "name" => $request->input('name'),
            "surveyautoid" => $request->input('surveyautoid'),
        );

        $insert_data = Survey_question::create($data); // $insert_data used to hold the question creation ID as in later to use it foreign key


        $queAutoId = $insert_data->id;
        $options = $request->input('option');

        foreach ($options as $value) {
            if ($value) {
                $queOption = array(
                    "survey_auto_id" => $request->input('surveyautoid'),
                    "que_auto_id" => $queAutoId,
                    "options" => $value
                );
            }else continue;
            Que_option::create($queOption);
        }



    	return redirect('/allSurveyQuestionList')->with('success','Question Created');
    }
}
