@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: black; text-align:center;">
                    <div class="card-header" style="color:black;">
                        {{$survey_name}}
                    </div>

                    <div class="card-body" style="color: white; text-align: left;">
                        @for($i=1; $i<=count($survey_questions); $i++)
                            <p>Question: {{$survey_questions["q" . $i]}}</p>
                            <p>Result</p>
                            <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Response</th>
                                    <th scope="col"></th>
                                    <th scope="col">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($survey_choices["q" . $i] as $choice)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{$choice}}</td>
                                    <td></td>
                                    <td>{{$survey_responses["q" . $i][$choice]}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        @endfor
                        <a role="button" href="/manage-survey" class="btn btn-primary">Back to survey management</a>
                    </div>
                </div>
            </div>
        </div>
<div>
@endsection