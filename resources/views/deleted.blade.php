@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header"><strong>{{ __('Deleted Message') }}</strong></div>

        <div class="card-body">            
            @if(count($messages) > 0)
                <ul class="list-group">
                    @foreach($messages as $message)
                        <li class="list-group-item">
                            <strong>From: {{ $message->userFrom->name }}, {{ $message->userFrom->email }}</strong>
                                | Subject: {{ $message->subject }}
                            <a href="{{ route('return', $message->id) }}" class="btn btn-warning float-end btn-sm" >Restore</a>
                        </li>           
                    @endforeach
                </ul>
            @else
                <p>There is no message yet!</p>
            @endif
        </div>
    </div>
        
@endsection
