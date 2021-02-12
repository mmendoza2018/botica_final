$(document).ready(function () {
    ver_reporte_dia();
    ver_reporte_sem();
    $("#llega_reporte").load("php/procesos/reportes/ver_tablas.php");
});




// login funcion enviar datos
const enviar = () => {
    user = $("#usuario").val();
    pass = $("#pass").val();

    let val = /[!$%&/?¡'¨*¿:_;]/gi.test(user);
    if (user === "" || pass === "") {
        return Swal.fire({
            icon: "error",
            title: "por favor ingrese los campos obligatorios",
        });
    } else if (val === true) {
        return Swal.fire({
            icon: "error",
            title: "por favor ingrese caracteres validos",
        });
    }
    let datos = "user=" + user + "&pass=" + pass;
    $.ajax({
        type: "POST",
        url: "php/procesos/login.php",
        data: datos,
        success: function(respuesta) {
            if (respuesta === "1") {
                location.href = "menu.php";
            } else if (respuesta === "2") {
                Swal.fire({
                    icon: "error",
                    title: "usuario y/o contraseña no validos",
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "usuario y/o contraseña no validos",
                });
            }
        },
    });
};

//-------------------------------usuario----------------------------------------------

// envio datos de formulario de agrega usuario
// usu_u,dir_u,num_u,nom_u,con_u

const agregar_usuario = () => {
    if ($("#usu_u").val() === "") {
        //$("#id_usu_ag").css( "border-color","red");
        $("#usu_u").addClass("is-invalid");
        $("#alert_u01").text("ingrese campos validos");
        setTimeout(() => {
            $("#usu_u").removeClass("is-invalid");
            $("#alert_u01").hide();
        }, 2500);
    } else if ($("#dir_u").val() === "") {
        $("#dir_u").addClass("is-invalid");
        $("#alert_u02").text("ingrese campos validos");
        setTimeout(() => {
            $("#dir_u").removeClass("is-invalid");
            $("#alert_u02").hide();
        }, 2000);
    } else if ($("#num_u").val() === "" || isNaN($("#num_u").val()) == true) {
        $("#num_u").addClass("is-invalid");
        $("#alert_u03").text("ingrese campos validos");
        setTimeout(() => {
            $("#num_u").removeClass("is-invalid");
            $("#alert_u03").hide();
        }, 2000);
    } else if ($("#s_u2").val() === null) {
        $("#s_u2").addClass("is-invalid");
        setTimeout(() => {
            $("#s_u2").removeClass("is-invalid");
        }, 2000);
    } else if ($("#nom_u").val() === "") {
        $("#nom_u").addClass("is-invalid");
        $("#alert_u04").text("ingrese campos validos");
        setTimeout(() => {
            $("#nom_u").removeClass("is-invalid");
            $("#alert_u04").hide();
        }, 2000);
    } else if ($("#con_u").val() === "") {
        $("#con_u").addClass("is-invalid");
        $("#alert_u05").text("ingrese campos validos");
        setTimeout(() => {
            $("#con_u").removeClass("is-invalid");
            $("#alert_u05").hide();
        }, 2000);
    } else {
        let d = $("#form_agrega_usuario").serialize(event);
        event.preventDefault();
        $.ajax({
            url: "php/procesos/usuario/agrega_usuario.php",
            type: "POST",
            data: d,
            success: function(a) {
                if (a === "1") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "se guardo con exito !",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $("#form_agrega_usuario")[0].reset();
                    $("#llega_tabla_usuario").load(
                        "php/procesos/usuario/vista_tabla.php"
                    );
                }
            },
        });
    }
};

// envio datos de formulario de actualiza usuario

