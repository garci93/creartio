<form action="{{url('/galerias/'.$galeria->id)}}" method="post">
	@csrf
	@method('PATCH')
	<div>
		<input type="text" name="titulo" value="{{$datos_galeria[0]->titulo}}">
		<label for="titulo">Título</label>
	</div>
	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
</form>