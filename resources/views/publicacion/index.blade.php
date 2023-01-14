<x-app-layout>
    <div class="w-full flex flex-wrap justify-items-center px-20">
        @foreach($publicaciones as $publicacion)
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
    {{-- <table class="grid justify-items-center px-20">
		<thead class="w-full grid justify-items-center">
		</thead>
		<tbody class="block md:table-row-group">
			<tr class="h-1/2 bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                @foreach($publicaciones as $publicacion)
				<td class="w-1/5 p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/4 md:hidden font-bold"></span>{{$publicacion->titulo}}</td>
				<td class="w-1/5 p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/4 md:hidden font-bold"></span>{{$publicacion->texto}}</td>
                    <td class="w-1/5  p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <x-img h-10 wire:loading src={{Storage::disk('s3')->url('layout/loading-white.gif')}} alt="">
                        <a href={{url('/publicaciones/'.$publicacion->id)}}>
                        <img class="h-full w-full" src={{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}} alt="">
                    </a>
				{{-- <td class="w-1/4 p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<a href={{url('/publicaciones/'.$publicacion->id.'/edit')}} class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Editar</a>
					<form action="/publicaciones/{{ $publicacion->id }}" method="POST">
						@csrf
						@method('DELETE')
						<button onclick="return confirm('¿Estás seguro?')" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-2 rounded" type="submit">Borrar</button>
				    </form>
				</td>
            </tr>
            @endforeach
		</tbody>
	</table> --}}
</x-app-layout>
