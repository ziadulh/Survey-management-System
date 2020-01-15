<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nsurvey;
use App\Survey_question;
use App\que_option;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;
use App\survey_table;
use Illuminate\Database\Query\Builder;
use App\Survey_performer_table;

class formSurveyController extends Controller
{
    public function view(){

        // $data = DB::select('select * from que_options left join survey_questions on survey_questions.id = que_options.id');
        // return view('qPages.surveyForm')->with('data',$data);

        // $questions = Survey_question::all()->toArray();
        //     $data = array();
        // foreach ($questions as $question){
        //     $data[$question['id']] = $question['name'];
        // }


        // $questions = Survey_question::all()->toArray();
        // $options = que_option::all()-toArray();
        // return view('qPages.surveyForm')->with('questions',$questions);

        $questions = Survey_question::select()->get();
        // dd($questions);

        $qus=[];
        foreach($questions as $question)
        {
            $o=new Object_();
            $o->info= $question;
            $o->options=que_option::select()->where('que_auto_id','=',$question->id)->get();
            array_push($qus,$o);
        }
            // dd($qus);
        return view('qPages.surveyForm',compact('qus'));

    }

    public function store(Request $request){

        // $request->validate([
        //     "que_ans_auto_id" => 'required',
        //     "ans" => 'required',
        //     "user_id" => 'required'

        // ]);
            // dd($request->input('question_h'));

        // $d = DB::table('survey_questions')->get('id');

        $request->validate([
            "user_name" => 'required',
        ]);

        $data = array(
            "name" => $request->input('user_name'),

        );

        $inCollector = Survey_performer_table::create($data);


        $d = $request->input('question_h');

        $e = $request->input('option');
        // count($d);

        // //dd($d[0],$e[2]);

        foreach ($d as $key => $value) {
            $data = array(
                                "que_ans_auto_id" => $value,
                                "ans" => $e[$key],
                                "user_name" => $inCollector->id,
                            );
                            Survey_table::create($data);
        }

    }

    public function surveyList(){
        $data = DB::table('survey_performer_tables')->get();
        return view('survey.surveyList')->with('data',$data);


    }

    public function viewPerformedSurvey($id){
        // $arr=[];
        // $data = DB::table('survey_tables')->where('user_name',$id)->get();
        // foreach($data as $key => $value){

        //     $d = DB::table('que_options')->where('id',($data[$key]->ans))->get();
        //     // print_r($d[0]->options);
        //      array_push($arr,$d[0]->options);


        // }
        // return view('survey.viewPerformedSurvey',compact('arr'));

        // $arr=[];
        // $da = DB::table('survey_tables')->where('user_name',$id)->get();

        // foreach($da as $key => $value){
        //     $data = DB::table('survey_questions')->where('id',($da[$key]->id))->get();
        //     dd($data);


        //     //$data = DB::table('survey_questions')->where('id',($da[$key]->id))->get();
        //     //  array_push($arr,$d[$key]->name);


        // }
        // return view('survey.viewPerformedSurvey',compact('data'));

        // $value = Survey_table::select()->where('user_name',$id)->get();

        $data = DB::table('survey_tables')

            ->join('survey_performer_tables', 'survey_tables.user_name', '=', 'survey_performer_tables.id')
            ->join('survey_questions', 'survey_tables.que_ans_auto_id', '=', 'survey_questions.id')
            ->join('que_options', 'survey_tables.ans', '=', 'que_options.id')
            ->where('survey_tables.user_name', '=', $id)
            ->select('survey_tables.que_ans_auto_id','survey_questions.name','que_options.options')
            ->get();

        return view('survey.viewPerformedSurvey',compact('data'));

        // $d = DB::table('que_options')->where('id',($data[0]->ans))->get();
        // print_r($d[0]->options);


        // foreach($data as $d){
        //     print_r(count($d->ans));
        // }


        // $o=new Object_();
        // $o->questionID = DB::table('survey_tables')->where('user_name',$id)->get();
        // $o->questionName = DB::table('survey_tables')->where('user_name',$id)->get();
        // array_push($arr,$d);

        //  dd($o->questionID);
        // return view('survey.viewPerformedSurvey',compact('arr'));
        // return view('survey.viewPerformedSurvey',compact('d'));
    }

    public function editPerformedSurvey($id){
        $questions = Survey_question::select()->get();
        // dd($questions);

        $qus=[];
        foreach($questions as $question)
        {
            $o=new Object_();
            $o->info= $question;
            $o->options=que_option::select()->where('que_auto_id','=',$question->id)->get();
            array_push($qus,$o);
        }
            // dd($qus);
        return view('survey.editPerformedSurvey',compact('qus'));
    }
}
