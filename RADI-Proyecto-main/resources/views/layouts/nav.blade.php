<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link" id="nav-proyecto-tab" data-bs-toggle="tab" data-bs-target="#nav-proyecto" type="button" role="tab" aria-controls="nav-proyecto" aria-selected="true">Mis Proyectos</button>
    <button class="nav-link" id="nav-solicitud-tab" data-bs-toggle="tab" data-bs-target="#nav-solicitud" type="button" role="tab" aria-controls="nav-solicitud" aria-selected="false">Solicitud</button>
    @if(Auth::user()->tipoUsuario  == 1)
        <button class="nav-link" id="nav-adminPanel-tab" data-bs-toggle="tab" data-bs-target="#nav-adminPanel" type="button" role="tab" aria-controls="nav-adminPanel" aria-selected="false">Admin Panel</button>
    @endif
</div>