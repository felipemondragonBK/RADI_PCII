@foreach($relaciones as $r)
@php
    $p = $r->Proyecto;
@endphp
<div class="card position-relative">
    <div class="card-header">
        <titulo style="font-weight:bold;">{{$p->nombre}}</titulo>
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
                        <p class="card-text" style="margin-bottom:3px;font-weight:bold;">Involucrados:</p>
                            @foreach($p->Integrantes as $i)
                                <p class="card-text" style="margin:0px;margin-left:7px;"><rol style="font-weight:bold;">{{$i->Rol->nombreRol}}:</rol> {{$i->Usuario->name}} {{$i->Usuario->apellidoPaterno}} {{$i->Usuario->apellidoPaterno}} </p>
                            @endforeach
                        <!--<p class="card-text">Cliente: Andrés de Jesús Sánchez Angulo</p>
                        <p class="card-text">Líder del equipo: Ing. Luis Felipe Mondragón Cuevas</p>
                        <p class="card-text">Miembros: Ing. Keivin Damagd Sustaita Martínez, Ing. Dannia Itzel Briones Medina, Ing. José Emmanuel Arreguín Bustos, Ing. Daniel Isaac Chávez Torres.</p>-->
                        <p class="card-text" style="margin-top:15px;font-weight:bold;margin-bottom:3px;">Descripción:</p>
                        <p>{{$p->descripcion}}</p>
                        <a href="/proyecto/{{$p->id}}" class="stretched-link">Ver proyecto</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-header">
                        Progreso
                    </div>
                    <div class="card-body">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <br>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                        </div>
                        <br>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <br>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <br>
                        <br>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Analizar</div>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Diseñar</div>
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Desarrollar</div>
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Evaluar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach