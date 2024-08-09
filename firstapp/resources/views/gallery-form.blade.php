<x-layout>
    <div class="container py-md-5 container--narrow">
        <h2 class="text-center mb-3">Editar galería</h2>
        <form class="dropzone" id="my-dropzone" method="POST" action="{{ route('user.storeGallery', $sharedData['username'])}}" enctype="multipart/form-data">
            @csrf
        </form>
        <div class="mt-4">
            <button id="submit" class="btn btn-primary">Guardar</button>
            <button class="btn btn-secondary" type="button" onclick="window.history.back()">Cancelar</button>
        </div>
        
        <div class="owl-carousel mt-4">
            @foreach($sharedData['gallery'] as $image)
                <div class="item">
                    <img src="{{ asset('storage/gallery/' . $image->image) }}" alt="Imagen" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>