const actualiza_usuario = () => {
    let arr2 = $(".validar_usuario_ac");
    let control = true;
    if (arr2.length > 0) {
        for (i = 0; i < arr2.length; i++) {
            if (arr2[i].value === "" || arr2[i].value === null) {
                alert("Faltan campos por llenar"); //o el mensaje para todos

                control = false;
                break;
            }
        }
    }

    if (control === true) {
        let z = $("#form_actualiza_usuario").serialize(event);
        event.preventDefault();
        Swal.fire({
            title: "Estas seguro de actualizar?",
            text: "esto influira directamente en la base de datos!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "si, estoy seguro!",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "php/procesos/usuario/actualiza_usuario.php",
                    type: "POST",
                    data: z,
                    success: function(a) {
                        // $("#form_actualiza_cot")[0].reset();

                        if (a == "1") {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Actualizado correctamente !",
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            $("#llega_tabla_usuario").load(
                                "php/procesos/usuario/vista_tabla.php"
                            );
                        }
                    },
                });
            }
        });
    }
};

// llenar modal usuario
const llenar_usuario = (d) => {
    let a = [];
    a = d.split("|");

    $("#nom_usu_ac").val(a[0]);
    $("#telf_usu_ac").val(a[1]);
    $("#dir_usu_ac").val(a[2]);
    $("#tipo_usu_ac").val(a[3]);
    $("#id_usu_ac").val(a[4]);
    $("#estado_usu_ac").val(a[5]);
};

//-------------------------------proveedor----------------------------------------------

// envio de datos para agregar

const agregar_proveedor = () => {
   
    //alert($("#s_u").val())
    //nom_pro,dir_pro,num_pro,numd_pro,
    if ($("#nom_pro").val() === "") {
        //$("#id_usu_ag").css( "border-color","red");
        $("#nom_pro").addClass("is-invalid");
        $("#alert01").text("ingrese campos validos");
        setTimeout(() => {
            $("#nom_pro").removeClass("is-invalid");
            $("#alert01").hide();
        }, 2500);
    } else if ($("#dir_pro").val() === "") {
        $("#dir_pro").addClass("is-invalid");
        $("#alert02").text("ingrese campos validos");
        setTimeout(() => {
            $("#dir_pro").removeClass("is-invalid");
            $("#alert02").hide();
        }, 2000);
    } else  {
        let f = $("#form_agrega_prov").serialize(event);
        event.preventDefault();
        $.ajax({
            url: "php/procesos/proveedor/agrega_proveedor.php",
            type: "POST",
            data: f,
            success: function(a) {
                if (a === "1") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "se guardo con exito !",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $("#form_agrega_prov")[0].reset();
                    $("#llega_tabla_proveedor").load(
                        "php/procesos/proveedor/vista_tabla.php"
                    );
                }
            },
        });
    }
};

// validar_proveedor_ag,form_agrega_prov,php/procesos/proveedor/agrega_proveedor.php

// envio de datos para actualizar
const actualizar = () => {
    id = $("#id_pro").val();
    nombre = $("#nombre_pro").val();
    dir = $("#direccion_pro").val();
    telf = $("#telefono_pro").val();
    tipo_doc = $("#tipodoc_pro").val();
    num = $("#numerodoc_pro").val();
    estado = $("#estado_pro").val();

    // id_pro,nombre_pro,direccion_pro,telefono_pro,tipodoc_pro,numerodoc_pro,estado_pro

    var ruta =
        "id=" +
        id +
        "&nombre=" +
        nombre +
        "&dir=" +
        dir +
        "&telf=" +
        telf +
        "&tipo_doc=" +
        tipo_doc +
        "&num=" +
        num +
        "&estado=" +
        estado;
    Swal.fire({
        title: "Estas seguro de actualizar?",
        text: "esto influira directamente en la base de datos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "si, estoy seguro!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "php/procesos/proveedor/actualiza_proveedor.php",
                data: ruta,
                success: function(callese) {
                    //alerttify.correcto(response);
                    if (callese === "1") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Actualizado correctamente !",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $("#llega_tabla_proveedor").load(
                            "php/procesos/proveedor/vista_tabla.php"
                        );
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "hubo un error  !",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                },
            });
        }
    });
};

