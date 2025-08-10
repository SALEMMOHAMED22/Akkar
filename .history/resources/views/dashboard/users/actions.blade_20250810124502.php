{{-- <a href="" class="btn btn-sm btn-info">Show</a>
<a href="" class="btn btn-sm btn-warning">Edit</a>
<form action="" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form> --}}


<button user-id="{{ $user->id }}"  type="button" class="btn btn-outline-info status_btn">
            {{ __('dashboard.status_management') }} <i class="la la-stop"></i>
        </button>