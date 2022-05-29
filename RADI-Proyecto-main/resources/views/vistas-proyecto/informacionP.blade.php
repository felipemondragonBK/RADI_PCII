<style>
    #info .btn {
    color: #d1d1d1; /* White text */
    cursor: pointer; /* Mouse pointer on hover */
    margin:0px;
    margin-top:-2px;
    margin-left:2px;
    padding-right: 5px;
    padding-left: 5px;
    padding-top:0px;
    padding-bottom:0px;
    }

    /* Darker background on mouse-over */
    #info .btn:hover {
    background-color: #d1d1d1;
    border-radius: 500px;
    }
</style>

<form action="/modificarProyecto" method="POST" id="formulario-proyecto" enctype='multipart/form-data'>
@csrf
    <input hidden type="number" id="idProyecto" name="idProyecto" value={{$proyecto->id}}>
    <input hidden type="number" id="usuariosCantidad" name="usuariosCantidad" value=0>
    <div id="info">
        <!--<div class="card document">
            <div class="card-header" >
                <p id="titulo-proyecto">
                    {{$proyecto->nombre}}
                    <a class="btn d-block" onclick='creaFormulario()'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg>
                    </a>
                </p>
            </div>
        </div>-->

        <div class="card document">
            <div class="card-header">
                <h5 class="d-flex flex-row" style="font-weight:bold;margin-top:3px;">
                    <p style="padding:0px;margin:0px;" id="titulo-proyecto">{{$proyecto->nombre}}</p>

                    @if(Auth::user()->id  == $lider[0]->Usuario->id)
                        <a class="btn d-block" id="edit-btn"onclick='creaFormulario()'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </a>
                    @endif
                </h5>
            </div>
        </div>

        <div class="card" id="card-descripcion">
            <div class="card-header">
                Descripción
                <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                        </svg>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-around">
                        <div class="d-flex flex-row col-2">
                        <p style="font-weight: bold;">Fecha de inicio: </p> <p id="fechaInicio">{{$proyecto->fechaInicio}}</p>
                        </div >

                        <div class="d-flex flex-row col-2">
                        <p style="font-weight: bold;">Fecha de termino: </p> <p id="fechaFinal">{{$proyecto->fechaFinal}}</p>
                        </div>
                    </div>
                    <br>
                    <div id="box-descripcion">
                        <p id="descripcion">{{$proyecto->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="integrantes-card">
            <div class="card-header">
                Interesados y contactos
                <div class="d-flex flex-row-reverse" style="margin-top:-19px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                        </svg>
                </div>
            </div>
            <div class="card-body">
                <div class="d-inline-flex p-2">
                    <div class="d-flex flex-column">
                        <div class="callout callout-primary">
                            <h6>{{$proyecto->Integrantes[0]->Rol->nombreRol}}</h6>
                            <p>{{$proyecto->Integrantes[0]->Usuario->name}} {{$proyecto->Integrantes[0]->Usuario->apellidoPaterno}} {{$proyecto->Integrantes[0]->Usuario->apellidoMaterno}}</p>
                            <p>{{$proyecto->Integrantes[0]->Usuario->email}}</p>
                        </div>
                        <div class="callout callout-primary">
                            <h6>Involucrados</h6>
                            <div class="d-flex flex-wrap" id="box-miembros">
                                @foreach($proyecto->Integrantes as $i)
                                    @if(!($i->Rol->nombreRol == 'Cliente'))
                                        <div class="callout callout-primary">
                                            <h6>{{$i->Rol->nombreRol}}</h6>
                                            {{$i->Usuario->name}} {{$i->Usuario->apellidoPaterno}} {{$i->Usuario->apellidoPaterno}}
                                            <p>{{$i->Usuario->email}}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="band"></div>
</form>