// funcion para llenar compos
const llenar_prov = (d) => {
    let x = [];
    x = d.split("|");
    $("#id_pro").val(x[0]);
    $("#nombre_pro").val(x[1]);
    $("#direccion_pro").val(x[3]);
    $("#telefono_pro").val(x[2]);
    $("#numerodoc_pro").val(x[4]);
    $("#tipodoc_pro").val(x[5]);
    $("#estado_pro").val(x[6]);
    // id_pro,nombre_pro,telefono_pro,direccion_pro,numerodoc_pro,tipodoc_pro,estado_pro
};

//--------------------------------------------------funciones load----------------------------------------------------

$(document).ready(function() {
    $("#modales").load("vistas/modales.html");
});

$(document).ready(function() {
    $("#llega_tabla_proveedor").load("php/procesos/proveedor/vista_tabla.php");
});

$(document).ready(function() {
    $("#llega_tabla_usuario").load("php/procesos/usuario/vista_tabla.php");
});

$(document).ready(function () {
  $("#llega_tabla_inventario").load("php/procesos/inventario/vista_tabla.php");
});

$(document).ready(function() {
    $("#llega_tabla_cliente").load("php/procesos/cliente/vista_tabla.php");
});

$(document).ready(function() {
    $("#s_u").load("php/procesos/ventas/modal_cli.php");
});

//dasdsa
//--------------------------------producto------------------------------------------

var icon = `<i class="fas fa-user-edit"></i>`;


let tb_data = $('#table-products').DataTable({
    ajax: {
        url: 'php/procesos/productos/all-products.php',
        dataSrc: 'data'
    },

    columns: [
        { data: "nombre_art" },
        { data: "cantidad_art" },
        { data: "descripcion_art" },
        { data: "categoria" },
        { data: "vencimiento", },
        {
            data: "id_art",
            render: function() {
                return '<button type="button" class="edit btn btn-info p-1">' + icon + '</button>';
            }
        },
    ],
    "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
    }

});



$('#btnAdd').click(function() {
    clearinput();
    $('#modal-title').html('Registrar producto');
    // $('#id').val('');
    // $('#name').val('');
    $('#modal-add-product').modal('show');
});


$('#btnSave').click(function() {
    nombre = $("#nombre").val();
    cantidad = $("#cantidad").val();
    precio = $("#precio").val();
    descripcion = $("#descripcion").val();
    estado = $("#estado").val();
    vencimiento = $("#vencimiento").val();

    expresion = /[0-9]+.+[0-9]/;

    /*
        if (nombre === "" || cantidad === "" || precio === "" || descripcion === "" || estado === "" || vencimiento === "") {
            return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'RELLENE LOS CAMPOS VACÍOS!',
                    showConfirmButton: false,
                    timer: 2000
                }) //toastr.error('RELLENE LOS CAMPOS VACÍOS');
        } else if (!expresion.test(precio)) {
            return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'DATOS INCORRECTOS !',
                    showConfirmButton: false,
                    timer: 2000
                }) //toastr.error('DATOS INCORRECTOS');
        }
        /*if(validate_data() == false)
            return false;*/
    if ($("#nombre").val() === "") {
        //$("#id_usu_ag").css( "border-color","red");
        $("#nombre").addClass("is-invalid");
        $("#alert01").text("ingrese campos validos");
        setTimeout(() => {
            $("#nombre").removeClass("is-invalid");
            $("#alert01").hide();
        }, 2500);
    } else if ($("#cantidad").val() === "") {
        $("#cantidad").addClass("is-invalid");
        $("#alert02").text("ingrese campos validos");
        setTimeout(() => {
            $("#cantidad").removeClass("is-invalid");
            $("#alert02").hide();
        }, 2000);
    } else if ($("#precio").val() === "" || isNaN($("#precio").val()) == true) {
        $("#precio").addClass("is-invalid");
        $("#alert03").text("ingrese campos validos");
        setTimeout(() => {
            $("#precio").removeClass("is-invalid");
            $("#alert03").hide();
        }, 2000);
    } else if ($("#vencimiento").val() === "") {
        $("#vencimiento").addClass("is-invalid");
        $("#alert04").text("ingrese campos validos");
        setTimeout(() => {
            $("#vencimiento").removeClass("is-invalid");
            $("#alert04").hide();
        }, 2000);
    } else if ($("#descripcion").val() === "") {
        $("#descripcion").addClass("is-invalid");
        $("#alert05").text("ingrese campos validos");
        setTimeout(() => {
            $("#descripcion").removeClass("is-invalid");
            $("#alert05").hide();
        }, 2000);
    } else {


        let data = $('#form-add-product').serialize();

        $.ajax({
            url: 'php/procesos/productos/save-product.php',
            type: 'post',
            data: data,
            'success': function(response) {
                response = JSON.parse(response);
                if (response == true)
                //toastr.success('Se grabó satisfactoramente');
                    Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Se guardo con éxito',
                    showConfirmButton: false,
                    timer: 2000
                })

                else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'hubo un error  !',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                tb_data.ajax.reload();
                $('#modal-add-product').modal('hide');
            }
        });

    }
});

