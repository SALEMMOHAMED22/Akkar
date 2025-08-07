<a href="" class="btn btn-sm btn-info">Show</a>
<a href="" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
