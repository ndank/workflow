@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
@endif

<h3>State list</h3>
<a class="tambah" href="{{ route('stateFormCreate') }}">Add new state</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Label</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @foreach($states as $state)
        <tr>
            <td>{{ $state->name }}</td>
            <td>{{ $state->label }}</td>
                @if($state->status == 0)
                    <td bgcolor="red">Non Aktif</td>
                @elseif($state->status == 1)
                    <td bgcolor="green">Aktif</td>
                @endif
            <td>
            @if($state->status == 0)
                <a class="view" href="{{ route('stateActive',$state->id) }}">Aktif</a> |
            @elseif($state->status == 1)
                <a class="delete" href="{{ route('stateDeactive',$state->id) }}">Non Aktif</a> |
            @endif
            <a class="edit" href="{{ route('stateFormEdit',$state->id) }}">Edit</a>
            </td>
        </tr>
    @endforeach
</table>

{{ $states->links() }}