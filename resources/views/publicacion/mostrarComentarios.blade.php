<x-simple-layout>
    @if (!isset($comentarios))
        $comentarios = [];
    @endif
    @foreach($comentarios as $comentario)
    <div class="mostrar-comentario" @if($comentario->padre_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comentario->usuario->nombre }}</strong>
        <p>{{ $comentario->fortalezas }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comentarios.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="fortalezas" class="form-control" />
                <input type="hidden" name="publicacion_id" value="{{ $publicacion_id }}" />
                <input type="hidden" name="padre_id" value="{{ $comentario->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reply" />
            </div>
        </form>
        @include('publicacion.mostrarComentarios', ['comentarios' => $comentario->comentarios])
    </div>
@endforeach
</x-simple-layout>
