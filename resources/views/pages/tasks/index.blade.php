@extends('layouts.app')

@section('title', 'Task List')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td> {{$task->title}} </td>
        <td> {{$task->description }}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection