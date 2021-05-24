<!DOCTYPE html>
<html>
    <head>
        <title>.: SISCOL :.</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        <link type="text/css" rel="stylesheet" href="../../../includes/css/login.otro.css" />
        <link type="text/css" rel="stylesheet" href="../../../includes/css/estilos.css" />
        <link rel="shortcut icon" href="../../../includes/imagenes/logo.ico" />
        <script type="text/javascript" src="../../../includes/js/jquery-ui-1.10.0/js/jquery-1.9.0.js"></script>
        {literal}
            <style type="text/css">
                .oculto { display: none; }
                .visible { display: inline; }
                #cont1 {
                    float:left;
                    margin-left:5px;
                    margin-right:5px;
                    margin-top: 20px;
                    color:#666666;
                    width:400px;
                    text-align: center;
                }
            </style>
             
            <script>
                 $(document).ready(function(){
                    $("#sincro").click(function(event) {

                        if($("#cotizacion").val() == '' || $("#cotizacion").val() == '0' || $("#cotizacion").val() == 0){
                            alert('¡Debe indicar la cotizacion del dia! (Debe ser mayor a 0)');
                            $("#cotizacion").focus();
                            return false;
                        }
                        
                        window.location=window.confirm("Se aperturará con la siguiente cotizacion:"+$("#cotizacion").val()+" ¿Desea Continuar?")?"../principal/apertura_tienda.php?generar=si&bandera=1&cotizacion="+$("#cotizacion").val():"?opt_menu=106"; 
                     
                    });
                  
                });

                 function nobackbutton(){
                 window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
               window.onhashchange=function(){window.location.hash="no-back-button";}
            }

            </script>
          
        {/literal}
    </head>
    <body onload="nobackbutton();">
        <div id="login">
            <div id="logo" style="text-align:center">
                <img src="../../../includes/imagenes/siscolp.png"/>
            </div>
            <div id="cont1">
               {if $usuarioB==1 }
                   <h2>
                        <div>Para desbloquear el sistema, debe <u>Aperturar Tienda</u> en el Siguiente LINK:
                        </div>  
                   </h2> 
                    <div style="margin-top:10px;cursor:pointer">
                       <label for="cotizacion">
                        <b>Cotización del Día</b> <br />
                        <b>1$ Dólar = </b> 
                        <input type="text" name="cotizacion" id="cotizacion" placeholder="Cotización del Día" class="form-text" />
                        <b>Bs.</b> 
                       </label>
                       <h3 id="sincro" style="color:green;cursor:pointer">Apertura de Tienda</h3>
                    </div> 
               {else}
                  <h2>
                    <div>Para desbloquera debe ingresar con permisos de administrador</div>  
                  </h2>
               {/if}
                <div style="margin-top: 20px;">
                    <a style="font-size:15px" href="../principal/index.php?logout=off">Volver al inicio</a>
                </div>
            </div>
        </div>
    </body>
</html>