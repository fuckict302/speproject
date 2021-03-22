<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Entry;

class SurveyController extends Controller
{

    public function index(){
        $survey = Survey::where('id', '=', 1)->firstOrFail();
        return view('survey', ["survey"=>$survey]);
    }

    public function viewSurvey($id){
        $survey = Survey::where('id', '=', $id)->firstOrFail();
        $survey_id = $survey->getKey();
        $survey_name = $survey->name;

        $survey_questions = Question::where('survey_id', '=', $survey_id)->get();

        return view('survey', [
            "survey_id"=>$survey_id,
            "survey_name"=>$survey_name,
            "survey_questions"=>$survey_questions
            ]);
    }

    public function viewCreateSurvey(){
        return view('surveyCreate');
    }

    public function doSurvey(Request $request, $survey_id){
        // $survey_id = intval($id, 10 );
        $survey = Survey::where('id', '=', $survey_id)->firstOrFail();
        $survey_questions = Question::where('survey_id', '=', $survey_id)->get();

        $answers = [];
        foreach($survey_questions as $question){
            $answers['q' . $question->id ] = $request->input('q' . $question->id . "-response");
        }

        (new Entry)->for($survey)->fromArray($answers)->push();

        return view('survey_complete', [
            "survey_name"=>$survey->name
        ]);
    }

    public function createSurvey(Request $request){

        $survey_name = $request->surveyName;
        $survey_question = $request->surveyQuestion;
        $survey_response1 = $request->surveyResponse1;
        $survey_response2 = $request->surveyResponse2;

        $survey = Survey::create([
            'name' => $survey_name,
            'settings' => [
                'accept-guest-entries' => true
            ]
        ]);

        $survey->questions()->create([
            'content' => $survey_question,
            'type' => 'radio',
            'options' => [$survey_response1, $survey_response2]
        ]);
        $survey_id = $survey->getKey();


        return view('survey_created', [
            "survey_id"=>$survey_id
        ]);
    }

    public function store(Survey $survey, Request $request)
    {
        $answers = $this->validate($request, $survey);

        (new Entry)->for($survey)->fromArray($answers)->push();
    }

    public function createSurvey2(){
        $survey = Survey::create([
            'name' => 'Dog Population Survey',
            'settings' => [
                'accept-guest-entries' => true
            ]
        ]);

        $survey->questions()->create([
            'content' => 'How many cats do you have?',
            'type' => 'number',
            'rules' => ['numeric', 'min:0']
        ]);

        $survey->questions()->create([
            'content' => 'What\'s the name of your first cat',
        ]);

        $survey->questions()->create([
            'content' => 'Would you want a new cat?',
            'type' => 'radio',
            'options' => ['Yes', 'Oui']
        ]);
        $survey_id = $survey->getKey();
        return view('surveyCreate', ["survey_id"=>$survey_id]);
    }

}
