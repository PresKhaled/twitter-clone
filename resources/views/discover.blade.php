@extends('layouts.index')

@section('content')
<main class="col-lg-8 pr-5 pl-5">

    <div class="create-tweet mb-5">
        <form action="/createTweet" method="POST">
            @csrf
            <div class="form-group">
                <label for="create-tweet-txtarea">Tweet!</label>
                <textarea class="form-control" id="create-tweet-txtarea" rows="6" name="tweet"
                    placeholder="What's your pencil needs to write? No false news!">{{ old('tweet') }}</textarea>
                @error('tweet')
                    <p style="color:red">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Publish</button>
        </form>
    </div>

    @foreach($tweets as $tweet)
        <div class="card mt-3">
            <div class="card-body">
                <p>{{ $tweet->body }}</p>
                <p><a href="{{ route('profile', $tweet->user->username) }}">{{ $tweet->user->name }}</a>
                </p>
            </div>
        </div>
    @endforeach

    <div class="tweets-pagination text-center p-5">
        {{ $tweets->links() }}
    </div>

</main>
@endsection
