@extends('layouts.app')

@section('content')
  <form action="{{ route('send') }}" method="post">
    @csrf 
      <div class="form-group mb-2">
        <label for="to">To</label>
        <select class="form-control" name="to" id="to">
          @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group mb-2">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" value="{{$subject}}">
      </div>
      <div class="form-group mb-2">
        <label for="body">Body</label>
        <textarea name="body" id="body" class="form-control" placeholder="Enter Body"></textarea>
      </div>
      <button type="submit" class="btn btn-primary float-end">Send</button>
  </form>
@endsection

