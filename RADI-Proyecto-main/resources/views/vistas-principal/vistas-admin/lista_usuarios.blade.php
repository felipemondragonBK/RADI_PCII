<h4>Lista de usuarios registrados</h4>
<br>
<div class="card document text-center">
    <div class="card-header">
        Usuarios registrados
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Eliminar cuenta</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    @if($u->tipoUsuario != 1)
                    <tr>
                        <th scope="row">{{$u->id}}</th>
                        <td>{{$u->name}}</td>
                        <td>{{$u->apellidoPaterno}} {{$u->apellidoMaterno}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            <button class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>    
    </div>
</div>