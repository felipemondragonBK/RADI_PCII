<style>
    .state {
        position: relative;
    }

    .state .btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        font-weight: bold;
    }
</style>

@foreach($solicitudes as $s)
        <div class="card">
            <div class="card-header">
                {{$s->asuntoSolicitud}}
                <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                        </svg>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Nombre del solicitante: </rol>{{$s->UsuarioCliente->name}} {{$s->UsuarioCliente->apellidoPaterno}} {{$s->UsuarioCliente->apellidoMaterno}}</p>
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Solicitud enviada a: </rol>{{$s->UsuarioLider->name}} {{$s->UsuarioLider->apellidoPaterno}} {{$s->UsuarioLider->apellidoMaterno}}</p>
                                <br>
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Fecha de solicitud: </rol>{{$s->fechaSolicitud}}</p>
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Fecha de inicio del proyecto: </rol>{{$s->fechaInicio}}</p>
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Fecha de termino del proyecto: </rol>{{$s->fechaFin}}</p>
                                <br>
                                <p class="card-text" style="margin:0px;"><rol style="font-weight:bold;">Descripcion:</p>
                                <p class="card-text">{{$s->descripcionSolic}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card text-center" value="">
                            <div class="card-header">
                                Estado
                            </div>
                            <div class="card-body state" style="color:#E7E7E7">
                                @if(Auth::user()->id  == $s->UsuarioCliente->id)
                                    @if($s->Estado->nombreEstado == "Enviada")
                                    <h5 class="card-title" style="color: #cbf5c6">Solicitud enviada</h5>
                                    <svg style="color: #cbf5c6" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                    @endif
                                @else
                                    @if($s->Estado->nombreEstado == "Enviada")
                                    <h5 class="card-title" style="color: #fff4ab">Solicitud pendiente de revisar</h5>
                                    <svg style="color: #fff4ab" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-exclamation" viewBox="0 0 16 16">
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                    @endif
                                @endif
                                @if($s->Estado->nombreEstado == "Rechazada")
                                    <h5 class="card-title" style="color: #ffabab">Solicitud rechazada</h5>
                                    <svg style="color: #ffabab" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                @endif
                                @if($s->Estado->nombreEstado == "Aceptada")
                                    <h5 class="card-title" style="color: #abffb1">Solicitud aceptada</h5>
                                    <svg style="color: #abffb1" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                @endif

                                @if(!($s->Estado->nombreEstado == 'Aceptada'))
                                    <button type="button" id="btn" value="{{$s->id}}" class="btn btn-outline-success revisarS d-none" >Revisar</button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endforeach

<div id="contenedor-add" style="width: 100%;">
    <button class="agregar" id="myInput" data-bs-toggle="modal" data-bs-target="#solicitudProyectoModal">Nueva Solicitud</button>
</div>

<!-- Modal crear solicitud-->
<div class="modal fade" id="solicitudProyectoModal" tabindex="-1" aria-labelledby="solicitudProyectoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="padding:0%;">
                <div class="card" style="width:100%">
                    <div class="card-header">
                        Formato de solicitud de proyecto
                        <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/crearSolicitud" id="modal-formulario" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input hidden type="date" id="fechaSolicitudInput" name="fechaSolicitudInput" value="<?php echo date('Y-m-d'); ?>" />
                            <input hidden type="number" id="estadoSolicitudInput" name="estadoSolicitudInput" value="1" >
                            <div class="col">
                                <div class="form-group">
                                    <label for="tituloInput">Título/Nombre del proyecto</label>
                                    <input type="text" class="form-control" id="tituloInput" name="tituloInput" placeholder="Ingresa el nombre del proyecto">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="clienteInput">Cliente</label>
                                        <select class="form-select" id="clienteInput" name="clienteInput" blocked>
                                        @foreach($usuarios as $s)
                                            @if(Auth::user()->id  == $s->id)
                                                <option value={{$s->id}}>{{$s->name}} {{$s->apellidoPaterno}} {{$s->apellidoMaterno}}</option>
                                            @endif
                                        @endforeach
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
                                            @foreach($usuarios as $s)
                                                @if(!(Auth::user()->id  == $s->id) && !($s->tipoUsuario == 1))
                                                    <option value={{$s->id}}>{{$s->name}} {{$s->apellidoPaterno}} {{$s->apellidoMaterno}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col">
                                <div class="form-group">
                                    <label for="descripcionInput">Descripción del proyecto</label>
                                    <textarea class="form-control" id="descripcionInput" name="descripcionInput" rows="3"></textarea>
                                    <br>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" lang="es">
                                        <label class="custom-file-label" for="file">Adjuntar archivo si se desea</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inicioInput">Fecha de inicio</label>
                                        <input type="date" class="form-control" id="inicioInput" name="inicioInput" placeholder="Ingrese la fecha de inicio">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="terminoInput">Fecha de termino</label>
                                        <input type="date" class="form-control" id="terminoInput" name="terminoInput" placeholder="Ingrese la fecha de termino">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    /*$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })*/

    //Animacion del estado de la solicitud
    $( ".card-body.state" ).hover(function() {
        $( this ).fadeOut( 500 );
        $( this ).fadeIn( 500 );
        $(".btn").toggleClass('d-none');
    });

    /*$(document).ready(function(){
        $(document).on('click','.agregabtn',function(){
            $('#modal-general').modal('show');
        });
    });*/

    //Funcion para agregar una nueva solicitud sin tener que recargar toda la página
    $("#modal-formulario").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        /*var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                $('#solicitudProyectoModal').modal('hide');
                $("#nav-solicitud").html(data);
            }
        });*/

        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/crearSolicitud')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#solicitudProyectoModal').modal('hide');
                $("#nav-solicitud").html(data);
            }
        });
    });

    $(document).ready(function(){
        $(document).on('click','#btn',function(){
            var ide = $(this).val();
            $.ajax({
                type: "GET",
                url: "/solicitud/"+ide,
                success:function(data){
                    $("#nav-solicitud").html(data);
                }
            });
        });
    });
</script>