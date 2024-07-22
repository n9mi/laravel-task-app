@extends('layouts.app')

@section('title', 'Task')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Task</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-9">
                                <h5 class="text-primary">List of tasks</h5>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary float-right"
                                    data-toggle="modal"
                                    data-target="#create-task-modal">
                                        Add task <i class="fas fa-circle-plus"></i></button>
                            </div>
                        </div>
                        <table class="table-hover table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row">{{ $tasks->firstItem() + $loop->index }}</th>
                                        <td>{{ $task->created_at }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <span class="badge badge-{{ $task->is_done ? "success" : "warning" }}">
                                                <span class="badge badge-transparent">
                                                    <i class="fas fa-{{ $task->is_done ? "check" : "hourglass" }}"></i>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm"
                                                data-toggle="modal"
                                                data-target="#modal-task-{{ $tasks->firstItem() + $loop->index }}">
                                                <i class="fas fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger btn-sm"
                                                type="button"
                                                onclick="deleteTask({{ $tasks->firstItem() + $loop->index }})">
                                                <i class="fas fa-trash"></i></button>

                                            <form action="{{ route('task.delete', $task->id) }}"
                                                method="POST"
                                                id="form-submit-delete-{{ $tasks->firstItem() + $loop->index }}">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $tasks->links() }}
                </div>
            </div>
        </section>

        @foreach ($tasks as $task)
            <div class="modal fade"
                tabindex="-1"
                role="dialog"
                id="modal-task-{{ $tasks->firstItem() + $loop->index }}">
                <div class="modal-dialog"
                    role="document">
                    <div class="modal-content">
                        <form action="{{ route('task.update', $task->id) }}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="modal-header">
                                <h5 class="modal-title">Edit task</h5>
                                <button type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text"
                                        class="form-control"
                                        name="title"
                                        value="{{ $task->title }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                        data-height="150"
                                        name="description">{{ $task->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            id="is-done-{{ $tasks->firstItem() + $loop->index }}"
                                            name="is_done"
                                            {{ $task->is_done ? "checked" : "" }}>
                                        <label class="form-check-label"
                                            for="is-done-{{ $tasks->firstItem() + $loop->index }}">
                                            Already done
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button"
                                    class="btn btn-secondary"
                                    data-dismiss="modal">Close</button>
                                <button class="btn btn-primary"
                                    type="submit">
                                    Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="modal fade"
            tabindex="-1"
            role="dialog"
            id="create-task-modal">
            <div class="modal-dialog"
                role="document">
                <div class="modal-content">
                    <form action="{{ route('task.create') }}" method="POST">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title">Add task</h5>
                            <button type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control"
                                    name="title">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control"
                                    data-height="150"
                                    name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        name="is_done"
                                        id="is-done-create">
                                    <label class="form-check-label"
                                        for="is-done-create">
                                        Already done
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button class="btn btn-primary"
                                type="submit">
                                Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    @if ($message = session('swal_success'))
        <script>
            swal({
                title: 'Success!',
                text: 'Task successfully updated',
                icon: 'success'
            });
        </script>
    @endif

    <script>
        function deleteTask(formId) {
            swal({
                    title: 'Are you sure?',
                    text: 'Are you sure to delete this task?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $(`#form-submit-delete-${formId}`).submit();
                    } else {
                        swal({
                            title: 'Task is not deleted',
                            icon: 'info'
                        });
                    }
                });
        }
    </script>

    @if ($errors->any())
        <script>
            swal({
                title: 'Error!',
                text: '{{ $errors->first() }}',
                icon: 'error'
            });
        </script>
    @endif
@endpush