$('body').on('click', '.edit', function() {
    clearinput();

    $('#modal-title').html('Actualizar producto');
    let data = tb_data.row($(this).parents('tr')).data();
    $('#id').val(data['id_art']);
    $('#nombre').val(data['nombre_art']);
    $('#descripcion').val(data['descripcion_art']);
    $('#categoria').val(data['id_cat']);
    $('#proveedor').val(data['id_pro01']);
    $('#cantidad').val(data['cantidad_art']);
    $('#precio').val(data['precio_art']);
    $('#estado').val(data['estado_art']);
    $('#vencimiento').val(data['vencimiento_art']);
    $('#modal-add-product').modal('show');
});



function clearinput() {
    $('#id').val('');
    $('#nombre').val('');
    $('#descripcion').val('');
    $('#categoria').val(1);
    $('#proveedor').val(1);
    $('#vencimiento').val('');
    $('#cantidad').val('');
    $('#precio').val('');
    $('#estado').val('');
}





/* Llenamos los campos de tipo select */
$.ajax({
    url: 'php/procesos/productos/all-categories.php',
    type: 'get',
    'success': function(response) {
        response = JSON.parse(response);
        let output = '';
        for (let i = 0; i < Object.keys(response).length; i++) {
            output += `<option value="` + response[i]['id_cat'] + `">` + response[i]['nombre_cat'] + `</option>`;
        }
        $('#categoria').html(output);
    }
});

$.ajax({
    url: 'php/procesos/productos/all-providers.php',
    type: 'get',
    'success': function(response) {
        response = JSON.parse(response);
        let output = '';
        for (let i = 0; i < Object.keys(response).length; i++) {
            output += `<option value="` + response[i]['id_pro'] + `">` + response[i]['nombre_pro'] + `</option>`;
        }
        $('#proveedor').html(output);
    }
});

function validate_data() {
    return true;
}

// DEL INVENTARIO

const agregar_inventario_p = () => {
  var nombre_inven = $("#nombre_inven").val();
  var precio_inven = $("#precio_inven").val();
  var fecha_inven = $("#fecha_inven").val();
  var cantidad_inven = $("#cantidad_inven").val();
  var estado1_inven = $("#estado1_inven").val();
  var estado2_inven = $("#estado2_inven").val();
  

  if (nombre_inven === "") {
    //$("#id_usu_ag").css( "border-color","red");
    $("#nombre_inven").addClass("is-invalid");
    document.getElementById("inven_alert_1").style.display = "block";   
    setTimeout(() => {
      $("#nombre_inven").removeClass("is-invalid");
      document.getElementById("inven_alert_1").style.display = "none";
    }, 2500);
  } 

  if (precio_inven === "") {
    //$("#id_usu_ag").css( "border-color","red");
    $("#precio_inven").addClass("is-invalid");
    document.getElementById("inven_alert_2").style.display = "block";
    setTimeout(() => {
      $("#precio_inven").removeClass("is-invalid");
      document.getElementById("inven_alert_2").style.display = "none";
    }, 2500);
  } 

  if (fecha_inven === "") {
    //$("#id_usu_ag").css( "border-color","red");
    $("#fecha_inven").addClass("is-invalid");
    document.getElementById("inven_alert_3").style.display = "block";
    setTimeout(() => {
      $("#fecha_inven").removeClass("is-invalid");
      document.getElementById("inven_alert_3").style.display = "none";      
    }, 2500);
  } 

  if (cantidad_inven === "") {
    //$("#id_usu_ag").css( "border-color","red");
    $("#cantidad_inven").addClass("is-invalid");
    document.getElementById("inven_alert_4").style.display = "block";    
    setTimeout(() => {
      $("#cantidad_inven").removeClass("is-invalid");
      document.getElementById("inven_alert_4").style.display = "none";      
    }, 2500);
  }

  if (estado1_inven ==" ") {
    //$("#id_usu_ag").css( "border-color","red");
    document.getElementById('estado1_inven').style.background="red";
    document.getElementById("inven_alert_5").style.display = "block";
    setTimeout(() => {
      document.getElementById('estado1_inven').style.background="white";
      document.getElementById("inven_alert_5").style.display = "none";
    }, 2500);
  } 

  if (estado2_inven ==" ") {
    //$("#id_usu_ag").css( "border-color","red");
    document.getElementById('estado2_inven').style.background="red";
    document.getElementById("inven_alert_6").style.display = "block";
    setTimeout(() => {
      document.getElementById('estado2_inven').style.background="white";
      document.getElementById("inven_alert_6").style.display = "none";
    }, 2500);
  }

  if (nombre_inven != "" && precio_inven != "" && fecha_inven != "" && cantidad_inven != "" && estado1_inven != " " && estado2_inven != " "){

    $.ajax({
      url: "php/procesos/inventario/agrega_inventario.php",
      type: "POST",
      data: {nombre_inven : nombre_inven, precio_inven:precio_inven, fecha_inven:fecha_inven, cantidad_inven:cantidad_inven, estado1_inven:estado1_inven, estado2_inven:estado2_inven},
      success: function (a) {

          if (a === "1") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "se agrego al inventario !",
              showConfirmButton: false,
              timer: 2000,
            });  
            $("#llega_tabla_inventario").load("php/procesos/inventario/vista_tabla.php");
            $("#nombre_inven").val("");
            $("#precio_inven").val("");
            $("#fecha_inven").val("");
            $("#cantidad_inven").val("");
            $('#estado1_inven').val(' '); 
            $('#estado1_inven').change();
            $('#estado2_inven').val(' '); 
            $('#estado2_inven').change();
            

          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Este producto ya existe!",
              showConfirmButton: false,
              timer: 2000,
            });


          }



             

          
      }
    })
  }
  


  

}

