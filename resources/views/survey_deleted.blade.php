@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: black; text-align:center;">
                    Poll {{$survey_id}}: "{{$survey_name}}" has been deleted!
                    <a role="button" href="/manage-survey" class="btn btn-primary">Back to survey management</a>
                </div>
            </div>
        </div>
<div>
@endsection