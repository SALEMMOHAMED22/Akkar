<a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-sm btn-info">Show</a>
<a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
