
	<h3>Transition list</h3>
	<a class="tambah" href="{{route('transitionFormCreate')}}">Add new transition</a>

	<table border="1">
		<tr>
			<th>Name</th>
			<th>Label</th>
			<th>From</th>
			<th>To</th>
			<th>Notification</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		@foreach($transitions as $transition)
			<tr>
				<td>{{ $transition->name }}</td>
				<td>{{ $transition->label }}</td>
				<td>{{ $transition->from }}</td>
				<td>{{ $transition->to }}</td>
				<td>{{ $transition->message }}</td>
					@if($transition->status == 0)
						<td bgcolor="red">Non Aktif</td>
					@elseif($transition->status == 1)
						<td bgcolor="green">Aktif</td>
					@endif
				<td>
				@if($transition->status == 0)
					<a class="view" href="{{route('transitionActive',$transition->id)}}
					">Aktif</a>
				@elseif($transition->status == 1)
					<a class="delete" href="{{route('transitionDeactive',$transition->id)}}">Non Aktif</a>
				@endif
				<a class="edit" href="{{route('transitionFormEdit',$transition->id)}}">Edit</a>
				</td>
			</tr>
		@endforeach
	</table>

  {{ $transitions->links() }}