/*-----------------------------------cliente-------------------*/
const agregar_cliente_p = () => {
    if ($("#nom_cli_p").val() === "") {
        //$("#id_usu_ag").css( "border-color","red");
        $("#nom_cli_p").addClass("is-invalid");
        $("#alert01_p").text("ingrese campos validos");
        setTimeout(() => {
            $("#nom_cli_p").removeClass("is-invalid");
            $("#alert01_p").hide();
        }, 2500);
    } else if ($("#dir_cli_p").val() === "") {
        $("#dir_cli_p").addClass("is-invalid");
        $("#alert02_p").text("ingrese campos validos");
        setTimeout(() => {
            $("#dir_cli_p").removeClass("is-invalid");
            $("#alert02_p").hide();
        }, 2000);
    } else if (
        $("#tel_cli_p").val() === "" ||
        isNaN($("#tel_cli_p").val()) == true
    ) {
        $("#tel_cli_p").addClass("is-invalid");
        $("#alert03_p").text("ingrese campos validos");
        setTimeout(() => {
            $("#tel_cli_p").removeClass("is-invalid");
            $("#alert03_p").hide();
        }, 2000);
    } else if ($("#s_c_p").val() === null) {
        $("#s_c_p").addClass("is-invalid");
        setTimeout(() => {
            $("#s_c_p").removeClass("is-invalid");
        }, 2000);
    } else if (
        $("#numd_cli_p").val() === "" ||
        isNaN($("#numd_cli_p").val()) == true
    ) {
        $("#numd_cli_p").addClass("is-invalid");
        $("#alert04_p").text("ingrese campos validos");
        setTimeout(() => {
            $("#numd_cli_p").removeClass("is-invalid");
            $("#alert04_p").hide();
        }, 2000);
    } else {
        let f = $("#form_agrega_cliente_p").serialize(event);
        event.preventDefault();
        $.ajax({
            url: "php/procesos/cliente/agrega_cliente.php",
            type: "POST",
            data: f,
            success: function(a) {
                if (a === "1") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "se guardo con exito !",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $("#form_agrega_cliente")[0].reset();
                    $("#llega_tabla_cliente").load(
                        "php/procesos/cliente/vista_tabla.php"
                    );
                    $("#select_cli").load("php/procesos/ventas/select_cli.php");
                }
            },
        });
    }
};

const agregar_cliente = () => {
    alert("hola");
    if ($("#nom_cli").val() === "") {
        //$("#id_usu_ag").css( "border-color","red");
        $("#nom_cli").addClass("is-invalid");
        $("#alert01").text("ingrese campos validos");
        setTimeout(() => {
            $("#nom_cli").removeClass("is-invalid");
            $("#alert01").hide();
        }, 2500);
    } else if ($("#dir_cli").val() === "") {
        $("#dir_cli").addClass("is-invalid");
        $("#alert02").text("ingrese campos validos");
        setTimeout(() => {
            $("#dir_cli").removeClass("is-invalid");
            $("#alert02").hide();
        }, 2000);
    } else if ($("#tel_cli").val() === "" || isNaN($("#tel_cli").val()) == true) {
        $("#tel_cli").addClass("is-invalid");
        $("#alert03").text("ingrese campos validos");
        setTimeout(() => {
            $("#tel_cli").removeClass("is-invalid");
            $("#alert03").hide();
        }, 2000);
    } else if ($("#s_c").val() === null) {
        $("#s_c").addClass("is-invalid");
        setTimeout(() => {
            $("#s_c").removeClass("is-invalid");
        }, 2000);
    } else if (
        $("#numd_cli").val() === "" ||
        isNaN($("#numd_cli").val()) == true
    ) {
        $("#numd_cli").addClass("is-invalid");
        $("#alert04").text("ingrese campos validos");
        setTimeout(() => {
            $("#numd_cli").removeClass("is-invalid");
            $("#alert04").hide();
        }, 2000);
    } else {
        let f = $("#form_agrega_cliente").serialize(event);
        event.preventDefault();
        $.ajax({
            url: "php/procesos/cliente/agrega_cliente.php",
            type: "POST",
            data: f,
            success: function(a) {
                if (a === "1") {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "se guardo con exito !",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                    $("#form_agrega_cliente")[0].reset();
                    $("#llega_tabla_cliente").load(
                        "php/procesos/cliente/vista_tabla.php"
                    );
                    $("#select_cli").load("php/procesos/ventas/select_cli.php");
                }
            },
        });
    }
};

/* envio de datos para actualizar*/

//-------------------------------

