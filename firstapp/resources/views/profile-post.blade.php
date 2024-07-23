<x-profile :sharedData=$sharedData doctitle="Perfil de {{$sharedData['username']}}">
  <div class="list-group">
    @foreach ($posts as $post)
      <x-post :post="$post" hideAuthor />
    @endforeach
  </div>
</x-profile>