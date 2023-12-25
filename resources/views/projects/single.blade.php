@extends('app')
@section('content')
    <div class="card text-center mt-3">
        <div class="card-header">
            Project Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->body }}</p>

            <div class="">
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</button>
                
                <a href="/project/{{ $project->id }}/edit" class="btn btn-primary mx-2">Update</a>
                <a href="/projects" class="btn btn-success">Back to all project </a>
            </div>
        </div>
        <div class="card-footer text-muted">
            @php
                $currentTime = \Carbon\Carbon::now();
                $updatedTime = $project->updated_at;
                $hoursDifference = $currentTime->diffInHours($updatedTime);

                if ($hoursDifference < 24 && $hoursDifference >= 0) {
                    // Within 24 hours, display day, month, year ago
                    $formattedUpdateDate = $updatedTime->diffForHumans();
                } else {
                    // Older than 24 hours, display date and time
                    $formattedUpdateDate = $updatedTime->format('M j, Y H:i:s');
                }
            @endphp

            Updated: {{ $formattedUpdateDate }}
        </div>
    </div>

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <form method="POST" action="{{ route('items.destroy', $project->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form> --}}

                    <a href="/project/{{ $project->id }}/delete" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection