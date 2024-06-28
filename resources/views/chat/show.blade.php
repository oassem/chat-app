@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Chat with {{ $user->name }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($messages as $message)
                                <li class="list-group-item {{ $message->sender_id == auth()->id() ? 'text-right' : '' }}">
                                    <strong>{{ $message->sender_id == auth()->id() ? 'You' : $user->name }}:</strong>
                                    {{ $message->message }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br>
                <form action="{{ route('chat.store', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="3" required></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
