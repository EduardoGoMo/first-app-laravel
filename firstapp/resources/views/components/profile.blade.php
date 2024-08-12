<x-layout :doctitle='$doctitle'>
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="{{$sharedData['avatar']}}" /> {{$sharedData['username']}}

          @auth
            @if (!$sharedData['currentlyFollowing'] AND auth()->user()->username != $sharedData['username'])
              <form class="ml-2 d-inline" action="/follow/{{$sharedData['username']}}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
              </form>
            @endif

            @if($sharedData['currentlyFollowing'])
              <form class="ml-2 d-inline" action="/unfollow/{{$sharedData['username']}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
              </form>
            @endif

            @if (auth()->user()->username == $sharedData['username'])
              <a href="/manage-avatar" class="btn btn-secondary btn-sm">Editar avatar</a>
              <a href="/profile/{{$sharedData['username']}}/form-gallery" class="btn btn-primary btn-sm">Editar galería</a>
            @endif
          @endauth
        </h2>

        <div class="owl-carousel mt-4">
          @foreach($sharedData['gallery'] as $image)
            <div class="item">
              <img src="{{ asset('storage/gallery/' . $image->image) }}" alt="Imagen" />
            </div>
          @endforeach
        </div>

        <div class="profile-nav nav nav-tabs pt-2 mb-4 mt-4">
          <a href="/profile/{{$sharedData['username']}}" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "" ? "active" : "" }}">Posts: {{$sharedData['postCount']}}</a>
          <a href="/profile/{{$sharedData['username']}}/followers" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "followers" ? "active" : "" }}">Followers: {{$sharedData['followersCount']}}</a>
          <a href="/profile/{{$sharedData['username']}}/following" class="profile-nav-link nav-item nav-link {{ Request::segment(3) == "following" ? "active" : "" }}">Following: {{$sharedData['followingCount']}}</a>
        </div>

        <div class="profile-slot-content">
            {{$slot}}
        </div>

      </div>
</x-layout>