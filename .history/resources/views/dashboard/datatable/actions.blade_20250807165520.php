<a href="{{ $show }}" class="btn btn-sm btn-info">Show</a>
<a href="{{ $edit }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ $delete }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>
