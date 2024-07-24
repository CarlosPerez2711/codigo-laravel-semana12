@extends('layout')

@section('content')
        <h2>Personas</h2>
    <table class="table">
        <tr>
            @if ($personas)
                @foreach ($personas as $persona)
                    <td>
                        <a href="{{ route('personas.show', ['nPerCodigo' => $persona->nPerCodigo]) }}">{{ $persona->cPerNombre }} {{ $persona->cPerApellido }}</a>
                    </td>
                @endforeach
                
            @else
                <td colspan="4">No hay personas</td>
            @endif
            
        </tr>
        <tr>
            <td colspan="4">
                {{$personas->links('pagination::bootstrap-4')}}
            </td>
        </tr>
        
    </table>
@endsection

