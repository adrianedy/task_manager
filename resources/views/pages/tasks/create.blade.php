@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="container">
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inputUser" class="form-label">User</label>
            <select id="inputUser" class="form-select" name="user_id">
                <option selected>Select user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputStatus" class="form-label">Status</label>
            <select id="inputStatus" class="form-select" name="status_id">
                <option selected>Select status</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea class="form-control" id="inputDescription" rows="3" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="inputNote" class="form-label">Note</label>
            <textarea class="form-control" id="inputNote" rows="3" name="note"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection