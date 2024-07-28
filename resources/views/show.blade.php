@extends('layout')

@section('content')
@auth
<div class="card" style="width: 18rem;">
    @if ($servicio->image)
        <img src="/storage/{{ $servicio->image }}" class="card-img-top" alt="{{ $servicio->titulo }}">
    @else
        <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $servicio->titulo }}">
    @endif
    <div class="card-body">
        <h5 class="card-title">{{ $servicio->titulo }}</h5>
        <p class="card-text">{{ $servicio->descripcion }}</p>
        <p class="card-text"><small class="text-muted">{{ $servicio->created_at->diffForHumans() }}</small></p>
        <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</div>
@endauth
@endsection

