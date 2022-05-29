<div class="d-flex flex-row">
    <div class="d-inline-flex p-2">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" style="border-radius: 5px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p style="font-size: 18px;color: white;background: rgb(44, 113, 176);margin:0px;border-radius:5px 5px 0px 0px;text-align:center;padding:5px;border-bottom: solid 2px white;">Documentos</p>
                @foreach($proyecto->Documentos as $d)
                    <button style="border-radius: 0px;border-bottom: solid 2px white; width:150px;" class="nav-link" id="nav-documento-btn" onclick="cargaDocumento({{$d->id}})" value="{{$d->id}}" data-bs-toggle="pill" data-bs-target="#nav-documento" type="button" role="tab" aria-controls="v-pills-documento" aria-selected="false">{{$d->etiqueta}}</button>
                @endforeach
                <button class="agregar" data-bs-toggle="modal" data-bs-target="#solicitudProyectoModal">Agregar documento</button>
            </div>
        </div>
    </div>
    <div class="vr" style="height: auto;width: 1px;"></div>
    <div class="d-flex flex-column" style="padding:20px;width:100%">
        <div class="tab-content" id="tab-content">
            <div id="nav-plantilla" role="tabpanel" aria-labelledby="v-pills-documento-tab">
            </div>
        </div>
    </div>
</div>

<!-- Modal crear nuevo documento-->
<div class="modal fade" id="solicitudProyectoModal" tabindex="-1" aria-labelledby="solicitudProyectoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="padding:0%;">
                <div style="width:100%">
                    <div class="card-header">
                        Agregar nuevo documento
                        <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/crearDocumento" id="modal-formulario" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input hidden type="number" id="id" name="id" value={{$proyecto->id}} >
                            <div class="col">
                                <div class="form-group">
                                    <label for="tituloInput">Etiqueta/Nombre del documento</label>
                                    <input type="text" class="form-control" id="tituloInput" name="tituloInput" placeholder="Ingresa el nombre del documento">
                                </div>
                            </div>
                            <br>
                            <div class="col">
                                <div class="form-group">
                                    <label for="descripcionInput">Agrega documento</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" lang="es">
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

    //Funcion para agregar una nueva solicitud sin tener que recargar toda la página
    $("#modal-formulario").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/crearDocumento')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#solicitudProyectoModal').modal('hide');
                $("#nav-documento").html(data);
            }
        });
    });

    function cargaDocumento(id){
        $.ajax({
            url: "/documento/" + id,
            success:function(data){
                $("#nav-plantilla").html(data);
            }
        });
    }

    //Funcion para agregar una nueva solicitud sin tener que recargar toda la página
    $("#comentario").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "{{ url('/publicarComentario')}}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            /*success: (data) => {
                //$('#solicitudProyectoModal').modal('hide');
                $("#nav-plantilla").html(data);
            }*/
        });
    });
</script>