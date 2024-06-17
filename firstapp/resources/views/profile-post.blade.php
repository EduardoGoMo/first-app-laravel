<x-layout>
    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="{{$avatar}}" /> {{$username}}

          @auth
            @if (!$currentlyFollowing AND auth()->user()->id != $username)
              <form class="ml-2 d-inline" action="/follow/{{$username}}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
              </form>

            @else
              <form class="ml-2 d-inline" action="/unfollow/{{$username}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
              </form>
            @endif

            @if (auth()->user()->username == $username)
              <a href="/manage-avatar" class="btn btn-secondary btn-sm">Editar avatar</a>
            @endif
          @endauth
        </h2>
  
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$postCount}}</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>
  
        <div class="list-group">
          @foreach ($posts as $post)
            <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
              <img class="avatar-tiny" src="{{$post->user->avatar}}" />
              <strong>{{$post->title}}</strong> on {{$post->created_at->format('d-m-Y')}}
            </a>
          @endforeach
        </div>
      </div>
</x-layout>