@extends('layouts.base')

@section('contenido')

    <style>
        .nav.nav-tabs, .nav-link, .nav-link.active{
            font-size: 16px;
            color: white;
        }

        .nav-tabs .nav-link{
            background: rgb(154, 172, 189);
            border: none;
            border-radius: 0px;
            width: 200px;
            height: 30px;
            margin-right: 15px;
            padding-top:4px;
        }

        .nav-tabs .nav-link.active{
            background: rgb(44, 113, 176);
            color: white;
        }
        
        .card{
            border: none;
            border-radius: 0px;
            margin-bottom: 20px;
        }

        .card .card-header{
            border-radius: 0px;
            background: rgb(44, 113, 176);
            font-size: 15px;
            color: white;
            height: 30px;
            padding-top:4px;
        }

        .card .card-body{
            background: rgb(241, 241, 241);
        }

        .row .card{
            border-radius: 15px;
        }

        .row .card .card-body{
            background: white;
            height: 100%;
        }

        .row .card .card-header{
            background: rgb(167, 47, 47);
        }

        #contenedor-add{
            margin-top: 10px;
            width: 100%;
        }

        #contenedor-add .agregar{
            background: #F1F1F1;
            width: 100%;
            border: none;
            border-top: dashed 2px #E3E3E3;
            border-bottom: dashed 2px #E3E3E3;
            font-weight: bold;
            color: #B6B6B6;
        }

    </style>

    <nav>
        @include('layouts.nav')
    </nav>

    <div class="tab-content" id="nav-tabContent" style="margin:20px;">

        <div class="tab-pane fade show active" id="nav-proyecto" role="tabpanel" aria-labelledby="nav-proyecto-tab">
        </div>

        <div class="tab-pane fade" id="nav-solicitud" role="tabpanel" aria-labelledby="nav-solicitud-tab">
        </div>

        <div class="tab-pane fade" id="nav-adminPanel" role="tabpanel" aria-labelledby="nav-adminPanel-tab">
        </div>
    </div>

    <script>
        ///var myModal = document.getElementById('exampleModal')
        //var myInput = document.getElementById('myInput')
        var ruta = document.getElementById('ruta');

        $(document).ready(function(){
            $(document).on('click','#nav-proyecto-tab',function(){
                ruta.innerText = 'Inicio / Mis Proyecto';
                $.ajax({
                    type: "GET",
                    url: "/proyectos",
                    success:function(data){
                        $("#nav-solicitud").empty();
                        $("#nav-adminPanel").empty();
                        $("#nav-proyecto").html(data);
                    }
                });
            });
        });

        /*$('#nav-proyecto-tab').click(function(){
            $.ajax({
                url: "/proyectos",
                success:function(data){
                    $("#nav-proyecto").html(data);
                }
            });
        });*/

        $(document).ready(function(){
            $(document).on('click','#nav-solicitud-tab',function(){
                ruta.innerText = 'Inicio / Mis Solicitudes';
                $.ajax({
                    type: "GET",
                    url: "/solicitudes",
                    success:function(data){
                        $("#nav-solicitud").html(data);
                    }
                });
            });
        });

        $('#nav-adminPanel-tab').click(function(){
            ruta.innerText = 'Inicio / Panel Administrativo';
            $.ajax({
                url: "/adminPanel",
                success:function(data){
                    $("#nav-adminPanel").html(data);
                }
            });
        });

        /*myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })*/
    </script>

@endsection