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
</style>

<div class="d-flex flex-row">
    <div class="d-inline-flex p-2">
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" style="border-radius: 5px;" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p style="font-size: 18px;color: white;background: rgb(44, 113, 176);margin:0px;border-radius:5px 5px 0px 0px;text-align:center;padding:5px;border-bottom: solid 2px white;">Usuarios</p>
                <button style="border-radius: 0px;border-bottom: solid 2px white;" class="nav-link" id="nav-acta-tab" data-bs-toggle="pill" data-bs-target="#nav-acta" type="button" role="tab" aria-controls="v-pills-acta" aria-selected="true">Administrar solicitudes</button>
                <button style="border-radius: 0px;border-bottom: solid 2px white;" class="nav-link" id="nav-riesgos-tab" data-bs-toggle="pill" data-bs-target="#nav-riesgos" type="button" role="tab" aria-controls="v-pills-riesgos" aria-selected="false">Administrar usuarios</button>
                <button style="border-radius: 0px;border-bottom: solid 2px white;" class="nav-link" id="nav-cambios-tab" data-bs-toggle="pill" data-bs-target="#nav-cambios" type="button" role="tab" aria-controls="v-pills-cambios" aria-selected="false">Agregar usuario</button>
            </div>
        </div>
    </div>
    <div class="vr" style="height: auto;width: 1px;"></div>
    <div class="d-flex flex-column" style="padding:20px;width:100%">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade" id="nav-acta" role="tabpanel" aria-labelledby="v-pills-acta-tab">
            </div>
            <div class="tab-pane fade" id="nav-riesgos" role="tabpanel" aria-labelledby="v-pills-riesgos-tab">
            </div>
            <div class="tab-pane fade" id="nav-cambios" role="tabpanel" aria-labelledby="v-pills-cambios-tab">
            </div>
            <div class="tab-pane fade" id="nav-matriz" role="tabpanel" aria-labelledby="v-pills-matriz-tab">
            </div>
        </div>
    </div>
</div>

<script>
    $('#nav-acta-tab').click(function(){
        $.ajax({
            url: "/usuarios",
            success:function(data){
                $("#nav-acta").html(data);
            }
        });
    });

    $('#nav-riesgos-tab').click(function(){
        $.ajax({
            url: "/usuarios",
            success:function(data){
                $("#nav-riesgos").html(data);
            }
        });
    });

    $('#nav-cambios-tab').click(function(){
        $.ajax({
            url: "/cambios",
            success:function(data){
                $("#nav-cambios").html(data);
            }
        });
    });

    $('#nav-matriz-tab').click(function(){
        $.ajax({
            url: "/matriz",
            success:function(data){
                $("#nav-matriz").html(data);
            }
        });
    });
</script>