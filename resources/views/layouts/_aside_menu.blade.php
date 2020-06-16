<aside class="col-lg-2">
    <h5><a href="{{ route('profile',  auth()->user()->username) }}">{{ auth()->user()->name }}</a></h5>
    <p class="m-0 p-2"><a href="{{ route('discover') }}">Discover</a></p>
    <p class="m-0 p-2">Find Friends</p>
    <p class="m-0 p-2"><a href="{{ route('explore') }}">Explore Tweeters</a></p>
</aside>