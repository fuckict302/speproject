@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: black; text-align:center;">
                    <div class="card-header" style="color:black;">
                        {{$survey_name}}
                    </div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                        @csrf
                            @foreach($survey_questions as $question)
                                <p>{{$question->content}}</p>
                                <div class="pb-5">
                                    <fieldset id="q{{$question->id}}-response">
                                        @foreach($question->options as $option)
                                        <label>{{$option}}</label>
                                            <input type="radio" value="{{$option}}" name="q{{$question->id}}-response">
                                        @endforeach
                                    </fieldset>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<div>
@endsection