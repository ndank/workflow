<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Transition form</title>
</head>
<body>
	<h2>Transition Add Form</h2>
	<a href="{{route('transition')}}">< Back to List transition</a>
	<br>
	<br>
  {!! Form::open(array('route' => 'transitionCreate', 'method' => 'POST')) !!}

    {!! Form::label('label','Label : ') !!}
    {!! Form::text('label') !!}
		<br>
		{!! Form::label('from','From :') !!}<br>
		<select multiple="multiple" name="from[]" id="from">
			<option value="">-Select-</option>
			@foreach($states as $state)
				<option value="{{ $state->name }}">{{ $state->label }}</option>
			@endforeach
		</select>
		<br>
		{!! Form::label('to','To :') !!}<br>
		<select multiple="multiple" name="to[]" id="from">
			<option value="">-Select-</option>
			@foreach($states as $state)
				<option value="{{ $state->name }}">{{ $state->label }}</option>
			@endforeach
		</select>
		<br>
		{{ Form::textarea('message', null, ['size' => '30x5']) }}<br>
    {!! Form::submit() !!}
  {!! Form::close() !!}

</body>
</html>