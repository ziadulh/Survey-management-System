<?php

namespace App\Http\Controllers;

use App\nsurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Survey_question;
use App\que_option;
use phpDocumentor\Reflection\Types\Object_;
use App\Survey_table;

class surveyQuestionGenerateController extends Controller
{
    // function to create a view/form for user to perform survey

    public function surveyQuistionaireView($id) // used method
    {
        $questions = Survey_question::select()->where('surveyautoid','=',$id)->get();
        $qus=[];
        foreach($questions as $question)
        {
            $o=new Object_();  // need to inclue 'use phpDocumentor\Reflection\Types\Object_' on the top to use this kind of class object
            $o->info= $question; // creating a field to $o object
            $o->options=que_option::select()->where('que_auto_id','=',$question->id)->get();
            array_push($qus,$o); // push each object to $qus array using loop
        }

        if ($qus) {
            return view('surveyPages.surveyQuestionaireview',compact('qus'));
        } else {
            print_r("No question is availabe for this Survey");
        }
    }


    public function store(Request $request,$id){
        $request->validate([
            "profession" => 'required',
        ]);


        $d = $request->input('question_h');
        $e = $request->input('option');

        if($e){
            foreach ($e as $key => $value) {
                $xx = Que_option::select()->where('id','=',$value)->get();
                $data = array(
                    "que_ans_auto_id" => $xx[0]->que_auto_id,
                    "ans" => $value,
                    "survey_performer_profession" => $request->input('profession'),
                    "survey_id"=>$id,
                );

                Survey_table::create($data);
            }
        }else{
                $data = array(
                    "survey_performer_profession" => $request->input('profession'),
                    "survey_id"=>$id,
                );
                Survey_table::create($data);
        }



        return redirect('/surveyList')->with('success','Your survey data is submitted');

        // foreach ($d as $key => $value) {
        //     $data = array(
        //                         "que_ans_auto_id" => $value,
        //                         "ans" => $e[$key],
        //                         "survey_performer_profession" => $request->input('profession'),
        //                         "survey_id"=>$id,
        //                     );
        //     Survey_table::create($data);
        // }

        // return redirect('/surveyList')->with('success','Your survey data is submitted');

    }

    // public function questionOptionEdit($id){
    //     $data1 = Survey_question::select()->where('id','=',$id)->get();
    //     $data2 = Que_option::select()->where('survey_auto_id','=',$id)->get();
    //     $data3 = nsurvey::select()->get();
    //     return view('surveyPages.surveyQuestionOptionEdit',compact(['data1','data2','data3']));


    // }




    public function allSurveyQuestionList(Request $request){  // used method
        $survey_id = $request->get('survey');
        //echo $survey_id;exit;


        // this if else condition checks whether the $survey_id is null or not. if $survey_id is null then it will load all the questins of survey(that mens the first condition is false). but if the $survey_id carry any value (which receives from the front end dropdown menu and here it receiving using ,$request->get('survey'),) then it loads only the questions which are equal to 'surveyautoid'.

        if ($survey_id) {
            $questions = Survey_question::select()->where('surveyautoid','=',$survey_id)->get();
        } else {
            $questions = Survey_question::select()->get();
        }


// all the codes under this comment except '// dd($questions);' is to load all the questions of survey
        // $questions = Survey_question::select()->get();
        // dd($questions);

        $qus=[];
        foreach($questions as $question)
        {
            $o=new Object_();
            $o->info= $question;
            $o->options=que_option::select()->where('que_auto_id','=',$question->id)->get();
            array_push($qus,$o);
        }

        $data3 = nsurvey::select()->get();;
        return view('surveyPages.allSurveyQuestionList',compact(['qus','data3']));


    }




    public function editQuestion($id){  // used method
        $data1 = Survey_question::select()->where('id','=',$id)->get();
        $data2 = Que_option::select()->where('que_auto_id','=',$id)->get();
        $data3 = nsurvey::select()->get();
        return view('surveyPages.editQuestion',compact(['data1','data2','data3']));
    }


    public function update(Request $request, $id)
    {
        $data1 = Survey_question::find($id);
        $data1->name = $request->input('name');
        $data1->surveyautoid = $x = $request->input('surveyautoid');
        $data1->save();

        $data2 = Que_option::select()->where('que_auto_id','=',$id)->get();
        foreach($data2 as $data){
            Que_option::where('que_auto_id',$id)->update([
                    'survey_auto_id' => $request->input('surveyautoid')
                ]);
        }


        // $data2 = Que_option::select()->where('que_auto_id','=',$id)->get();
        // foreach($data2 as $data){
        //     $data->surveyautoid = $request->input('surveyautoid');
        // }
        // $data2->save();
        // return view('t');




        $p = $request->input('option'); //echo "<pre>";print_r($p);echo "</pre>";exit;

        if ($p) {
            foreach($p  as $key=>$value){
                $xx = Que_option::find($key);
                $xx->options = $value;
                $xx->save();
                // Que_option::where('id',$key)->update([
                //     'options' => $value
                // ]);
            }
        }

        return redirect('/allSurveyQuestionList')->with('success','Your survey question is updated');

    }

    // to destroy survey form

    public function destroy($id){
        $data2 = Que_option::select('id')->where('que_auto_id','=',$id)->get();

        foreach($data2 as $key => $value){
            $dd = Que_option::find($value->id);
            $dd->delete();
        }

        $data1 = Survey_question::find($id);
        $data1->delete();

        return redirect('/allSurveyQuestionList')->with('success','Your survey question is deleted');
    }
}
