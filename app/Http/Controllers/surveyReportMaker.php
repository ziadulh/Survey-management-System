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
    public function report(){
        // dd(Que_option::pluck('id'));

        $optionID = Que_option::get();
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

        return view('surveyReportMaker.surveyReportMaker',compact('optionArray'));
    }


    // Report of  survey, Professionwise
    public function surveyReportMakerForProfessional(Request $request){

        $profession_id = $request->get('profession');
        $type = surveyPerformerProfession::find($profession_id);

        $profession = surveyPerformerProfession::get();
        $optionID = Que_option::get();
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

        return view('surveyReportMaker.surveyReportMakerForProfessional',compact(['optionArray','profession','profession_id','type']));






        // $profession = SurveyPerformerProfession::get();
        // $optionID = Que_option::get();
        // $dataPussingArray = [];

        // foreach($optionID as $optionID){
        //     $d = Survey_table::where('ans',$optionID->id)->get();
        //     print_r(count($d)); echo "\n";
        // } exit();
        // return view('surveyReportMaker.surveyReportMakerForProfessional',compact(['profession']));
    }
}






// $users = DB::table('users')
//             ->join('contacts', 'users.id', '=', 'contacts.user_id')
//             ->join('orders', 'users.id', '=', 'orders.user_id')
//             ->select('users.*', 'contacts.phone', 'orders.price')
//             ->get();
