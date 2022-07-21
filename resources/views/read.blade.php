@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      From: {{ $message->userFrom->name }}
      <br>
      Email: {{ $message->userFrom->email }}
      <br>
      Subject: {{ $message->subject }}
    </div>
    <div class="card-body">
      Message
      <br>
      {{ $message->body }}
      <br>
      <br>
      <a href="{{ route('create', [$message->userFrom->id, $message->subject] ) }}" class="btn btn-primary btn-sm">Reply</a>
      <a href="{{ route('delete', $message->id ) }}" class="btn btn-danger btn-sm float-end">Delete</a>
    </div>
  </div>
@endsection
