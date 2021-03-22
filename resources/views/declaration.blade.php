@extends('layouts.app')

@section ('content')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    <input type="button" id="box" value="Tell about yourself"/>
    <div id="dialog-confirm"></div>

    <script>
        $('#box').click(function buttonAction() {
            $("#dialog-confirm").html("Are you sure?");
// Define the Dialog and its properties.
            $("#dialog-confirm").dialog({
                resizable: false,
                modal: true,
                title: "Click Yes or No based on your preference",
                height: 250,
                width: 400,
                buttons: {
                    "Yes": function () {
                        $(this).dialog('close');
                        alert("Yes, I do");
                    },
                    "No": function () {
                        $(this).dialog('close');
                        alert("Nope, I don't");
                    }
                }
            });
        });
        $('#box').click(buttonAction);
    </script>

@endsection
