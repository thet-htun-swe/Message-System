@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><strong>{{ __('Inbox') }}</strong></div>

        <div class="card-body">            
            @if(count($messages) > 0)
                <ul class="list-group">
                    @foreach($messages as $message)
                        <a href="{{ route('read', $message->id) }}" class="list-group-item list-group-item-action" aria-current="true">
                            <strong>From: {{ $message->userFrom->name }}, {{ $message->userFrom->email }}</strong>
                                | Subject: {{ $message->subject }}
                        </a>
                    @endforeach
                </ul>
            @else
                <p>There is no message yet!</p>
            @endif
        </div>
    </div>
        
@endsection
