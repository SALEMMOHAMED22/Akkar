@extends('layouts.dashboard.master')

@section('title')
    Contact Messages
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-gray-800">Contact Messages</h1>
            <span class="badge badge-primary p-2">Total: {{ $contacts->total() }}</span>
        </div>

        <!-- Contacts Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3  text-white text-center">
                <h6 class="m-0 font-weight-bold">Manage Contacts</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    @if ($contacts->count())
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th><i class="fas fa-user"></i> Name</th>
                                    <th><i class="fas fa-envelope"></i> Email</th>
                                    <th><i class="fas fa-phone"></i> Phone</th>
                                    <th><i class="fas fa-tag"></i> Subject</th>
                                    <th><i class="fas fa-comment-dots"></i> Message</th>
                                    <th><i class="fas fa-calendar-alt"></i> Date</th>
                                    <th><i class="fas fa-cogs"></i> Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>
                                            {{ Str::limit($contact->message, 40) }}
                                            @if (Str::length($contact->message) > 40)
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#messageModal{{ $contact->id }}">View</a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="messageModalLabel{{ $contact->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="messageModalLabel{{ $contact->id }}">Full Message
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ $contact->message }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <!-- Delete Button -->
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $contact->id }}">
                                                Delete
                                            </button>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="deleteModalLabel{{ $contact->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirm Delete</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this message from
                                                            <strong>{{ $contact->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('dashboard.contacts.destroy', $contact->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes,
                                                                    Delete</button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $contacts->appends(request()->input())->links() }}
                    @else
                        <div class="alert alert-info text-center" role="alert">
                            No contact messages found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