const actualiza = () => {
    nombre = $("#nombre_cli").val();
    dir = $("#direccion_cli").val();
    telf = $("#telefono_cli").val();
    tipo_doc = $("#tipodoc_cli").val();
    num = $("#numerodoc_cli").val();
    estado = $("#estado_cli").val();

    // id_pro,nombre_pro,direccion_pro,telefono_pro,tipodoc_pro,numerodoc_pro,estado_pro

    var dato =
        "&nombre=" +
        nombre +
        "&dir=" +
        dir +
        "&telf=" +
        telf +
        "&tipo_doc=" +
        tipo_doc +
        "&num=" +
        num +
        "&estado=" +
        estado;
    Swal.fire({
        title: "Estas seguro de actualizar?",
        text: "esto influira directamente en la base de datos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "si, estoy seguro!",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "php/procesos/cliente/actualiza_cliente.php",
                data: dato,
                success: function(c) {
                    //alerttify.correcto(response);
                    if (c === "1") {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Actualizado correctamente !",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                        $("#llega_tabla_cliente").load(
                            "php/procesos/cliente/vista_tabla.php"
                        );
                    } else {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: "hubo un error  !",
                            showConfirmButton: false,
                            timer: 2000,
                        });
                    }
                },
            });
        }
    });
};

// funcion para llenar compos
const llenar_cliente = (d) => {
    let x = [];
    x = d.split("|");
    $("#numerodoc_cli").val(x[0]);
    $("#nombre_cli").val(x[1]);
    $("#telefono_cli").val(x[2]);
    $("#direccion_cli").val(x[3]);
    $("#tipodoc_cli").val(x[4]);
    $("#estado_cli").val(x[5]);
    // id_pro,nombre_pro,telefono_pro,direccion_pro,numerodoc_pro,tipodoc_pro,estado_pro
};

function agregar_articulo(contador, nombre, id) {
    valor_c = $("#c" + contador).val();
    valor_p = $("#p" + contador).val();
    valor_d = $("#d" + contador).val();
    let dat_v;
    dat_v = valor_c + "|" + valor_p + "|" + valor_d + "|" + nombre + "|" + id;
    let dt2 = "dato=" + dat_v;

    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/agregar_prod_sesion.php",
        data: dt2,
        success: function(respuesta) {
            $("#tabla_v").load("php/procesos/ventas/agregar_ala_tabla.php");
            // alert (respuesta);
        },
    });
}


function ver_reporte_sem() {
    $.ajax({
        url: "php/procesos/reportes/ver_r_sem.php",
        success: function(respuesta) {
            $("#llega_vt_sem").html(respuesta);
            // alert (respuesta);
        },
    });
}

function ver_reporte_dia() {
    $.ajax({
        url: "php/procesos/reportes/ver_r_diario.php",
        success: function(respuesta) {
            $("#llega_vt_dia").html(respuesta);
            // alert (respuesta);
        },
    });
}

$(document).ready(function() {
    $("#tabla_v").load("php/procesos/ventas/agregar_ala_tabla.php");
});

function elimina_art(elim_art) {
    let dato = "dato=" + elim_art;
    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/elimina_fila.php",
        data: dato,
        success: function(respuesta) {
            $("#tabla_v").load("php/procesos/ventas/agregar_ala_tabla.php");
        },
    });
}

$(document).ready(function() {
    $("#select_cli").load("php/procesos/ventas/select_cli.php");
});

$(document).ready(function() {

    $("#tabla_ven").load("php/procesos/ventas/vista_tabla_v.php");

});

/*
function agregar_cliv(){
    alert("holi");

  $.ajax({

    url: "php/procesos/ventas/select_cli.php",
    success: function (respuesta) {
      $("#s_u").load("php/procesos/ventas/select_cli.php");
    }
    });
}*/

/*.---------------prueba modales---------*/

