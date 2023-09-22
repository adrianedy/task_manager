@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="container">
    <h1>Create Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputUser" class="form-label">User</label>
            <select id="inputUser" class="form-select" name="user_id">
                <option selected>Select user</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($task->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputStatus" class="form-label">Status</label>
            <select id="inputStatus" class="form-select" name="status_id">
                <option selected>Select status</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" @if($task->status_id == $status->id) selected @endif>{{ $status->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $task->title }}">
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Description</label>
            <textarea class="form-control" id="inputDescription" rows="3" name="description">{{ $task->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="inputNote" class="form-label">Note</label>
            <textarea class="form-control" id="inputNote" rows="3" name="note">{{ $task->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection