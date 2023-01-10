<x-app-layout>
    <table class="grid justify-items-center px-40">
		<thead class="w-full grid justify-items-center">
			{{-- <tr class="w-full border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="w-1/4 bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
				<th class="w-1/4 bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Autor</th>
				<th class="w-1/4 bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Imagen</th>
				<th class="w-1/4 bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
			</tr> --}}
		</thead>
		<tbody class="block md:table-row-group">
			<tr class="h-1/2 bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                @foreach($publicaciones as $publicacion)
				<td class="w-1/4 p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/4 md:hidden font-bold"></span>{{$publicacion->titulo}}</td>
				<td class="w-1/4 p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/4 md:hidden font-bold"></span>{{$publicacion->texto}}</td>
				<td class="w-1/4  p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <a href={{url('/publicaciones/'.$publicacion->id)}}>
                        <img class="h-full" src={{Storage::disk('s3')->url('images/'.$publicacion->archivo->nombre.'.'.$publicacion->archivo->extension)}} alt="">
                    </a>
				<td class="w-1/4 p-2 md:border md:border-grey-500 text-left block md:table-cell">
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
	</table>
</x-app-layout>
