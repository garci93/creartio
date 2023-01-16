<x-head-layout>
    <div class="flex mx-auto items-center">
        <a class="flex font-medium rounded-lg mx-auto items-center bg-fuchsia-600 text-white m-4 p-2 rounded hover:bg-fuchsia-500 hover:text-gray-100"
            href="/reportes/create">Crear nuevo reporte</a>
    </div>
    <table border="1" class="flex mx-auto w-3/4 p-20 border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Reportador</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Reportado</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Razón del reporte</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                @foreach($reportes as $reporte)
                <td class="w-1/12 p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$reporte->reportador}}</td>
                <td class="w-1/12 p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$reporte->reportado}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold"></span>{{$reporte->razon}}</td>
                <td class="w-1/12 p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <div>
                        <a href={{url('/reportes/'.$reportes[0]->id.'/edit')}} class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-1 px-2.5 rounded">Editar</a>
                        <form action="/reportes/{{ $reportes[0]->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Estás seguro?')" class="mt-2 px-2 py-1 text-white font-bold bg-gray-400 hover:bg-gray-600 rounded" type="submit">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-head-layout>
