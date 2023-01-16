<x-app-layout>
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Usuario</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                @foreach ($galerias as $galeria)
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold"></span>{{ $galeria->titulo }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold"></span>{{ $galeria->usuario_id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                        <a href={{ url('/galerias/' . $galeria->id . '/edit') }}
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</a>
                        <form action="/galerias/{{ $galeria->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estás seguro?')"
                                class="px-4 py-1 text-sm text-white bg-red-400 rounded" type="submit">Borrar</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
