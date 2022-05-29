<h4>{{$documento->etiqueta}}</h4>
<br>
<div class="card document text-center">
    <div class="card-header">
        {{$documento->nombre}}
    </div>
    <div class="card-body" style="height:500px;">
        <embed src="{{$documento->ruta}}" type="application/pdf" width="90%" height="100%" />
    </div>
    <div class="card-footer text-muted">
        Actualizado el: {{$documento->updated_at}}
    </div>
    <div class="card-footer" style="border-radius: 0px 0px 5px 5px;">
        <form action="/actualizarDocumento" id="documento" method="POST" enctype="multipart/form-data">
            @csrf
            <input hidden type="number" class="form-control" id="idDocumento" name="idDocumento" value={{$documento->id}}>
            <div class="form-group">
                <label for="file">Actualizar documento</label>
                <div class="custom-file" id="file-container">
                    <input type="file" onchange='activaBoton()' class="custom-file-input" id="file" name="file" lang="es">  
                </div>
            </div>
        </form>
    </div>
</div>

<h5>Versíon anterior</h5>
@if($documento->VersionAnterior)
    <div class="position-relative">
        <img src="{{asset('storage/thumb.png')}}"><br>
        <a class="card-text stretched-link" style="margin:18px; text-decoration: none;" href="{{ asset($documento->VersionAnterior->ruta)}}" target="_blank" ><rol style="font-weight:bold;"> Descargar</a><br>
    </div>
@endif
<br>
<h5>Comentarios</h5>
<div class="comentarios" style="padding-left: 15px;margin-top:20px">
    @foreach($documento->Comentarios as $c)
        <div class="comentario">
            <h7 style="font-weight:bold;">Ing. {{$c->Usuario->name}} {{$c->Usuario->apellidoPaterno}} {{$c->Usuario->apellidoPaterno}}</h7>
            <p>{{$c->contenido}}</p>
        </div>
    @endforeach
</div>
<div>
    <form action="/publicarComentario" id="comentario" method="POST" enctype="multipart/form-data">
        @csrf
        <input hidden type="number" class="form-control" id="idDocumento" name="idDocumento" value={{$documento->id}}>
        <input hidden type="number" class="form-control" id="idUsuario" name="idUsuario" value={{Auth::user()->id}}>
        <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>
</div>

<script>
    function activaBoton(){
        var input = document.getElementById('file-container');
        var boton = document.createElement("button");
        boton.setAttribute('type','submit');
        boton.setAttribute('class','btn btn-outline-success');
        boton.innerText = 'Actualizar';

        input.parentNode.insertBefore(boton, input);
    }
</script>