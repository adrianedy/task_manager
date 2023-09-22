@extends('layouts.app')

@section('title', 'Task List')

@section('content')
<div class="container">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<h1>Draft Tasks</h1>
<a class="btn btn-primary"href="{{ route('tasks.create') }}">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($draftTasks as $task)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $task->title}} </td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->created_at }}</td>
        <td>
          <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
          <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="destroy-{{ $task->id }}">
            @csrf
            @method('DELETE')
            <a href="#" onclick="document.getElementById('destroy-{{ $task->id }}').submit()">Delete</a>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $draftTasks->links() !!}

<h1>Published Tasks</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($publishedTasks as $task)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $task->title}} </td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->created_at }}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $publishedTasks->links() !!}

<h1>Validate Tasks</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($validateTasks as $task)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $task->title}} </td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->created_at }}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $validateTasks->links() !!}

<h1>Done Tasks</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Created At</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
    @foreach($doneTasks as $task)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $task->title}} </td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->created_at }}</td>
        <td></td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! $doneTasks->links() !!}
</div>
@endsection