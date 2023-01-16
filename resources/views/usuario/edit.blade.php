<form action="{{url('/usuarios/'.$usuario->id)}}" method="post">
	@csrf
	@method('PATCH')
	<div>
		<input type="text" name="nombre" value={{$datos_usuario[0]->nombre}}>
		<label for="nombre">Nombre</label>
	</div>
	<div>
		<input type="text" name="email" value={{$datos_usuario[0]->email}}>
		<label for="email">Email</label>
	</div>
	<div>
        <select name="rol" default={{$datos_usuario[0]->rol}}>
            <option value="usuario" {{$datos_usuario[0]->rol=='usuario' ? "selected" : ""}}>Usuario</option>
            <option value="admin"{{$datos_usuario[0]->rol=='admin' ? "selected" : ""}}>Administrador</option>
        </select>
		<label for="rol">Rol</label>
	</div>
	<div>
		<input type="text" name="nom_completo" value={{$datos_usuario[0]->nom_completo}}>
		<label for="nom_completo">Nombre completo</label>
	</div>
	<div>
		<input type="hidden" name="biografia" value={{$datos_usuario[0]->biografia}}>
	</div>
	<div>
		<input type="text" name="idioma" value={{$datos_usuario[0]->idioma}}>
		<label for="idioma">Idioma</label>
	</div>
	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Actualizar</button>
</form>
