<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style media="screen">
    * {
      margin: 0;
      padding: 0;
    }

    #imagns {
      background-size: contain;
    }

    .imgs {
      height: 100vh;
      width: 100%;
      background: url("{{asset('storage/imagen1.jpeg')}}") left, url("{{asset('storage/imagen2.jpg')}}") right;
      background-repeat: no-repeat;
    }

    .login {
      justify-content: center;
      text-align: center;
      padding: 0.5rem;
      width: 45%;
      height: auto;
    }

    .titulo {
      background-color: #a72f2fd6;
    }

    .titulo h1 {
      color: white;
      padding: 10px;
    }

    .cabecera {
      display: flex;
      background-color:rgba(255, 192, 69, 1);
      margin-top: 15px;
      padding:0%;
      height: auto;
    }

    .formulario {
      background-color: white;
      padding: 2em;
    }

    .formulario a {
      align-content: flex-start;
    }

    .formulario p {
      font-weight: bold;
    }
    </style>
  </head>
    <body class="imgs" id="imagns">
      <div class="login position-absolute top-50 start-50 translate-middle">
        <div class="titulo">
          <h1 class="display-3">RADI</h1>
          <h1 class="display-5">
            Registro de Actividades del Departamento de Informática
          </h1>
          <div class="cabecera">
            <div style="background-color: #2C71B0;width: 35%; height: 60px; clip-path: polygon(0% 0%, 75% 0%, 88% 50%, 75% 100%, 0% 100%);"></div>
            <div class="d-flex flex-row-reverse" style="margin-right: 100px;">
              <p style="margin-top: 20px;color: black;font-weight: 500">“Siempre Autónoma. Por mi patria educaré.”</p>
            </div>
          </div>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="formulario">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"
                  ><i class="fa-solid fa-user"></i
                ></span>
                <input
                  id="email"
                  type="email"
                  class="form-control border border-2 border-dark @error('email') is-invalid @enderror"
                  placeholder="Ingrese su email"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"
                  ><i class="fa-solid fa-lock"></i
                ></span>
                <input
                  id="password"
                  type="password"
                  class="form-control border border-2 border-dark @error('password') is-invalid @enderror"
                  placeholder="Contraseña"
                  aria-label="Password"
                  aria-describedby="basic-addon1"
                  name="password" required autocomplete="current-password"
                />
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>  @enderror
              </div>
              @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('¿Olvidaste tu contraseña?') }}
                  </a>
              @endif
              <br/><br/>
              <button
                type="submit"
                class="btn btn-primary btn-lg"
                style="background-color: #6f94dd"
              >
                {{ __('Entrar') }}
              </button>
              <a class="btn btn-primary btn-lg" style="background-color: #6f94dd; margin-left: 1rem;" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
              <br /><br />
              <p>
                UASLP Av. Parque Chapultepec 1050 Zona Universitaria 78260 San
                Luis, S.L.P. +52 (444) 123456 ext 5436
              </p>
            </div>
          </form>
        </div>
      </div>
    </body>
</html>
