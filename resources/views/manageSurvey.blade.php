@extends('layouts.app')

@section('content')
<a role="button" href="/manage-survey/create" class="btn btn-primary">Create New Survey</a>

@if (count($surveys) > 0)
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($surveys as $survey)
        <tr>
            <th scope="row">{{$survey->id}}</th>
            <td>{{$survey->name}}</td>
            <td></td>
            <td>
                <a role="button" href="/manage-survey/result/{{$survey->id}}" class="btn btn-primary">View Results</a>
                <a role="button" href="/survey/{{$survey->id}}" class="btn btn-warning">Go to Survey</a>
                <a role="button" href="/manage-survey/delete/{{$survey->id}}" class="btn btn-danger">Delete Survey</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="color: black; text-align:center;">
                        <h2>No surveys has been created yet.</h2>
                </div>
            </div>
        </div>
    <div>
@endif

@endsection