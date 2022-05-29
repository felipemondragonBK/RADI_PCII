<br>
<h5>Revisión de solicitud para el proyecto "{{$solicitud->asuntoSolicitud}}"</h5>
<br>

<form @if(Auth::user()->id  == $solicitud->UsuarioLider->id) action="/revisarSolicitud" @else action="/reenviarSolicitud" @endif id="revision-formulario" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col">
        <div class="form-group">
            <input hidden type="number" class="form-control" name="idInput" id="idInput" value={{$solicitud->id}}>

            <label for="tituloInput2">Título/Nombre del proyecto</label>
            <input type="text" class="form-control" name="tituloInput" id="tituloInput" value={{$solicitud->asuntoSolicitud}} name="tituloInput2" placeholder="Ingresa el nombre del proyecto" @if(Auth::user()->id  == $solicitud->UsuarioLider->id) Readonly @endif>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="clienteInput">Cliente</label>
                <select class="form-select" id="clienteInput" name="clienteInput" blocked>
                    <option value={{$solicitud->UsuarioCliente->id}}>{{$solicitud->UsuarioCliente->name}} {{$solicitud->UsuarioCliente->apellidoPaterno}} {{$solicitud->UsuarioCliente->apellidoMaterno}}</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="liderInput">Lider de proyecto</label>
                <select class="form-select" id="liderInput" name="liderInput" aria-label="Seleccion lider proyecto">
                    <option value={{$solicitud->UsuarioCliente->id}}>{{$solicitud->UsuarioLider->name}} {{$solicitud->UsuarioLider->apellidoPaterno}} {{$solicitud->UsuarioLider->apellidoMaterno}}</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <div class="col">
        <div class="form-group">
            <label for="descripcionInput">Descripción del proyecto</label>
            <textarea class="form-control" id="descripcionInput" name="descripcionInput" rows="3" @if(Auth::user()->id  == $solicitud->UsuarioLider->id) Readonly @endif>{{$solicitud->descripcionSolic}}</textarea>
            <br>
            <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Documento adjunto: </p>
            <br>
            <div class="position-relative">
                <img src="{{asset('storage/thumb.png')}}"><br>
                <a class="card-text stretched-link" style="margin:0px; text-decoration: none;" href="{{ asset($solicitud->documentoDescripcion)}}" target="_blank" ><rol style="font-weight:bold;"> Descargar</a><br>
            </div>
            <br>
            @if(Auth::user()->id  == $solicitud->UsuarioCliente->id)
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFileLang" name="file" lang="es" @if(Auth::user()->id  == $solicitud->UsuarioLider->id) Readonly @endif>
                <label class="custom-file-label" for="customFileLang">Reemplazar archivo de solicitud</label>
            </div>
            @endif
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="inicioInput">Fecha de inicio</label>
                <input type="date" class="form-control" id="inicioInput" name="inicioInput" value={{$solicitud->fechaInicio}} name="inicioInput" placeholder="Ingrese la fecha de inicio" @if(Auth::user()->id  == $solicitud->UsuarioLider->id) Readonly @endif>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="terminoInput">Fecha de termino</label>
                <input type="date" class="form-control" id="terminoInput" name="terminoInput" value={{$solicitud->fechaFin}} name="terminoInput" placeholder="Ingrese la fecha de termino" @if(Auth::user()->id  == $solicitud->UsuarioLider->id) Readonly @endif>
            </div>
        </div>
    </div>
    <br><br>
    <h5>Retroalimentación</h5>
    <div class="comentarios">
        <div class="comentario">
            <h7 style="font-weight:bold;">Lider de proyecto {{$solicitud->UsuarioLider->name}} {{$solicitud->UsuarioLider->apellidoPaterno}} {{$solicitud->UsuarioLider->apellidoMaterno}}</h7>
            <p>{{$solicitud->retroalimentacion}}</p>
        </div>
    </div>

    @if(Auth::user()->id  == $solicitud->UsuarioLider->id)
        <textarea class="form-control" id="retroalimentacion" name="retroalimentacion" rows="3" placeholder="Escribe un comentario para el cliente acerca de su solicitud o modifica la que agregaste anteriormente"></textarea>
    @endif
    
    <br>
    
    @if(!($solicitud->Estado->nombreEstado == 'Aceptada'))
        @if(Auth::user()->id  == $solicitud->UsuarioLider->id)
            <button class="btn btn-outline-danger" name="estado" id="estado" type="submit" value=2>Rechazar solicitud</button>
            <button class="btn btn-outline-success" name="estado" id="estado" type="submit" value=3>Aceptar solicitud</button>
            @else
            <button class="btn btn-outline-danger" name="estado" id="estado" type="submit" value=1>Reenviar solicitud</button>
        @endif
    @endif
</form>

<script>
    //Funcion para devolver a la pantalla de solicitudes
    /*$("#estado").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $("#nav-solicitud").html(data);
            }
        });
    });*/
</script>