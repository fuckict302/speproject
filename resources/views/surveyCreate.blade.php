@extends('layouts.app')

@section('content')


<form method="POST" enctype="multipart/form-data">
@csrf
    <div class="form-group">
      <label for="surveyName">Survey Name</label>
      <input type="text" class="form-control" name="surveyName" placeholder="Enter survey name">
    </div>

    <div class="form-group">
      <label for="surveyQuestion">Question</label>
      <input type="text" class="form-control" name="surveyQuestion" placeholder="Question">
    </div>

        <div class="form-group">
          <label for="surveyResponse1">Response 1</label>
          <input type="text" class="form-control" name="surveyResponse1" placeholder="Another input">
        </div>

    <div class="form-group">
        <label for="surveyResponse2">Response 2</label>
        <input type="text" class="form-control" name="surveyResponse2" placeholder="Another input">
    </div>
    

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection