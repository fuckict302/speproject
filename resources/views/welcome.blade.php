@extends('layouts.app')
    <!DOCTYPE html>

<div>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SPE Us</title>
<link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
</div>

@section('content')

    @if (count($surveys) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
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
                        <a role="button" href="/survey/{{$survey->id}}" class="btn btn-warning">Go to Survey</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                        <h2>No surveys has been created yet.</h2>
                    </div>
                </div>
            </div>
            <div>
    @endif

@endsection
