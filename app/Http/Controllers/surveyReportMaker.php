<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\nsurvey;
use App\Que_option;
use App\Survey_table;
use phpDocumentor\Reflection\Types\Object_;
use App\Survey_question;
use App\surveyPerformerProfession;

class surveyReportMaker extends Controller
{

    // Report of survey, optionwise
    public function report(Request $request){
        // dd(Que_option::pluck('id'));
        $survey = nsurvey::get();
        $survey_id = $request->get('survey');

        $optionID = Que_option::where('survey_auto_id',$survey_id)->get();
        if($survey_id == 0){
            $optionID = Que_option::get();
        }


        $optionArray = [];

        foreach($optionID as $optionID){
            $o = new Object_();
            $o->ansID = $optionID;
            $o->que = Survey_question::where('id',$optionID->que_auto_id)->first();
            // print_r($o->que->id); exit();
            $o->Occurence = Survey_table::where('ans',$optionID->id)->get();
            $o->OccurenceOutOf = Survey_table::where('que_ans_auto_id',$optionID->que_auto_id)->get();
            array_push($optionArray,$o);
        }

        return view('surveyReportMaker.surveyReportMaker',compact(['optionArray','survey_id','survey']));
    }


    // Report of  survey, Professionwise
    public function surveyReportMakerForProfessional(Request $request){

        $survey = nsurvey::get();
        $survey_id = $request->get('survey');
        $profession_id = $request->get('profession');
        $type = surveyPerformerProfession::find($profession_id);

        $profession = surveyPerformerProfession::get();


        $optionID = Que_option::where('survey_auto_id',$survey_id)->get();
        if($survey_id == 0){
            $optionID = Que_option::get();
        }


        $optionArray = [];

        foreach($optionID as $optionID){
            $o = new Object_();
            $o->ansID = $optionID;
            $o->que = Survey_question::where('id',$optionID->que_auto_id)->first();
            // print_r($o->que->id); exit();
            $o->Occurence = Survey_table::where('ans',$optionID->id)->get();
            $o->OccurenceOutOf = Survey_table::where('que_ans_auto_id',$optionID->que_auto_id)->get();
            $o->type = Survey_table::where('ans',$optionID->id)->where('survey_performer_profession',$profession_id)->get();
            array_push($optionArray,$o);
        }

        return view('surveyReportMaker.surveyReportMakerForProfessional',compact(['optionArray','profession','profession_id','type','survey','survey_id']));

        // $profession = SurveyPerformerProfession::get();
        // $optionID = Que_option::get();
        // $dataPussingArray = [];

        // foreach($optionID as $optionID){
        //     $d = Survey_table::where('ans',$optionID->id)->get();
        //     print_r(count($d)); echo "\n";
        // } exit();
        // return view('surveyReportMaker.surveyReportMakerForProfessional',compact(['profession']));
    }



    // funtion take one question and found its corresponding options and options apearances as well

    public function questionWiseReport(){

        $arr = [];
        $surveyTableData = Survey_question::get();
        foreach($surveyTableData as $std){
            $op = Que_option::where('que_auto_id',$std->id)->get();
            $o = new Object_();
            $o->que = $std->name;
            foreach($op as $key => $ops){
                $o->opt[$key] = $ops->options;
                $ocs = Survey_table::where('ans',$ops->id)->get();
                $o->selection[$key] = count($ocs);


            }
            array_push($arr,$o);

        }

        return view('surveyReportMaker.questionWiseReport',compact(['surveyTableData','arr']));

    }
}






// $users = DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.*', 'contacts.phone', 'orders.price')
//             ->get();
