@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: black; text-align:center;">
                    Poll {{$survey_id}} has been created!
                    <a role="button" href="/survey/{{$survey_id}}" class="btn btn-warning">Go to Poll</a>
                    <a role="button" href="/manage-survey" class="btn btn-primary">Back to survey management</a>
                </div>
            </div>
        </div>
<div>
@endsection