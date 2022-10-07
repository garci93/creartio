<form action="{{route("reportes.store")}}" method="post">
	@csrf
	<div>
		<input type="text" name="nombre">
		<label for="nombre">Nombre del usuario reportado</label>
		<input type="text" name="razon">
		<label for="razon">Razón del reporte</label>
	</div>
	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear reporte</button>
</form>