<form action="{{route("publicaciones.store")}}" method="post">
	@csrf
	<div>
		<input type="text" name="titulo">
		<label for="titulo">Titulo</label>
		<input type="text" name="texto">
		<label for="texto">Texto</label>
	</div>
	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear publicación</button>
</form>