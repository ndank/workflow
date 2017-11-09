<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>State form</title>
</head>
<body>
	<h2>State Add Form</h2>
	<a href="{{ route('state') }}">< Back to List state</a>
	<br>
	<br>
  {!! Form::open(array('route' => 'stateStore', 'method' => 'POST')) !!}

    {!! Form::label('label','Label : ') !!}
    {!! Form::text('label') !!}

    {!! Form::submit() !!}
  {!! Form::close() !!}

</body>
</html>