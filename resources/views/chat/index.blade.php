@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($users as $user)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="w-100">
                                        {{ $user->name }}</a>
                                    </div>
                                    <div class="w-50">
                                        <a class="btn btn-info text-white w-100"
                                            href="{{ route('chat.show', $user->id) }}">Chat</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
