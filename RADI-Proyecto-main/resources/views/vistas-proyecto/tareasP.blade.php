<div id="tareas">
    <div class="card document">
        <div class="card-header">
            <p>Lista de Tareas</p>
            <div class="d-flex flex-row-reverse" style="margin-right: 15px;">
                <button class="btn btn-success" id="myInput" data-bs-toggle="modal" data-bs-target="#tareaModal">Nueva Tarea <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">
                    <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834-1v1h.916v-1h-.916zm1.833 1h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column" style="margin-top:50px";>

        <table class="table-sortable">
                <thead>
                    <tr>
                        <th class="titulo-tabla" id="titulo-analizar" scope="col">Analizar</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Caducidad</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="container-list" id="lista-analizar">
                    @foreach($proyecto->Tareas as $t)
                        @if($t->Fase->nombreEstado == 'Analizar')
                        <tr id='{{$t->id}}'>
                            <th class="col-md-2 titulo-tarea" scope="row">{{$t->titulo}}</th>
                            <td class="col-md-2">{{$t->Usuario->name}} {{$t->Usuario->apellidoPaterno}} {{$t->Usuario->apellidoMaterno}}</td>
                            <td class="col-md-4">{{$t->descripcion}}</td>
                            <td class="col-md-1">{{$t->fechaFinal}}</td>
                            <td class="col-md-2">
                                <select onchange='cambiaEstado(event,{{$t->id}})' class="form-select" id="encargadoInput" name="encargadoInput">
                                    <option value=8 @if($t->Estado->nombreEstado == 'Por hacer') selected @endif>Por hacer</option>
                                    <option value=9 @if($t->Estado->nombreEstado == 'En proceso') selected @endif>En proceso</option>
                                    <option value=10 @if($t->Estado->nombreEstado == 'Terminada') selected @endif>Terminada</option>
                                </select>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
        </table>
        
        <br><br>

        <table class="table-sortable">
                <thead>
                    <tr>
                        <th class="titulo-tabla" id="titulo-disenar" scope="col">Diseñar</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Caducidad</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="container-list" id="lista-disenar">
                    @foreach($proyecto->Tareas as $t)
                        @if($t->Fase->nombreEstado == 'Diseñar')
                        <tr id='{{$t->id}}'>
                            <th class="col-md-2 titulo-tarea" scope="row">{{$t->titulo}}</th>
                            <td class="col-md-2">{{$t->Usuario->name}} {{$t->Usuario->apellidoPaterno}} {{$t->Usuario->apellidoMaterno}}</td>
                            <td class="col-md-4">{{$t->descripcion}}</td>
                            <td class="col-md-1">{{$t->fechaFinal}}</td>
                            <td class="col-md-2">
                                <select onchange='cambiaEstado(event,{{$t->id}})' class="form-select" id="encargadoInput" name="encargadoInput">
                                    <option value=8 @if($t->Estado->nombreEstado == 'Por hacer') selected @endif>Por hacer</option>
                                    <option value=9 @if($t->Estado->nombreEstado == 'En proceso') selected @endif>En proceso</option>
                                    <option value=10 @if($t->Estado->nombreEstado == 'Terminada') selected @endif>Terminada</option>
                                </select>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
        </table>               
        
        <br><br>

        <table class="table-sortable">
                <thead>
                    <tr>
                        <th class="titulo-tabla" id="titulo-desarrollar" scope="col">Desarrollar</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Caducidad</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="container-list" id="lista-desarrollar">
                    @foreach($proyecto->Tareas as $t)
                        @if($t->Fase->nombreEstado == 'Desarrollar')
                        <tr id='{{$t->id}}'>
                            <th class="col-md-2 titulo-tarea" scope="row">{{$t->titulo}}</th>
                            <td class="col-md-2">{{$t->Usuario->name}} {{$t->Usuario->apellidoPaterno}} {{$t->Usuario->apellidoMaterno}}</td>
                            <td class="col-md-4">{{$t->descripcion}}</td>
                            <td class="col-md-1">{{$t->fechaFinal}}</td>
                            <td class="col-md-2">
                                <select onchange='cambiaEstado(event,{{$t->id}})' class="form-select" id="encargadoInput" name="encargadoInput">
                                    <option value=8 @if($t->Estado->nombreEstado == 'Por hacer') selected @endif>Por hacer</option>
                                    <option value=9 @if($t->Estado->nombreEstado == 'En proceso') selected @endif>En proceso</option>
                                    <option value=10 @if($t->Estado->nombreEstado == 'Terminada') selected @endif>Terminada</option>
                                </select>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
        </table>
                        
        <br><br>

        <table class="table-sortable">
                <thead>
                    <tr>
                        <th class="titulo-tabla" id="titulo-evaluar" scope="col">Evaluar</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Caducidad</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="container-list" id="lista-evaluar">
                    @foreach($proyecto->Tareas as $t)
                        @if($t->Fase->nombreEstado == 'Evaluar')
                        <tr id='{{$t->id}}'>
                            <th class="col-md-2 titulo-tarea" scope="row">{{$t->titulo}}</th>
                            <td class="col-md-2">{{$t->Usuario->name}} {{$t->Usuario->apellidoPaterno}} {{$t->Usuario->apellidoMaterno}}</td>
                            <td class="col-md-4">{{$t->descripcion}}</td>
                            <td class="col-md-1">{{$t->fechaFinal}}</td>
                            <td class="col-md-2">
                                <select onchange='cambiaEstado(event,{{$t->id}})' class="form-select" id="encargadoInput" name="encargadoInput">
                                    <option value=8 @if($t->Estado->nombreEstado == 'Por hacer') selected @endif>Por hacer</option>
                                    <option value=9 @if($t->Estado->nombreEstado == 'En proceso') selected @endif>En proceso</option>
                                    <option value=10 @if($t->Estado->nombreEstado == 'Terminada') selected @endif>Terminada</option>
                                </select>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
        </table>
    </div>

    <!-- Modal crear tarea-->
    <div class="modal fade" id="tareaModal" tabindex="-1" aria-labelledby="tareaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" style="padding:0%;">
                    <div class="card" style="width:100%">
                        <div class="card-header">
                            Formato de tarea
                            <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                                    </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/crearTarea" id="modal-formulario" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input hidden type="number" class="form-control" id="proyectoInput" name="proyectoInput" value={{$proyecto->id}}>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tituloInput">Título/Nombre de la tarea</label>
                                        <input type="text" class="form-control" id="tituloInput" name="tituloInput" placeholder="Ingresa el nombre de la tarea">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="encargadoInput">Encargado de la tarea</label>
                                            <select class="form-select" id="encargadoInput" name="encargadoInput">
                                            @foreach($proyecto->Integrantes as $i)
                                                @if(!($i->Rol->nombreRol == 'Cliente'))
                                                <option value={{$i->Usuario->id}}>{{$i->Usuario->name}} {{$i->Usuario->apellidoPaterno}} {{$i->Usuario->apellidoMaterno}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="descripcionInput">Descripción de la tarea</label>
                                        <textarea class="form-control" id="descripcionInput" name="descripcionInput" rows="3"></textarea>
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
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="etapaInput">Etapa del proyecto en la que se encuentra</label>
                                            <select class="form-select" id="etapaInput" name="etapaInput">
                                                <option value=4>Analizar</option>
                                                <option value=5>Diseñar</option>
                                                <option value=6>Desarrollar</option>
                                                <option value=7>Evaluar</option>
                                            </select>
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
</div>

<script>
    function cambiaEstado(event, ide){
        var selectElement = event.target;
        var value = selectElement.value;

        if(selectElement.value == 8)
            selectElement.style.background = "#b53636";
        else if(selectElement.value == 9)
            selectElement.style.background = "#b58736";
        else if(selectElement.value == 10)
            selectElement.style.background = "#41b536";

        $.ajax({
                type: "POST",
                url: '/cambiarEstadoTarea',
                data: {"_token": "{{ csrf_token() }}", id: ide, estado: value},
                success: function()
                {
                }
            });
    }

    $(document).ready(function(){
        
        $( "select" ).each(function() {
            //this.style.color = 'white';

            if(this.value == 8)
                this.style.background = "#b53636";
            else if(this.value == 9)
                this.style.background = "#b58736";
            else if(this.value == 10)
                this.style.background = "#41b536";
        });
    });
</script>