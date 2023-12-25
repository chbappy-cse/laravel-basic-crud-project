@extends('app')
@section('content')
    {{-- {{ var_dump($projects) }} --}}

    <nav class="my-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
            <li class="breadcrumb-item"><a href="/create-project">Create Project</a></li>
        </ol>
    </nav>

    <div class="row">
        @foreach ($projects as $project)
        <div class="col-sm-6 my-3">
            <div style="height: 15rem" class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ $project->body }}</p>
                    <p>
                        @php
                            $currentTime = \Carbon\Carbon::now();
                            $createdAt = $project->created_at;
                            $hoursDifference = $currentTime->diffInHours($createdAt);

                            if ($hoursDifference < 24) {
                                // Within 24 hours, display day, month, year ago
                                $formattedDate = $createdAt->diffForHumans();
                            } else {
                                // Older than 24 hours, display date and time
                                $formattedDate = $createdAt->format('M j, Y H:i:s');
                            }
                        @endphp

                        {{ $formattedDate }}
                    </p>
                    <a href="/project/{{ $project->id }}" class="btn btn-primary">See Project Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="">
        {{ $projects->links() }}
    </div>    
@endsection