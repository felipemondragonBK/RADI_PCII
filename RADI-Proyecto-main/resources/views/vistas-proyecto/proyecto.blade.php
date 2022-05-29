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

        .nav-pills{
            background: rgb(154, 172, 189);
            margin: 5px;
        }

        .nav-tabs .nav-link.active{
            background: rgb(44, 113, 176);
            color: white;
        }

        #nav-tab-sec{
            background: rgb(44, 113, 176);
            padding-top: 15px;
            padding-left: 45px;
            border-bottom: solid 1px #838383;
        }

        #nav-tab-sec .nav-link{
            background: rgb(199, 169, 110);
            border-radius: 5px 5px 0px 0px;
            height: 25px;
            padding-top:1px;
        }

        #nav-tab-sec .nav-link.active{
            background: rgb(255, 192, 69);
        }

        .card{
            border: none;
            border-radius: 0px;
            margin-bottom: 100px;
        }

        .card .card-header{
            border-radius: 0px;
            font-size: 16px;
            height: 30px;
            padding-top:4px;
            background: #ECECEC;
            border: none;
            border-left: solid #B0B0B0 3px;
            font-weight: bold;
        }

        .document{
            margin-bottom: 30px;
        }

        .document .card-header{
            background: rgb(44, 113, 176);
            font-size: 18px;
            height: 35px;
            vertical-align: center;
            border:none;
            border-radius: 5px 5px 0px 0px;
            color: white;
        }

        .card-act{
            background: rgb(44, 113, 176);
            font-size: 18px;
            height: 35px;
            vertical-align: center;
            border:none;
            border-radius: 0px 0px 5px 5px;
            color: white;
        }

        .document .card-body{
            border: solid 1px #ECECEC;
            border-top: 0px;
            border-bottom: 0px;
            height: 500px;
            vertical-align: center;
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

        .callout {
            padding: 20px;
            margin: 20px;
            border: 1px solid #eee;
            border-left-width: 5px;
            border-radius: 3px;
            width: auto;
            h6 {
                margin-top: 0;
                margin-bottom: 5px;
            }
            p:last-child {
                margin-bottom: 0;
            }
            code {
                border-radius: 3px;
            }
            & + .bs-callout {
                margin-top: -5px;
            }
        }

        .callout-primary{
            border-left-color: #428bca;
        }

        .callout-primary h6{
            color: #428bca;
        }
        .callout-primary p{
            color: #428bca;
            font-weight: bold;
        }

        .table-riesgos{
            background: #F1F1F1;
        }

        .table-riesgos thead{
            background: #1E63A2;
            color: white;
            text-align: center;
        }

        .table-riesgos tbody{
            border-top: solid 0px white;
        }

        .table-riesgos tbody td{
            background: white;
            border-radius: 10px;
            margin: 100px;
        }

        .table-sortable{
            color: #B5B5B5;
            background: #F5F6F8;
        }

        .table-sortable td, .table-sortable th{
            border: solid 2px white;
            height: 35px;
            padding-left: 5px;
        }

        .table-sortable thead tr th{
            background: white;
            font-size: 12px;
            font-weight: normal;
            vertical-align: bottom;
        }

        .table-sortable .titulo-tabla{
            font-size: 18px;
        }

        #titulo-analizar{color: #5CDE47;}
        #titulo-disenar{color: #A1C667;}
        #titulo-desarrollar{color: #F2AF4B;}
        #titulo-evaluar{color: #DF4F4F;}

        .table-sortable .titulo-tarea{
            color: black;
        }

        .agregar{
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
        @include('layouts.navProyecto')
    </nav>

    <div class="tab-content" id="nav-tabContent" style="margin:20px;">
        <div class="tab-pane fade show active" id="nav-informacion" role="tabpanel" aria-labelledby="nav-informacion-tab"></div>

        <div class="tab-pane fade" id="nav-documentos" role="tabpanel" aria-labelledby="nav-documentos-tab"></div>

        <div class="tab-pane fade" id="nav-tareas" role="tabpanel" aria-labelledby="nav-tareas-tab"></div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        //variable para saber cuantos miembros se agregaran
        var ruta = document.getElementById('ruta');
        ruta.innerText = 'Proyecto / ';

        function creaFormulario(){
            //Formulario para el nombre del proyecto
            $(this).toggleClass('d-none');
            var titulo = document.getElementById('titulo-proyecto');
            var tituloform = document.createElement("input");
            tituloform.setAttribute('id', 'tituloInput');
            tituloform.setAttribute('name', 'tituloInput');
            tituloform.setAttribute('class', 'form-control');
            tituloform.setAttribute('type', 'text');
            tituloform.setAttribute('value',$("#titulo-proyecto").text());
            titulo.replaceWith(tituloform);

            //Formulario para la fecha de inicio
            var fechaInicio = document.getElementById('fechaInicio');
            var fechaInicioform = document.createElement("input");
            fechaInicioform.setAttribute('id', 'fechainicioInput');
            fechaInicioform.setAttribute('name', 'fechainicioInput');
            fechaInicioform.setAttribute('type', 'date');
            fechaInicioform.setAttribute('class', 'form-control');
            fechaInicioform.setAttribute('value',$("#fechaInicio").text());
            fechaInicio.replaceWith(fechaInicioform);

            //Formulario para la fecha de fin
            var fechaFin = document.getElementById('fechaFinal');
            var fechaFinform = document.createElement("input");
            fechaFinform.setAttribute('id', 'fechafinalInput');
            fechaFinform.setAttribute('name', 'fechafinalInput');
            fechaFinform.setAttribute('type', 'date');
            fechaFinform.setAttribute('class', 'form-control');
            fechaFinform.setAttribute('value',$("#fechaFinal").text());
            fechaFin.replaceWith(fechaFinform);


            //Formulario para la descripcion
            var descripcion = document.getElementById('descripcion');
            var descripcionform = document.createElement("TEXTAREA");
            descripcionform.setAttribute('id','descripcionInput');
            descripcionform.setAttribute('name','descripcionInput');
            descripcionform.setAttribute('rows','3');
            descripcionform.setAttribute('class','form-control');
            descripcionform.innerText = $("#descripcion").text();
            descripcion.replaceWith(descripcionform);
            var card = document.getElementById('card-descripcion');
            card.setAttribute('style','margin-bottom:50px;');

            //Boton para agregar un formulario de agregar miembros
            var miembros = document.getElementById('box-miembros');
            var add = document.createElement("div");
            add.setAttribute('class',"callout callout-primary position-relative");
            add.setAttribute('id',"agregarMiembro-btn");

            var agregarl = document.createElement("a");
            agregarl.setAttribute('type','button');
            agregarl.setAttribute('class','stretched-link');
            agregarl.setAttribute('onclick','agregar()');
            agregarl.setAttribute('id','miembro-link');

            var agregar = document.createElement('h6');
            agregar.appendChild(agregarl);

            add.appendChild(agregar);
            miembros.appendChild(add);
            $('#miembro-link').text('Agregar miembro al equipo');

            var integrantes = document.getElementById('band');
            var boton = document.createElement("button");
            boton.setAttribute('type','submit');
            boton.setAttribute('class','btn btn-primary');
            boton.innerText = 'Guardar';

            integrantes.parentNode.insertBefore(boton, integrantes);

        }
        
        /*$(document).ready(function(){
            $(document).on('click','#edit-btn',function(){
            });
        });*/

        /*Funcion para agregar un nuevo miembro al equipo*/
        function agregar(){
            var miembro = document.createElement("div");
            miembro.setAttribute('class',"callout callout-primary");
            miembro.setAttribute('id',"miembro1");
            
            var usuarioSelect = document.createElement("select");
            usuarioSelect.setAttribute('class', 'form-select');
            usuarioSelect.setAttribute('id', 'miembroInput[]');
            usuarioSelect.setAttribute('name', 'miembroInput[]');

            //Actualizar la cantidad de usuarios para poder mandarlo a la peticion desde el formulario
            var usuariosCantidad = document.getElementById('usuariosCantidad');
            //usuariosCantidad.setAttribute('value', numMiembro);

            $.ajax({
                type: "GET",
                url: "/getUsuarios",
                success:function(usuarios){
                    for(var i in usuarios){
                        if(usuarios[i].tipoUsuario != 1){
                            var usuarioOption = document.createElement("option");
                            usuarioOption.innerText = usuarios[i].name + ' ' + usuarios[i].apellidoPaterno + ' ' + usuarios[i].apellidoMaterno;
                            usuarioOption.setAttribute('value', usuarios[i].id);
                            usuarioSelect.appendChild(usuarioOption);
                        }
                    }
                }
            });


            miembro.appendChild(usuarioSelect);

            var agregador = document.getElementById("agregarMiembro-btn");
            agregador.parentNode.insertBefore(miembro, agregador);

            //document.body.insertBefore(miembro, agregador);
        }

        //ACTUALIZAR LA INFORMACION DEL PROYECTO
        $("#formulario-proyecto").submit(function(e) {
            //e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    //$("#nav-informacion").empty();
                    //$("#info").remove();
                    //$("#nav-informacion").html(data);
                }
            });
        });
        
        $('#nav-informacion-tab').click(function(){
            ruta.innerText = 'Proyecto / Informarcion';
            $.ajax({
                url: "/informacion/"+{{$id}},
                success:function(data){
                    $("#info").remove();
                    $("#nav-informacion").empty();
                    //$("#nav-informacion") = null;
                    $("#nav-informacion").html(data);
                }
            });
        });

        $('#nav-documentos-tab').click(function(){
            ruta.innerText = 'Proyecto / Documentos';
            $.ajax({
                url: "/documentos/"+{{$id}},
                success:function(data){
                    //$("#info").remove();
                    //$("#nav-informacion").empty();
                    $("#nav-documentos").html(data);
                }
            });
        });

        $(document).ready(function(){
            $(document).on('click','#nav-tareas-tab',function(){
                ruta.innerText = 'Proyecto / Tareas';
                $.ajax({
                    type: "GET",
                    url: "/proyecto/"+{{$id}}+"/tareas",
                    success:function(data){
                        $("#nav-tareas").html(data);
                        const listaA = document.getElementById('lista-analizar');
                        const listaD = document.getElementById('lista-disenar');
                        const listaDe = document.getElementById('lista-desarrollar');
                        const listaE = document.getElementById('lista-evaluar');

                        new Sortable(listaA, {
                            group: {
                                name: 'shared'
                            },
                            animation: 150,

                            onAdd:(event)=>{
                                cambiandoFase(event.item.id,4)
                            },
                        });

                        new Sortable(listaD, {
                            group: {
                                name: 'shared'
                            },
                            animation: 150,

                            onAdd:(event)=>{
                                cambiandoFase(event.item.id,5)
                            },
                        });

                        new Sortable(listaDe, {
                            group: {
                                name: 'shared'
                            },
                            animation: 150,

                            onAdd:(event)=>{
                                cambiandoFase(event.item.id,6)
                            },
                        });

                        new Sortable(listaE, {
                            group: {
                                name: 'shared'
                            },
                            animation: 150,

                            onAdd:(event)=>{
                                cambiandoFase(event.item.id,7)
                            },
                        });
                    }
                });
            });
        });

        function cambiandoFase(ide,fasee){
            $.ajax({
                type: "POST",
                url: '/cambiarFaseTarea',
                data: {"_token": "{{ csrf_token() }}", id: ide,fase:fasee},
                success: function()
                {
                }
            });
        }

        /*$('#nav-tareas-tab').click(function(){
            $.ajax({
                url: "/proyecto/"+{{$id}}+"/tareas",
                success:function(data){
                    $("#nav-tareas").html(data);
                    const listaA = document.getElementById('lista-analizar');
                    const listaD = document.getElementById('lista-disenar');
                    const listaDe = document.getElementById('lista-desarrollar');
                    const listaE = document.getElementById('lista-evaluar');

                    new Sortable(listaA, {
                        group: {
                            name: 'shared'
                        },
                        animation: 150
                    });

                    new Sortable(listaD, {
                        group: {
                            name: 'shared'
                        },
                        animation: 150
                    });

                    new Sortable(listaDe, {
                        group: {
                            name: 'shared'
                        },
                        animation: 150
                    });

                    new Sortable(listaE, {
                        group: {
                            name: 'shared'
                        },
                        animation: 150
                    });
                }
            });
        });*/

        $("#modal-formulario").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    $("#tareas").remove();
                    $("#nav-tareas").empty();
                    $("#nav-tareas").html(data);
                }
            });
        });
    </script>
@endsection