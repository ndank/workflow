<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>State edit form</title>
</head>
<body>
	<h2>State Edit Form</h2>
	<a href="{{ route('state') }}">< Back to List state</a>
	<br>
	<br>
  {!! Form::open(array('route' => ['stateUpdate',$state->id], 'method' => 'POST')) !!}

    {!! Form::label('label','Label : ') !!}
    {!! Form::text('label',$state->label) !!}

    {!! Form::submit() !!}
  {!! Form::close() !!}
</body>
</html>