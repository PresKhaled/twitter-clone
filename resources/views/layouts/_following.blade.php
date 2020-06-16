<section class="following col-lg-2">
    <h5>Following</h5>
    <div>
        @forelse (auth()->user()->follows as $user)
            <p class="p-2 mb-0" style="color:green !important"><a href="{{ route('profile', $user->username) }}">{{ $user->name }}</a></p>
        @empty
            <p>You don't follow anyone yet!</p>
        @endforelse
    </div>
</section>