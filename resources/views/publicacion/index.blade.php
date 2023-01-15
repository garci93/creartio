<x-app-layout>
    <div class="w-full flex flex-wrap justify-items-center px-20 py-40">
        @foreach ($publicaciones as $publicacion)
            <div class="w-1/5 h-56 p-4 my-4 justify-center items-center justify-center justify-items-center">
                {{-- <x-img h-auto wire:loading src={{Storage::disk('s3')->url('layout/loading-white.gif')}} alt=""></x-img> --}}
                    <a class="h-full flex items-center justify-center" href={{url('/publicaciones/'.$publicacion->id)}}>
                        <img class="max-h-full flex items-center" src={{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}} alt="">
                    </a>
                <p class="flex justify-center font-bold">{{$publicacion->titulo}}</p>
                <p class="flex justify-center font-bold">{{$publicacion->usuario->nombre}}</p>
            </div>
        @endforeach
    </div>
    <div class="w-2/12 mx-auto pb-10">
        {{ $publicaciones->links() }}
    </div>
</x-app-layout>
