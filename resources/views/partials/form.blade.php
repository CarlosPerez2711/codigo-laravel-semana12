@csrf
<table>
    <tr>
        <td>
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Seleccione archivo</label>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="display: flex; align-items: center;">
                <label for="titulo" style="margin-right: 95px;">Titulo</label>
                <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $servicio->titulo) }}">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="display: flex; align-items: center;">
                <label for="descripcion" style="margin-right: 50px;">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $servicio->descripcion) }}">
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><button>{{$btnText}}</button></td>
    </tr>
</table>




