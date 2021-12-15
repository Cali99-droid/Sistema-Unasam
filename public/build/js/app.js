const tab="";function navegacion(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera"),o=document.querySelector(".sub-item");e.classList.contains("ocultar")?(e.classList.remove("ocultar"),t.classList.remove("mostrar-logo"),o.classList.remove("mostrar-sub")):(e.classList.add("ocultar"),t.classList.add("mostrar-logo"),o.classList.remove("mostrar-sub"))}function mostrarAdmin(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera");e.classList.contains("ocultar")?document.getElementById("sub-item").classList.toggle("mostrar-sub"):(e.classList.add("ocultar"),t.classList.add("mostrar-logo"),document.getElementById("sub-item").classList.add("mostrar-sub"))}function eventListeners(){document.querySelector(".openbtn").addEventListener("click",navegacion);const e=document.getElementById("buscarBene");null!=e&&e.addEventListener("keyup",buscarRegistro);const t=document.getElementById("buscarIntegrante");null!=t&&t.addEventListener("keyup",buscarRegistro);const o=document.getElementById("buscarTipo");null!=o&&o.addEventListener("keyup",buscarRegistro);const a=document.getElementById("buscarEv");null!=a&&a.addEventListener("keyup",buscarEv);const n=document.getElementById("buscar-user");null!=n&&n.addEventListener("keyup",buscarRegistro);const i=document.getElementById("buscar-rol");null!=i&&i.addEventListener("keyup",buscarRegistro);const r=document.getElementById("buscar-semestre");null!=r&&r.addEventListener("keyup",buscarRegistro)}function llamar_modal(){Swal.fire("Good job!","You clicked the button!","info")}function items(){const e=document.querySelector(".contenedor-barra"),t=document.querySelector(".contenido-cabecera");document.querySelector(".sub-item"),document.querySelector(".administrador");e.classList.contains("ocultar")?(e.classList.add("ocultar"),t.classList.add("mostrar-logo")):(e.classList.remove("ocultar"),t.classList.remove("mostrar-logo"))}function modal(e,t,o){e=document.getElementById(e);var a=document.getElementsByClassName(o)[0];e.style.display="block",a.onclick=function(){e.style.display="none",window.location.reload()},window.onclick=function(t){t.target==e&&(e.style.display="none",window.location.reload())}}function modalS(e,t,o){e=document.getElementById(e);var a=document.getElementsByClassName(o)[0];e.style.display="block",a.onclick=function(){e.style.display="none"},window.onclick=function(t){t.target==e&&(e.style.display="none")}}function BuscarIntegrante(e){var t={dni:e,cod:1};$.ajax({type:"POST",data:t,url:"./obtenDatos.php",success:function(e){alert(e),datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#codigo_alumno").val(datos.codigo_alumno),$("#idEscuela").val(datos.idEscuela),$("#nombre_procedencia").val(datos.nombre_procedencia),$("#estado").val(datos.estado),$("#idCondicionEconomica").val(datos.idCondicionEconomica),$("#descripcion").val(datos.descripcion),$("#idPersona").val(datos.idPersona),"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}})}function actualizarIntegrante(e,t,o,a){modal(t,o,a),BuscarIntegrante(e),$(document).ready((function(){$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante"),$("#valor").val("1")}))}async function actualizarTipo(e,t){modal("modal-tipo","boton-actualizar-tipo","close-tipo"),$("#idTipoGrupo").val(e),$("#nombre_tipo").val(t)}async function actualizarBeneficio(e){modal("modal-agregar-bene","boton-agregar-beneficio","close");const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/beneficios/getBeneficio",o=await fetch(e,{method:"POST",body:t}),a=await o.json();$(document).ready((function(){$("#numero").val(a.numero_resolucion),$("#nombre").val(a.nombre),$("#fecha_emision").val(a.fecha_emision),$("#estado").val(a.estado),$("#idresolucion_x_beneficio").val(a.idres),$("#idBeneficio").val(a.id),$("#cod").val(2),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarEvento(e){modal("modal-agregar-ev","boton-agregar-evento","close-evento");var t={id:e,cod:4};$.ajax({type:"POST",data:t,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#nombre_evento").val(datos.nombre_evento),$("#fecha_inicio").val(datos.fecha_inicio),$("#fecha_final").val(datos.fecha_final),$("#valor").val("2"),$("#idEventosrealizados").val(datos.idEventosrealizados)}})}function buscarUsuario(e){var t={dni:e,cod:5};$.ajax({type:"POST",data:t,url:"obtenDatos.php",success:function(e){datos=jQuery.parseJSON(e),$("#dni").val(datos.dni),$("#nombre").val(datos.nombre),$("#apellido").val(datos.apellido),$("#direccion").val(datos.direccion),$("#email").val(datos.email),$("#telefono").val(datos.telefono),$("#usuario").val(datos.usuario),$("#password").val(datos.password),$("#idPersona").val(datos.idPersona);var t=datos.estado;"Masculino"===datos.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===t?$("#estado").attr("checked",!0):$("#estado").attr("checked",!1)}})}async function actualizarUsuario(e,t,o,a){modal(t,o,a),$(document).ready((function(){$("#bus_user").hide(),$("#titulo_user").text("Editar Usuario"),$("#valor").val("2"),$("")})),dat=new FormData,dat.append("dni",e);try{const e="http://localhost:3000/get-user",t=await fetch(e,{method:"POST",body:dat}),o=await t.json();$(document).ready((function(){$("#dni").val(o.dni),$("#nombre").val(o.nombre),$("#apellido").val(o.apellido),$("#direccion").val(o.direccion),$("#email").val(o.email),$("#telefono").val(o.telefono),$("#usuario").val(o.usuario),$("#password").val(o.password),$("#rol").val(o.idTipoUsu),$("#estado").val(o.estado),$("#idusu").val(o.idUsuario),$("#cod").val(2);o.estado,o.idTipoUsu;"Masculino"===o.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function actualizarSemestre(e,t,o,a,n){modal("modal-agregar-semestre","boton","close"),$("#nombre").val(t),$("#fecha_inicio").val(o),$("#fecha_final").val(a),$("#estado").val(n),$("#idSemestre").val(e)}function buscarRegistro(){$(document).ready((function(){$(".busqueda").keyup((function(){_this=this,$.each($("#mytable tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function asignarBeneficio(e,t){modalS("modal-asigBeneficio","btn","close-ben"),$(document).ready((function(){$("#idbeneficioXtipo").val(e)}));document.querySelector("#btn_confirmarBen").addEventListener("click",confirmarBeneficio)}async function confirmarBeneficio(){document.getElementById("close-ben");const e=document.querySelector("#descripcion"),t=document.querySelector("#estado"),o=document.querySelector("#idbeneficioXtipo"),a=document.querySelector("#idAlumnoGrupo");datos=new FormData,datos.append("beneficio_x_tipo_grupo_id",o.value),datos.append("alumno_x_grupo_id",a.value),datos.append("descripcion",e.value),datos.append("estado",t.value);try{const e="http://localhost:3000/integrante/setBeneficio",t=await fetch(e,{method:"POST",body:datos});(await t.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio asignado correctamente!"}).then(()=>{window.location.reload()}):Swal.fire({icon:"error",title:"Error",text:"El Beneficio ya fue asignado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la beneficio!"})}}function toggleB(){document.querySelectorAll(".btn-toggle").forEach(e=>{e.onclick=function(){actualizarEstadoBeneficio(e,this.id)}})}async function actualizarEstadoBeneficio(e,t){datos=new FormData,datos.append("id",t);try{const t="http://localhost:3000/integrante/updBeneficioEst",o=await fetch(t,{method:"POST",body:datos});await o.json()&&(e.classList.contains("label")?(e.classList.remove("label"),e.classList.add("label-ok"),e.textContent="COMPLETADO"):(e.classList.remove("label-ok"),e.classList.add("label"),e.textContent="PENDIENTE"),Swal.fire({icon:"success",title:"MUY BIEN !",text:"Estado actualizado correctamente!"}).then(()=>{}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al actualizar el estado !"})}}function modalAsignar(e,t,o,a,n){modal(o,a,n),$(document).ready((function(){$("#idbeneficio").val(e),$("#nombreBeneficio").text(t)}))}async function asignarBeneficioGrupo(){var e=document.getElementById("idbeneficio").value,t=document.getElementById("idTipoGrupo").value,o=document.getElementById("estadoGrupo").value,a=document.getElementById("idBeneTipo").value;const n=new FormData;n.append("beneficio_id",e),n.append("tipo_grupo_id",t),n.append("estado",o),n.append("id",a);try{const e="http://localhost:3000/beneficios/asignar",t=await fetch(e,{method:"POST",body:n}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Asignado Correctamente"}).then(()=>{}):Swal.fire({icon:"info",title:"Mensaje...",text:"El Beneficio ya esta asignado!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la el Beneficio!"})}}function invitarGrupo(e,t,o,a,n){modal(o,a,n),$(document).ready((function(){$("#idevento").val(e),$("#nombreEvento").text(t)}))}async function asignarInvitacionGrupo(){const e=document.getElementById("idevento"),t=document.getElementById("idGrupo"),o=document.getElementById("fechaHoraInvitacion"),a=document.getElementById("Observacion"),n=document.getElementById("idInvitacion");datos=new FormData,datos.append("evento_id",e.value),datos.append("grupo_universitario_id",t.value),datos.append("observacion",a.value),datos.append("fecha_hora",o.value),datos.append("id",n.value);try{const e="http://localhost:3000/eventos/invitar-grupo",t=await fetch(e,{method:"POST",body:datos}),n=await t.json();if(console.log(n),n.code)return void Swal.fire({icon:"info",title:"MENSAJE ",text:"La invitacion ya esta asignada"});if(n.upt)return void Swal.fire({icon:"success",title:"ACTUALIZADO ",text:"Invitacion actualizada correctamente"});if(n.upd)return void Swal.fire({icon:"info",title:"Mensaje...",text:"No puede editar una invitacion con participaciones!"});n.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Invitacion asignada correctamente!"}).then(()=>{o.value="",a.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"La invitación no está en el rango de fechas del evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la invitacion!"})}}async function crearOrganizador(){const e=document.getElementById("nombre_org"),t=document.getElementById("contacto");if(datos=new FormData,""!==e.value){datos.append("nombre",e.value),datos.append("contacto",t.value);try{const o="http://localhost:3000/crear-org",a=await fetch(o,{method:"POST",body:datos});(await a.json()).resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Organizador creado correctamente!"}).then(()=>{e.value="",t.value="",cargarOrg()}):Swal.fire({icon:"error",title:"ERROR !",text:"Error al crear un organizador!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el organizador!"})}}else Swal.fire({icon:"error",title:"ERROR !",text:"El organizador es obligatorio!"})}async function cargarOrg(){try{const e="http://localhost:3000/evento/orgs",t=await fetch(e);mostrarComboOrg(await t.json())}catch(e){console.log(e)}}function mostrarComboOrg(e){const t=document.querySelector("#idorganizador"),o=e[e.length-1],{id:a,nombre:n}=o,i=document.createElement("OPTION");i.value=a,i.textContent=n,t.appendChild(i)}async function crearEvento(){const e=document.getElementById("nombre_evento"),t=document.getElementById("fecha_inicio"),o=document.getElementById("fecha_fin"),a=document.getElementById("idorganizador"),n=document.getElementById("idevento");if(0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVEVERTENCIA !",text:"El nombre del evento es obligatorio"});if(0==t.value.trim().length)return t.value="",t.focus(),void Swal.fire({icon:"warning",title:"ADVEVERTENCIA !",text:"La fecha final es obligatoria es obligatoria"});if(0==o.value.trim().length)return o.value="",o.focus(),void Swal.fire({icon:"warning",title:"ADVEVERTENCIA !",text:"La fecha final es obligatoria es obligatoria"});datos=new FormData,datos.append("nombre",e.value),datos.append("fecha_inicio",t.value),datos.append("fecha_fin",o.value),datos.append("organizador_id",a.value),datos.append("id",n.value);try{const a="http://localhost:3000/crear-evento",n=await fetch(a,{method:"POST",body:datos}),i=await n.json();console.log(i),i?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Evento registrado correctamente!"}).then(()=>{e.value="",o.value="",t.value=""}):Swal.fire({icon:"error",title:"ERROR !",text:"Ya existe el nombre del evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el evento!"})}}function asignarAsistencia(e,t,o,a,n){modalS(o,a,n),$(document).ready((function(){$("#idinvitacion").val(e),$("#idAlumnoGrupo").val(t)}))}async function confirmarAsistencia(){document.getElementById("close-asis");const e=document.getElementById("idinvitacion"),t=document.getElementById("idAlumnoGrupo"),o=document.getElementById("tipo");datos=new FormData,datos.append("invitacion_id",e.value),datos.append("alumno_x_grupo_id",t.value),datos.append("tipo",o.value);try{const e="http://localhost:3000/integrante/setAsistencia",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Asistencia asignada correctamente!"}).then(()=>{window.location.reload()}):Swal.fire({icon:"error",title:"Error !",text:"El Alumno ya participo en el evento!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la asistencia!"})}}function crearBoton(){const e=document.createElement("BUTTON");e.classList.add("boton-asignar");const t=document.createElement("I");return t.classList.add("fas"),t.classList.add("fa-minus-circle"),e.appendChild(t),e.textContent="Quitar ",e}function crearBotonEstado(e){const t=document.createElement("BUTTON");return"COMPLETADO"===e?t.classList.add("label-ok"):t.classList.add("label"),t.textContent=e,t}async function mostrarParticipaciones(e){const t=new FormData;t.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getParticipaciones",o=await fetch(e,{method:"POST",body:t}),a=await o.json(),n=document.getElementById("cuerpo"),i=document.createElement("TR");for(let e=0;e<3;e++){const t=document.createElement("TD");2===e?t.appendChild(crearBoton()):t.textContent=1===e?a.tipo:a.nombreEvento,i.appendChild(t)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function quitarParticipacion(e,t){const o=new FormData;o.append("id",e);try{const e="http://localhost:3000/integrante/deleteAsistencia",t=await fetch(e,{method:"POST",body:o});await t.json()&&Swal.fire({icon:"success",title:"Eliminado",text:"La participacion fue Eliminada correctamente!"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function mostrarBeneficios(e){const t=new FormData;t.append("idAlumnoGrupo",e);try{const e="http://localhost:3000/integrante/getBeneficio",o=await fetch(e,{method:"POST",body:t}),a=await o.json(),n=document.getElementById("cuerpo-asig"),i=document.createElement("TR");for(let e=0;e<4;e++){const t=document.createElement("TD");3===e?t.appendChild(crearBotonEstado(a.estado)):t.textContent=2===e?a.fecha_efectiva:0===e?a.nombreBeneficio:a.descripcion,i.appendChild(t)}n.appendChild(i)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}function openPage(e,t,o,a){var n,i,r;for(i=document.getElementsByClassName(a),n=0;n<i.length;n++)i[n].style.display="none";for(r=document.getElementsByClassName("tablink"),n=0;n<r.length;n++)r[n].style.backgroundColor="";document.getElementById(e).style.display="block",t.style.backgroundColor=o}function botonGrupo(){const e=document.querySelector("#crearTipo");e&&(e.onclick=crearTipof)}async function crearTipof(){const e=document.querySelector("#nombre_tipo"),t=document.querySelector("#idTipoGrupo");if(0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVEVERTENCIA !",text:"El nombre es obligatorio"});const o=new FormData;o.append("nombre",e.value),o.append("id",t.value);try{const a="http://localhost:3000/api/tipos",n=await fetch(a,{method:"POST",body:o});await n.json()?Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue registrado correctamente!"}).then(()=>{e.value="",t.value="",cargarTipos()}):Swal.fire({icon:"error",title:"Error...",text:"Ya existe el nombre del el tipo!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el tipo!"})}}async function cargarTipos(){try{const e="http://localhost:3000/api/tipos",t=await fetch(e);mostrarComboTipos(await t.json())}catch(e){console.log(e)}}function mostrarComboTipos(e){const t=document.querySelector("#tipo_grupo_id"),o=e[e.length-1],{id:a,nombre:n}=o,i=document.createElement("OPTION");i.value=a,i.textContent=n,t.appendChild(i)}async function getIntegrante(e){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/api/getIntegrante",o=await fetch(e,{method:"POST",body:t}),a=await o.json();modal("modal-integrante","btn","close-integrante"),$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre+" "+a.apellido),$("#apellido").val(a.apellido),$("#direccion").val(a.direccion),$("#email").val(a.email),$("#telefono").val(a.telefono),$("#codigo_alumno").val(a.codigo),$("#idEscuela").val(a.idEscuela),$("#nombre_procedencia").val(a.nombre_procedencia),$("#estado").val(a.estado),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#idPersona").val(a.idPersona),$("#cod").val(2),"Masculino"===a.genero?$("#genero option[value='Masculino'").attr("selected",!0):$("#genero option[value='Femenino'").attr("selected",!0),"activo"===a.estado?$("#estado option[value='activo'").attr("selected",!0):$("#estado option[value='inactivo'").attr("selected",!0),$("#cont_buscar").hide(),$("#titulo_integrante").text("Editar Integrante")}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function setIntegrante(){const e=document.querySelector("#nombre_tipo").value,t=new FormData;t.append("nombre",e);try{const e="http://localhost:3000/api/tipos",o=await fetch(e,{method:"POST",body:t});(await o.json()).resultado&&Swal.fire({icon:"success",title:"Tipo Creado",text:"El tipo fue creado correctamente!"}).then(()=>{cargarTipos()})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar la cita!"})}}async function buscarAlumno(e){if(e.length>=9||0===e.length)return void Swal.fire({icon:"error",title:"Error...",text:"El DNI Debe Tener 8 Dígitos"});const t=new FormData;t.append("dni",e);try{const e="http://localhost:3000/api/alumno",o=await fetch(e,{method:"POST",body:t}),a=await o.json();a?$(document).ready((function(){$("#dni").val(a.dni),$("#nombre").val(a.nombre+" "+a.apellido),$("#idCondicionEconomica").val(a.idCondicionEconomica),$("#descripcion").val(a.descripcion),$("#estado").val(a.estado),$("#buscar").val("")})):Swal.fire({icon:"info",title:"Aviso!",text:"No Existe El Alumno !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}function jsBuscar(){return buscar=$("#dni_s").prop("value"),encontradoResultado=!1,$("#mytable tr").find("td:eq(0)").each((function(){codigo=$(this).html(),codigo==buscar&&(trDelResultado=$(this).parent(),nombre=trDelResultado.find("td:eq(1)").html(),encontradoResultado=!0)})),encontradoResultado}async function buscarAlumno2(e,t){const o=new FormData;o.append("dni",e),o.append("idGrupo",t);try{const e="http://localhost:3000/integrante/getAlumnoGrupo",t=await fetch(e,{method:"POST",body:o}),a=await t.json();return void console.log(a.valor)}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearBeneficio(){const e=document.querySelector("#numero"),t=document.querySelector("#fecha_emision"),o=document.querySelector("#nombre"),a=document.querySelector("#idBeneficio"),n=document.querySelector("#idresolucion_x_beneficio"),i=document.querySelector("#cod"),r=document.querySelector("#doc");if(0===o.value.trim().length)return void Swal.fire({icon:"error",title:"Error !",text:"El nombre es obligatorio"});const c=new FormData;c.append("resolucion_x_beneficio[numero_resolucion]",e.value),c.append("resolucion_x_beneficio[fecha_emision]",t.value),c.append("resolucion_x_beneficio[id]",n.value),c.append("beneficio[nombre]",o.value),c.append("beneficio[id]",a.value),c.append("doc",r.files[0]),c.append("cod",i.value);try{const a="http://localhost:3000/beneficios/crear",n=await fetch(a,{method:"POST",body:c}),r=await n.json();console.log(r),r?1==i.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Creado Correctamente"}).then(()=>{e.value="",t.value="",estado.value="",o.value=""}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Beneficio Actualizado Correctamente"}).then(()=>{e.value="",t.value="",estado.value="",o.value=""}):Swal.fire({icon:"error",title:"Error...",text:"El nombre del Beneficio ya existe!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Beneficio!"})}}async function guardarIntegrante(){const e=document.querySelector("#dni"),t=document.querySelector("#nombre"),o=document.querySelector("#idCondicionEconomica"),a=document.querySelector("#descripcion"),n=document.querySelector("#estado"),i=document.querySelector("#cod"),r=document.querySelector("#idgrupo"),c=new FormData;c.append("dni",e.value),c.append("idCondicionEconomica",o.value),c.append("descripcion",a.value),c.append("estado",n.value),c.append("idgrupo",r.value),c.append("cod",i.value);try{const e="http://localhost:3000/api/crearAlumno",o=await fetch(e,{method:"POST",body:c}),a=await o.json();console.log(a),a?1==i.value?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Asignado Correctamente"}).then(()=>{}):Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Actualizado Correctamente"}).then(()=>{numero.value="",fecha_emision.value="",n.value="",t.value=""}):Swal.fire({icon:"info",title:"AVISO!",text:"EL Alumno Ya Pertenece al Grupo !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el integrante!"})}}async function actualizarRol(e){modal("modal-agregar-rol","boton-agregar-beneficio","close-rol");const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/get-rol",o=await fetch(e,{method:"POST",body:t}),a=await o.json(),n=a.permisos;console.log(n);const i=document.querySelectorAll(".chek");n.forEach(e=>{i.forEach(t=>{e.opciones_id==t.value&&(t.checked=!0)})}),$(document).ready((function(){$("#nombre").val(a.nombre),$("#idRol").val(a.id),$("#cod").val(2)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearRol(){const e=document.getElementById("nombre"),t=document.getElementById("cod"),o=document.getElementById("idRol");let a=[];if($("input[type=checkbox]:checked").each((function(){a.push(this.value)})),0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVEVERTENCIA !",text:"El nombre es obligatorio"});datos=new FormData,datos.append("nombre",e.value),datos.append("cod",t.value),datos.append("id",o.value),datos.append("ids",a);try{const e="http://localhost:3000/crear-rol",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o.resultado?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Rol Creado Correctamente"}):Swal.fire({icon:"error",title:"Error...",text:"Ya existe el nombre del Rol!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el Rol!"})}}async function crearUser(){const e=document.getElementById("dni"),t=document.getElementById("nombre"),o=document.getElementById("apellido"),a=document.getElementById("genero"),n=document.getElementById("direccion"),i=document.getElementById("email"),r=document.getElementById("telefono"),c=document.getElementById("usuario"),l=document.getElementById("estado"),d=document.getElementById("rol"),s=document.getElementById("idusu"),u=document.getElementById("cod");if(0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El DNI es obligatorio"});if(0==t.value.trim().length)return t.value="",t.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El nombre del usuario es obligatorio"});if(0==o.value.trim().length)return o.value="",o.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El apellido del usuario es obligatorio"});if(0!=a.value.trim().length){if(0==n.value.trim().length)return n.value="",n.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"La dirección del usuario es obligatorio"});if(0==i.value.trim().length)return i.value="",i.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El email del usuario es obligatorio"});if(0==r.value.trim().length)return r.value="",r.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El teléfono del usuario es obligatorio"});if(0==c.value.trim().length)return c.value="",c.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El nombre de usuario es obligatorio"});if(0!=l.value.trim().length)if(0!=d.value.trim().length){datos=new FormData,datos.append("dni",e.value),datos.append("nombre",t.value),datos.append("apellido",o.value),datos.append("genero",a.value),datos.append("direccion",n.value),datos.append("usuario",c.value),datos.append("idTipoUsu",d.value),datos.append("estado",l.value),datos.append("email",i.value),datos.append("telefono",r.value),datos.append("idUsuario",s.value),datos.append("cod",u.value);try{const e="http://localhost:3000/crear-user",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),1==o?(document.getElementById("form-user").reset(),Swal.fire({icon:"success",title:"MUY BIEN !",text:"Usuario creado correctamente!"}).then(()=>{})):2==o?Swal.fire({icon:"success",title:"MUY BIEN !",text:"Usuario actualizado correctamente!"}).then(()=>{}):Swal.fire({icon:"error",title:"ERROR !",text:"El usuario ya existe!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el organizador!"})}}else Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El rol del usuario es obligatorio"});else Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El estado del usuario es obligatorio"})}else Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"Seleccione el genero del usuario"})}async function crearSemestre(){const e=document.querySelector("#nombre"),t=document.querySelector("#fecha_inicio"),o=document.querySelector("#fecha_final"),a=document.querySelector("#estado"),n=document.querySelector("#idSemestre");if(0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El nombre del semestre es obligatorio"});if(0==t.value.trim().length)return t.value="",t.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"La fecha de inicio es obligatorio"});if(0==o.value.trim().length)return o.value="",o.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"La fecha final es obligatorio"});if(0==a.value.trim().length)return a.value="",a.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"Seleccione el estado"});const i=new FormData;i.append("nombre",e.value),i.append("fecha_inicio",t.value),i.append("fecha_fin",o.value),i.append("estado",a.value),i.append("id",n.value);try{const e="http://localhost:3000/semestres",t=await fetch(e,{method:"POST",body:i}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"MUY BIEN ",text:"El semestre fue registrado correctamente!"}).then(()=>{$("#nombre").val(""),$("#fecha_inicio").val(""),$("#fecha_final").val(""),$("#idSemestre").val("")}):Swal.fire({icon:"error",title:"ERORR ",text:"Ya existe el nombre del semestre !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el semestre!"})}}async function crearItemDesercion(){const e=document.querySelector("#nombre"),t=document.querySelector("#idDesercion");if(0==e.value.trim().length)return e.value="",e.focus(),void Swal.fire({icon:"warning",title:"ADVERTENCIA !",text:"El nombre del semestre es obligatorio"});const o=new FormData;o.append("descripcion",e.value),o.append("id",t.value);try{const e="http://localhost:3000/desercion",t=await fetch(e,{method:"POST",body:o}),a=await t.json();console.log(a),alert(a),a?Swal.fire({icon:"success",title:"MUY BIEN ",text:"El indicador fue registrado correctamente!"}).then(()=>{$("#nombre").val(""),$("#idDesercion").val("")}):Swal.fire({icon:"error",title:"ERORR! ",text:"Ya existe el nombre del indicador !"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al guardar el indicador!"})}}function actualizarDesercionA(e,t){modal("modal-agregar-desercion","boton","close"),$("#TituloCabeceraModal").text("Editar Deserción"),$("#nombre").val(t),$("#idDesercion").val(e)}async function eliminarDesercion(e){const t=new FormData;t.append("id",e),console.log(e);try{const e="http://localhost:3000/desercion-eliminar",o=await fetch(e,{method:"POST",body:t});await o.json()&&Swal.fire({icon:"success",title:"MUY BIEN ! :)",text:"Se Eliminó la deserción!"}).then(()=>{window.location.reload()})}catch(e){Swal.fire({icon:"error",title:"ERROR :(",text:"Hubo un error al eliminar la deserción!"})}}async function actualizarDesercion(e){modal("modal-agregar-desercion","boton-agregar-beneficio","close");const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/beneficios/desercion-actualizar",o=await fetch(e,{method:"POST",body:t}),a=await o.json();$(document).ready((function(){alert(a)}))}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error !"})}}async function crearIntegrante(){const e=document.querySelector("#dni_s"),t=document.querySelector("#nombre_s"),o=document.querySelector("#apellido_s"),a=document.querySelector("#genero_s"),n=document.querySelector("#direccion_s"),i=document.querySelector("#email_s"),r=document.querySelector("#telefono_s"),c=document.querySelector("#codigo_alumno_s"),l=document.querySelector("#idEscuela_s"),d=document.querySelector("#nombre_procedencia_s"),s=document.querySelector("#idCondicionEconomica_s"),u=document.querySelector("#descripcion_s"),m=document.querySelector("#estado_s"),p=document.querySelector("#idCondicionEconomica_s"),f=document.querySelector("#idgrupo"),v=document.querySelector("#idPersona_s"),g=new FormData;g.append("dni",e.value),g.append("nombre",t.value),g.append("apellido",o.value),g.append("genero",a.value),g.append("direccion",n.value),g.append("email",i.value),g.append("telefono",r.value),g.append("codigo",c.value),g.append("idEscuela",l.value),g.append("nombre_procedencia",d.value),g.append("idCondicionEconomica",s.value),g.append("condicionSocioeconomica",p.value),g.append("descripcion",u.value),g.append("estado",m.value),g.append("idgrupo_universitario",f.value),g.append("idPersona",v.value);try{const e="http://localhost:3000/integrante/crearIntegrante",t=await fetch(e,{method:"POST",body:g});await t.json()&&Swal.fire({icon:"success",title:"MUY BIEN !",text:"Integrante Asignado Correctamente"})}catch(e){Swal.fire({icon:"error",title:"ERROR...",text:"Ocurrió un error!"})}}function buscarEv(){$(document).ready((function(){$(".busqueda-ev").keyup((function(){_this=this,$.each($("#mytable-ev tbody tr"),(function(){-1===$(this).text().toLowerCase().indexOf($(_this).val().toLowerCase())?$(this).hide():$(this).show()}))}))}))}function actualizarBenTipo(e,t,o,a){modal("modal-asignar-editar","boton-actualizar-tipo","asig-edit"),$("#idbeneficio").val(t),$("#idTipoGrupo").val(e),$("#estado").val(o),$("#idBeneTipo").val(a)}async function borrar(e){Swal.fire({title:"Esta seguro de eliminar?",text:"No podra revertir los cambios!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Si, Borrar!"}).then(t=>{t.isConfirmed&&eliminarBeneficioTipo(e)})}async function eliminarBeneficioTipo(e){const t=new FormData;t.append("id",e),console.log(e);try{const e="http://localhost:3000/tipoBeneficios/eliminar",o=await fetch(e,{method:"POST",body:t});await o.json()?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje...",text:"El beneficio ya fue asignado y no puede eliminarse!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar la el Beneficio!"})}}function actualizarInvitacion(e,t,o,a,n){modal("modal_invitar","boton-actualizar-tipo","inv"),$("#titulo_integrante").text("Editar invitacion"),$("#fechaHoraInvitacion").val(e),$("#Observacion").val(o),$("#idGrupo").val(t),$("#idInvitacion").val(n),$("#idevento").val(a)}async function borrarInv(e){Swal.fire({title:"Esta seguro de eliminar?",text:"No podra revertir los cambios!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Si, Borrar!"}).then(t=>{t.isConfirmed&&eliminarInvitacion(e)})}async function eliminarInvitacion(e){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/invitacion-eliminar",o=await fetch(e,{method:"POST",body:t});await o.json()?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje...",text:"La invitacion ya fue asignada y no puede eliminarse!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar la la invitacion!"})}}async function agregarRend(){const e=document.getElementById("semestre"),t=document.getElementById("estado"),o=document.getElementById("idAlumno"),a=document.getElementById("idRendimiento"),n=new FormData;n.append("id",a.value),n.append("semestre_id",e.value),n.append("alumno_id",o.value),n.append("estado",t.value);try{const e="http://localhost:3000/rendimiento",t=await fetch(e,{method:"POST",body:n}),o=await t.json();if(console.log(o),o.existe)return void Swal.fire({icon:"info",title:"Mensaje...",text:"EL Semestre ya tiene un estado!"});o?Swal.fire({icon:"success",title:"Muy bien !",text:"Registrado Correctamente  !"}):Swal.fire({icon:"error",title:"Error...",text:"No se pudo crear!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al crear!"})}}function actualizarRend(e,t,o){modal("modal_rend","boton-agregar-integrante","close-rend"),$("#semestre").val(e),$("#estado").val(t),$("#idRendimiento").val(o)}async function eliminarRend(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/rendimiento/eliminar",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"error",title:"Error...",text:"No se pudo eliminar!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function borrarBen(e){Swal.fire({title:"Esta seguro de eliminar?",text:"No podra revertir los cambios!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Si, Borrar!"}).then(t=>{t.isConfirmed&&eliminarBeneficio(e)})}async function eliminarBeneficio(e){const t=new FormData;t.append("id",e);try{const e="http://localhost:3000/beneficios-eliminar",o=await fetch(e,{method:"POST",body:t});await o.json()?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje...",text:"El beneficio ya fue asignada y no puede eliminarse!"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar la la invitacion!"})}}document.addEventListener("DOMContentLoaded",(function(){eventListeners(),botonGrupo(),toggleB()}));const preguntar=function(e,t){Swal.fire({title:"Esta seguro de eliminar?",text:"No podra revertir los cambios!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Si, Borrar!"}).then(o=>{o.isConfirmed&&e(t)})};async function borrarIntegrante(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/integrante-eliminar",t=await fetch(e,{method:"POST",body:datos});await t.json()?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje !",text:"El estudiante tiene participaciones o beneficios asignados, no puede eliminarse"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function borrarEvento(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/eventos-eliminar",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje !",text:"Existen invitaciones al evento y no puede eliminarse"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function borrarTipo(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/api/tipos-eliminar",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje !",text:"Existen grupos de este tipo y no puede eliminarse"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function borrarUser(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/usuarios-eliminar",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje !",text:"El usuario tiene acciones realizadas y no puede eliminarse"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}async function borrarSemestre(e){datos=new FormData,datos.append("id",e);try{const e="http://localhost:3000/semestres-eliminar",t=await fetch(e,{method:"POST",body:datos}),o=await t.json();console.log(o),o?Swal.fire({icon:"success",title:"Muy bien...",text:"Se Eliminó !"}).then(()=>{window.location.reload()}):Swal.fire({icon:"info",title:"Mensaje !",text:"El semestre tiene datos y no puede eliminarse"})}catch(e){Swal.fire({icon:"error",title:"Error...",text:"Hubo un error al eliminar!"})}}document.getElementById("participaciones")&&document.getElementById("participaciones").click(),document.getElementById("mytable")&&$("#mytable").stacktable(),document.getElementById("mytable-ev")&&$("#mytable-ev").stacktable(),document.querySelectorAll("table_res")&&$(".table_res").stacktable();