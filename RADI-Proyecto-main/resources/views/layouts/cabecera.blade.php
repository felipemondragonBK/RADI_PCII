<nav class="navbar navbar-light" style="background-color:#A72F2F;padding:0%;height: auto;">
    <div style="background-color: #2C71B0;width: 218px; height: 90px;"></div>

    <a class="navbar-brand" href="/home" style="padding:0%; position: absolute;">
        <img src="{{asset('storage/logo.png')}}" style="width:530px">
    </a>

    <div class="d-flex flex-row-reverse" style="margin-right: 15px;margin-top: 15px;">
        <div class="d-flex flex-row">
            <svg style="height:50px ;margin-top: -5px;margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <div class="d-flex flex-column" style="margin-right: 10px;">
                <a style="margin-bottom:0px;margin-top: 0px;color: white;">
                    {{ Auth::user()->name }} {{ Auth::user()->apellidoPaterno }} {{ Auth::user()->apellidoMaterno }}
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>

<nav class="navbar navbar-light" style="background-color:rgba(255, 192, 69, 1);margin-top: 15px;padding:0%;height: auto;">
    <div style="background-color: #2C71B0;width: 65%; height: 30px; border-radius: 0px 100px 500px 0px;"></div>
    
    <a href="#" style="padding:0%; position: absolute;color:white;">
        <svg style="margin-left: 5px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
        </svg>
        <div class="vr" style="position: absolute;height: 25px;width: 2px; color: white; margin-left: 5px;"></div>
    </a>

    <p id = "ruta" style="margin-bottom:0px;color: white; position: absolute;margin-left: 50px;">Inicio</p>

    <div class="d-flex flex-row-reverse" style="margin-right: 100px;">
        <p style="margin-bottom:0px;color: black;">“Siempre Autónoma. Por mi patria educaré.”</p>
    </div>
</nav>