function agregar_venta() {
    // alert("Welcome to Geeks for Geeks");
    let dat_v = $("#sel_cli").val();
    if (dat_v==="" || dat_v===null) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "complete toos los campos",
            showConfirmButton: false,
            timer: 2000,

        });
    }
    else{
        datos = "sel_nombre=" + dat_v;

    let num_boleta = $("#boleta").text();

    datos = "sel_nombre=" + dat_v;


    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/agregar_ventas.php",
        data: datos,
        success: function(respuesta) {
            let resp = respuesta.length;
            // alert("Se registro " + resp + " productos con éxito en la bd");
            $("#tabla_ven").load("php/procesos/ventas/vista_tabla_v.php");
            ver_reporte_dia();
            ver_reporte_sem();
            /* if(radio="ticket"){
                  window.location("genera_ticket.php")
              }else{
                  window.location("genera_boleta.php")
              } */
            //$("#").load("php/procesos/ventas/select_cli.php");
        },
    });

    $.ajax({
        url: "pdf/pdf.php?dni=" + dat_v + "&boleta=" + num_boleta,
        context: document.body,
        success: function(response) {
            var element = response;
            var opt = {
                margin: 2,
                filename: 'MiBoleta_2.pdf',
                image: { type: 'png' },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    });

    }
    

    //alert("Se va a generar la boleta en formato PDF");
    // var element = document.getElementById("boletaPDF");
    // var opt = {
    //   margin:       2,
    //   filename:     'MiBoleta_2.pdf',
    //   image:        { type: 'png'},
    //   html2canvas:  { scale: 2 },
    //   jsPDF:        { unit: 'mm', format: 'A4', orientation: 'portrait' }
    // };
    // html2pdf().set(opt).from(element).save();
    // html2pdf(element, opt);
}




function generarPDF(id_venta, usuario, fecha) {
    alert("Se va a generar la boleta en formato PDF2");
    $.ajax({
        url: "pdf/pdfventas.php?id_venta=" + id_venta + "&usuario=" + usuario + "&fecha=" + fecha,
        context: document.body,
        success: function(response) {
            var element = response;
            var opt = {
                margin: 2,
                filename: 'MiBoleta.pdf',
                image: { type: 'png' },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    });
    // var element = document.getElementById("boletaPDF");
    // var opt = {
    //   margin:       2,
    //   filename:     'MiBoleta.pdf',
    //   image:        { type: 'png'},
    //   html2canvas:  { scale: 2 },
    //   jsPDF:        { unit: 'mm', format: 'A4', orientation: 'portrait' }
    // };
    // html2pdf().set(opt).from(element).save();
    // html2pdf(element, opt);
}



const enviar_idv = (id_v) => {


    datos = "id_v=" + id_v;
    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/modal_det_v.php",
        data: datos,
        success: function(respuesta) {
            $("#llega_dv").html(respuesta);

            /* if(radio="ticket"){
                  window.location("genera_ticket.php")
              }else{
                  window.location("genera_boleta.php")
              } */
            //$("#").load("php/procesos/ventas/select_cli.php");
        },
    });


}


const desactivar_bo = (id_v) => {
    datos = "id_v=" + id_v;
    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/desactivar_b.php",
        data: datos,
        success: function(respuesta) {
            $("#des_bo").html(respuesta);

            /* if(radio="ticket"){
                  window.location("genera_ticket.php")
              }else{
                  window.location("genera_boleta.php")
              } */
            //$("#").load("php/procesos/ventas/select_cli.php");
        },
    });

}

const actualizar_bo = () => {
    let datos = $("#form_dev").serialize(event);
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "php/procesos/ventas/actualizar_v.php",
        data: datos,
        success: function(respuesta) {
            if (respuesta === "1") {

                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Actualizado correctamente !",
                    showConfirmButton: false,
                    timer: 2000,
                });

            } else if (respuesta === "2") {

                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Ya esta activado",
                    showConfirmButton: false,
                    timer: 2000,

                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Hubo un error, no se pudo actualizar ",
                    showConfirmButton: false,
                    timer: 2000,

                });
            }
        },
    });

}