<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MattDaneshvar\Survey\Models\Survey;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Answer;

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

    public function viewSurveyResult($id){
        $survey = Survey::where('id', '=', $id)->firstOrFail();
        $survey_name = $survey->name;
        $questions = Question::where('survey_id', '=', $id)->get();

        // Create hash maps for iteration in views
        $counter = 1;
        $survey_questions = array();
        $survey_choices = array();
        $survey_responses = array();
        foreach($questions as $question){
            $survey_questions['q' . $counter] = $question->content;
            $options = $question->options;
            $survey_choices['q' . $counter] = $options;
            $response = array();
            foreach($options as $option){
                $matchThese = ['question_id' => $question->id, 'value' => $option];
                $response[$option] = count(Answer::where($matchThese)->get());
            }
            $survey_responses['q' . $counter] = $response;
            $counter++;
        }
        return view('surveyResult', [
            "survey_name"=>$survey_name,
            "survey_questions"=>$survey_questions,
            "survey_choices"=>$survey_choices,
            "survey_responses"=>$survey_responses
        ]);
    }

    public function viewCreateSurvey(){
        $user = Auth::user();
        if ($user == null)
            {return view('unauthorizeduser');}
        else
            {return view('surveyCreate');}
    }

    public function deleteSurvey($id){
        $survey = Survey::where('id', '=', $id)->firstOrFail();
        $survey_name = $survey->name;

        $questions = Question::where('survey_id', '=', $id)->get();

        foreach($questions as $question){
            $delete_answers = Answer::where('question_id', '=', $question->id)->delete();
        }

        $delete_questions = Question::where('survey_id', '=', $id)->delete();
        $delete_entries = Entry::where('survey_id', '=', $id)->delete();
        $delete_survey = Survey::destroy($id);


        return view('survey_deleted', [
            "survey_name"=>$survey_name,
            "survey_id"=>$id
        ]);
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

    public function manageSurvey(){
        $user = Auth::user();
        if ($user == null){
            return view('unauthorizeduser');
        } else{
            $surveys = Survey::all();
            return view('manageSurvey', [
                "surveys"=>$surveys
            ]);
        }
    }

}
