@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header"><strong>{{ __('Sent Messages') }}</strong></div>
    <div class="card-body">
      @if (count($messages) > 0)
        <ul class="list-group">
          @foreach ($messages as $message)
            <li class="list-group-item">
              <strong>To:</strong> {{ $message->userTo->name }}, {{ $message->userTo->email }} | <strong>Subject:</strong> {{ $message->subject }}
              @if ($message->read)
                  <span class="badge bg-success float-end">READ</span>
              @endif 
            </li>
          @endforeach
        </ul>
      @else
        There is no sent message yet!
      @endif
    </div>
  </div>
@endsection
