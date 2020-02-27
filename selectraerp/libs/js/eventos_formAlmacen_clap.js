var eventos_form = {
    vcampos: '',
    formatearNumero: function(objeto) {
        var num = objeto.numero;
        var n = num.toString();
        var nums = n.split('.');
        var newNum = "";
        if (nums.length > 1)
        {
            var dec = nums[1].substring(0, 2);
            newNum = nums[0] + "," + dec;
        }
        else
        {
            newNum = num;
        }
        return newNum;
    },
    cargarProducto: function() {
        $.ajax({
            type: 'GET',
            data: 'opt=Selectitem&v1=1',
            url: '../../libs/php/ajax/ajax.php',
            beforeSend: function() {
                $("#items").find("option").remove();
                $("#items").append("<option value=''>Cargando..</option>");
            },
            success: function(data) {
                $("#items").find("option").remove();
                
                this.vcampos = eval(data);
					$("#items").append("<option value=''>Seleccione..</option>");
                for (i = 0; i <= this.vcampos.length; i++) {
                    $("#items").append("<option value='" + this.vcampos[i].id_item + "'>" + this.vcampos[i].descripcion1 + " " + this.vcampos[i].id_item + " " + this.vcampos[i].cod_item + "</option>");
                }
            }
        });
    },
    cargarAlmacenes: function() {
        $.ajax({
            type: 'GET',
            data: 'opt=getAlmacen',
            url: '../../libs/php/ajax/ajax.php',
            beforeSend: function() {
                $("#almacen").find("option").remove();
                $("#almacen").append("<option value=''>Cargando..</option>");
            },
            success: function(data) {
                $("#almacen").find("option").remove();
                this.vcampos = eval(data);
                     $("#almacen").append("<option value='0'>Seleccione...</option>");
                for (i = 0; i <= this.vcampos.length; i++) {
                    $("#almacen").append("<option value='" + this.vcampos[i].cod_almacen + "'>" + this.vcampos[i].descripcion + "</option>");
                }
            }
        });
    },
    cargartipo_uso: function() {
        $.ajax({
            type: 'GET',
            data: 'opt=gettipo_uso',
            url: '../../libs/php/ajax/ajax.php',
            beforeSend: function() {
                $("#tipo_uso1").find("option").remove();
                $("#tipo_uso1").append("<option value=''>Cargando..</option>");
            },
            success: function(data) {
                $("#tipo_uso1").find("option").remove();
                this.vcampos = eval(data);
                     $("#tipo_uso1").append("<option value='0'>Seleccione...</option>");
                for (i = 0; i <= this.vcampos.length; i++) {
                    $("#tipo_uso1").append("<option value='" + this.vcampos[i].id + "'>" + this.vcampos[i].tipo + "</option>");
                }
            }
        });
    },
     
   

   
    init: function() {
        this.cargarProducto();
        this.cargarAlmacenes();
        this.cargartipo_uso();       
        this.Limpiar();
        $("#observacion").hide();
        $("#fecha_vencimiento").hide();
        
      
    },
    Limpiar: function() {

        $("#cantidadunitaria, #items,#items_descripcion,#codigoBarra, #almacen, #descripcionitem, #codigofabricante,#cantidadunitaria,#costounitario, #totalitem_tmp,#cantidaddeberia,#observacion,#cantidad_existente,#fVencimiento,#nlote,#fecha_vencimiento,#estatus_producto,#observacion1,#tipo_uso").val("");
    },
    IncluirRegistros: function(options) {
        
        var html = "";
        var campos = "";
        $.ajax({
            type: 'GET',
            data: 'opt=DetalleSelectitem&v1=' + options.id_item,
            url: '../../libs/php/ajax/ajax.php',
            success: function(data) {
                vcampos = eval(data);

                campos += $.inputHidden("_id_item", options.id_item, "[]");
                campos += $.inputHidden("_id_almacen", options.id_almacen, "[]");
                campos += $.inputHidden("_cantidad", options.cantidad, "[]");
                campos += $.inputHidden("_ubicacion", options.id_ubicacion, "[]");
                campos += $.inputHidden("_vencimineto", options.vencimiento, "[]");
                campos += $.inputHidden("_lote", options.lote, "[]");
                campos += $.inputHidden("_c_esperada", options.c_esperada, "[]");
                campos += $.inputHidden("_estatus_producto", options.estatus, "[]");
                campos += $.inputHidden("_observacion1", options.observacion, "[]");
                campos += $.inputHidden("_tipo_uso", options.tipo_uso, "[]");
                
                html = "           <tr id ="+options.id_item+">";
                html += "		<td title=\"Haga click aqui para ver el detalle del Item\" class=\"info_detalle\" style=\"cursor:pointer;background-color:#507e95;color:white;\"><a class=\"codigo\" rel=\"facebox\" style=\"color:white;\" href=\"#info\">" + options.id_item + "</a></td>";
                html += "		<td>" + options.descripcion + "</td>";
                html += "		<td>" + options.cantidad + "</td>";
                html += "		<td class=\"eliminar_serial\"><a  rel=\"borrar_serial\" style=\"color:white;\" href=\"#info\"><img style=\"cursor: pointer; float: center;\" class=\"eliminar\"  title=\"Eliminar Item\" src=\"../../libs/imagenes/delete.png\">"+ options.id_item + "</a>" + campos + "</td>";
                html += "           </tr>";
                $(".grid table.lista tbody").append(html);
                eventos_form.CargarDisplayMontos();
                win.hide();
            }
        });
    },
    IncluirSeriales: function(options) {
        var html = "";
        var campos = "";
        $.ajax({
            type: 'GET',
            data: 'opt=agregarSeriales&formulario=' + options.formulario,
            url: '../../libs/php/ajax/ajax.php',
            success: function(data) {
                //vcampos = eval(data);
               //win_tmp.hide();
               //alert(data);
            }
        });
    },
    CargarDisplayMontos: function() {
        cantidad_ = $(".grid table.lista tbody").find("tr").length;
        //alert(cantidad_)
        $(".span_cantidad_items").html("<span style=\"font-size: 10px;\">Cantidad de Items: " + (cantidad_) + "</span>");
        $("input[name='input_cantidad_items']").attr("value", cantidad_);
        var stringDisplay = "<span style='color:green'><b>Cantidad Items(" + cantidad_ + ")</b></span>";
        $("#displaytotal, #displaytotal2").html(stringDisplay);

    },
    GenerarCompraX: function() {
        if ($("#autorizado_por").val() === "") {
            $("#autorizado_por").css("border-color",$(this).val()===""?"red":"");
            $("#autorizado_por").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Responsable");
        }
        else if ($("#id_proveedor").val() === "") {
            $("#id_proveedor").css("border-color",$(this).val()===""?"red":"");
            $("#id_proveedor").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Proveedor");
        }
        else if ($("#nro_documento").val() === "") {
            $("#nro_documento").css("border-color",$(this).val()===""?"red":"");
            $("#nro_documento").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Nro de Documento");
        }

        else if ($("#estado").val() === "") {
            $("#estado").css("border-color",$(this).val()===""?"red":"");
            $("#estado").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Agregar Estado De Procedencia");
        }
        else if ($("#puntodeventa").val() === "") {
            $("#puntodeventa").css("border-color",$(this).val()===""?"red":"");
            $("#puntodeventa").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Agregar Un Punto De Procedencia");
        }
        else if ($("#ubicacion_entrada").val() === "") {
            $("#ubicacion_entrada").css("border-color",$(this).val()===""?"red":"");
            $("#ubicacion_entrada").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar la ubicacion de entrada");
        }
        else if ($("#empresa_transporte").val() === "") {
            $("#empresa_transporte").css("border-color",$(this).val()===""?"red":"");
            $("#empresa_transporte").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar la Empresa de Transporte");
        }
        else if ($("#nacionalidad_conductor").val() === "") {
            $("#nacionalidad_conductor").css("border-color",$(this).val()===""?"red":"");
            $("#nacionalidad_conductor").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Indique la Nacionalidad del Conductor");
        }
        else if ($("#cedula_conductor").val() === "") {
            $("#cedula_conductor").css("border-color",$(this).val()===""?"red":"");
            $("#cedula_conductor").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar la Cédula del Conductor");
        }
        else if ($("#conductor").val() === "") {
            $("#conductor").css("border-color",$(this).val()===""?"red":"");
            $("#conductor").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Nombre del Conductor");
        }
        else if ($("#placa").val() === "") {
            $("#placa").css("border-color",$(this).val()===""?"red":"");
            $("#placa").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar la Placa del Vehiculo");
        }
        else if ($("#codigo_sica").val() === "") {
            $("#codigo_sica").css("border-color",$(this).val()===""?"red":"");
            $("#codigo_sica").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Nro de Guia SUNAGRO ");
        }
        else if ($("#orden_despacho").val() === "") {
            $("#orden_despacho").css("border-color",$(this).val()===""?"red":"");
            $("#orden_despacho").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar la Orden de Despacho ");
        }
        else if ($("#nro_control").val() === "") {
            $("#nro_control").css("border-color",$(this).val()===""?"red":"");
            $("#nro_control").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Nro. Control Factura");
        }
         else if ($("#nro_factura").val() === "") {
            $("#nro_factura").css("border-color",$(this).val()===""?"red":"");
            $("#nro_factura").css("border-width",$(this).val()===""?"1px":"");
            Ext.Msg.alert("Alerta!", "Debe Ingresar el Nro. de Factura");
        }
        else if( $("input[name='input_cantidad_items']").val()==0){
          Ext.Msg.alert("Alerta!", "Debe Ingresar un Producto antes de registrar el movimiento");
          
        }
       
        else{
            $("#formulario").submit();
        }
        return false;
    }
};