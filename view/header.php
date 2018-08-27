<!doctype html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-validation-master/dist/jquery.validate.min.js"></script>
    <script src="/js/check.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="row" style="margin-left: auto; margin-right: auto" >
    <div class="col-md-3 col-md-offset-5" style="margin-top: 1%; text-align: center; width: auto">
<? if (isset($_SESSION['login']) && $_SESSION['login'] != ''):?>
        <a class="btn btn-default" href="/registration/out" role="button">Out</a>
        <a class="btn btn-default" href="/feedback/show" role="button">Feedback Show</a>
        <a class="btn btn-default" href="/weather" role="button">Weather</a>
<? endif;?>
        <a class="btn btn-default" href="/feedback" role="button">Feedback</a>
        <a class="btn btn-default" href="/" role="button">Home</a>
    </div>
</div>
