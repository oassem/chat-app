@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <a href="{{ route('chat', $user) }}" class="btn btn-primary">Chat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
