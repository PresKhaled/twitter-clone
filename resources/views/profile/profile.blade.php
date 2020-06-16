@extends('layouts.index')

@section('content')
    <div class="col-lg-8">

        <header class="text-center mt-5 mb-5">
            <h2>{{ $user->name }}</h2>
            <p>Joined since {{ $user->created_at->diffForHumans() }}</p>
            @unless(auth()->user()->is($user))
                <form action="{{ route('toggleFollow', $user->username) }}" method="POST">
                    @csrf
                <button id="publish-btn" class="btn {{ auth()->user()->following($user->id) ? 'btn-success publish-btn-success' : 'btn-primary' }}" style="border-radius: 25px; color: #fff"> {{ auth()->user()->following($user->id) ? 'Following' : 'Follow' }} </button>
                </form>
            @endunless
            
            @can('edit', $user) {{-- UserPolicy --}}
                <a href="{{ route('editProfile', $user->username) }}" class="btn btn-secondary float-right mr-2">Edit Profile</a>
            @endcan
        </header>

        <main class="p-2">
            <div class="tweets">
                @foreach ($tweets as $tweet)
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5><a href="{{ route('profile', $user->username) }}">{{ $user->name }}</a></h5>
                            <p>{{ $tweet->body }}</p>
                            <p>{{ $tweet->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="person-tweets-pagination text-center p-5">
                    {{ $tweets->links() }}
                </div>

            </div>
        </main>

    </div>
@endsection