<x-profile :sharedData=$sharedData>
    <div class="list-group">
      @foreach ($following as $followeduser)
        <a href="/profile/{{$followeduser->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
          <img class="avatar-tiny" src="{{$followeduser->userBeingFollowed->avatar}}" />
          {{$followeduser->userBeingFollowed->username}}
        </a>
      @endforeach
    </div>
</x-profile>