@extends('layouts.index')

@section('content')
<div class="col-lg-8 pr-5 pl-5">
    <main>
        <div class="tweeters">
            @foreach($users as $user)
                <div class="tweeter p-2">
                    <a href="{{ route('profile', $user->username) }}"><p class="h5">{{ $user->name }}</p></a>
                    <a href="{{ route('profile', $user->username) }}"><span>{{ '@' . $user->username }}</span></a>
                </div>

                @unless ($loop->last)
                    <hr />
                @endunless

            @endforeach

            <div class="tweeters-pagination text-center p-5">
                {{ $users->links() }}
            </div>
        </div>
        
    </main>
</div>
@endsection