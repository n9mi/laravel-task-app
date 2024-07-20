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

                @foreach ($tasks as $task)
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $task->title }}</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $task->description }}
                            </p>
                        </div>
                    </div>
                @endforeach

                {{ $tasks->links() }}

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
