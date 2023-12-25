@extends('app')
@section('content')
    <form action="/create-project" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                Create a project
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label" >Project Title: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter project title..." value="{{ old('name') }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Project Content</label>
                    <textarea class="form-control" id="content" rows="3" name="body" placeholder="Describe project details here...">{{ old('body') }}</textarea>
                    <span class="text-danger">{{ $errors->first('body') }}</span>
                </div>
                <div class="mb3">
                    <button class="btn btn-primary" type="submit">Create Project</button>
                </div>
            </div>
        </div>
    </form>
@endsection