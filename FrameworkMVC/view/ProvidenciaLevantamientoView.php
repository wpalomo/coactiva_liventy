<!DOCTYPE HTML5>
<html lang="es">

      <head>
      
        <meta charset="utf-8"/>
        <title>Matriz Juicios - coactiva 2017</title>
        
      
        
         
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  			   
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<link rel="stylesheet" href="http://jqueryvalidation.org/files/demo/site-demos.css">
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
 		
 		<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
		
		<script>
		    webshims.setOptions('forms-ext', {types: 'date'});
			webshims.polyfill('forms forms-ext');
		</script>
		
    	 <script >
		$(document).ready(function(){

			var validarForm = false;

		    // cada vez que se cambia el valor del combo
		    $("#generar").click(function() 
			{
		   
		    	var fecha_providencias = $("#fecha_levantamiento").val();
		     	var hora_providencias = $("#hora_levantamiento").val();
		     	  var numero_oficio  = $("#numero_oficio").val();
		     	var razon_providencias = $("#razon_levantamiento").val();
		    			
		    	if (fecha_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_fecha").text("Introduzca una Fecha");
		    		$("#mensaje_fecha").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_fecha").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
				}


		    	if (hora_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_hora").text("Introduzca una Hora");
		    		$("#mensaje_hora").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_hora").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
				}

		    	if (numero_oficio == "")
		    	{
			    	
		    		$("#mensaje_numero_oficio").text("Introduzca # Oficio y Fecha");
		    		$("#mensaje_numero_oficio").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_numero_oficio").fadeOut("slow"); //Muestra mensaje de error
		            
				}
				
	/*
		    	if (razon_providencias == "")
		    	{
		    		validarForm = false;
		    		$("#mensaje_razon").text("Introduzca una Razón");
		    		$("#mensaje_razon").fadeIn("slow"); //Muestra mensaje de error
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_razon").fadeOut("slow"); //Muestra mensaje de error
		    		validarForm = true;
				}
		    	*/
			}); 

	
				$( "#fecha_levantamiento" ).focus(function() {
					$("#mensaje_fecha").fadeOut("slow");
    			});

				$( "#hora_levantamiento" ).focus(function() {
					$("#mensaje_hora").fadeOut("slow");
    			});
				$( "#numero_oficio" ).focus(function() {
					$("#mensaje_numero_oficio").fadeOut("slow");
    			});

    			/*
					$( "#razon_levantamiento" ).focus(function() {
					$("#mensaje_razon").fadeOut("slow");
    			});
*/

		    		/*	$("button[type=submit]").click(function() {
					var accion = $(this).attr('name');
					var boton = $(this);

					if(accion=='visualizar')
						{
							var dialogo = $('#plpop');//framePL//plpop
							$('#closeView').css({'display':'inline-block','margin':'0px','padding':'6px,12px'});
							dialogo.css({'display':'block'});
							boton.css('display','none');
							
						}
					if(accion=='closeView')
					{
						var dialogo = $('#plpop');//framePL//plpop
						$('#closeView').css({'display':'none','margin':'0px'});
						dialogo.css({'display':'none'});
						$('#visualizar').css('display','inline-block');
						return false;
					}
					
			});*/
					    
		}); 

	</script>
	

    </head>
    <body style="background-color: #d9e3e4;">
    
        <?php include("view/modulos/head.php"); ?>
       <?php include("view/modulos/modal.php"); ?>
       <?php include("view/modulos/menu.php"); ?>
       
       <?php
       
  
       $sel_juicio_referido_titulo_credito="";
       $sel_numero_titulo_credito="";
       $sel_identificacion_clientes="";
       $sel_id_provincias="";
       $sel_id_estados_procesales_juicios="";
        $sel_id_abogado="";
        
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	
       	$sel_juicio_referido_titulo_credito = $_POST['juicio_referido_titulo_credito'];
       	$sel_numero_titulo_credito=$_POST['numero_titulo_credito'];
       	$sel_identificacion_clientes=$_POST['identificacion_clientes'];
       	$sel_id_provincias=$_POST['id_provincias'];
       	$sel_id_estados_procesales_juicios=$_POST['id_estados_procesales_juicios'];
       	$sel_id_abogado = $_POST['id_abogado'];
       
       }
       
    
       
       
       ?>
 
 
  
  <div class="container">
  
  <div class="row" style="background-color: #ffffff;">
  
       <!-- empieza el form --> 
       
      <form  id="plevantamineto" name="plevantamiento" action="<?php echo $helper->url("MatrizJuicios","Imprimir_ProvidenciaLevantamiento"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12">
         
                 <!-- comienxza busqueda  -->
                 
                 <br> 
                 
                 
                 <div class="col-lg-12 col-md-12 col-xs-12" style=" text-aling: justify;">
            	 <p align="justify"><b><font face="univers" size=3>***Estimados usuarios al generar un documento en el sistema, automáticamente se actualizara la fecha de última providencia del juicio***</font></b></p>
				</div>
                 <br>        
         <div class="col-lg-12 col-md-12 col-xs-12">
	         <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos Providencia Levantamiento</h4>
	         </div>
	         <div class="panel-body">
			 <div class="panel panel-default">
  			<div class="panel-body">
  			
  							
  		<div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >Fecha Providencia:</p>
			  	<input type="date"  name="fecha_levantamiento" id="fecha_levantamiento" value="" class="form-control "/> 
			  	<div id="mensaje_fecha" class="errores"></div>
			    <input type="hidden"  name="id_juicios" id="id_juicios" value="<?php echo $datos['id_juicios']; ?>" class="form-control"/ readonly>
			    <input type="hidden"  name="id_clientes" id="id_clientes" value="<?php echo $datos['id_clientes']; ?>" class="form-control"/ readonly>
			    <input type="hidden"  name="id_titulo_credito" id="id_titulo_credito" value="<?php echo $datos['id_titulo_credito']; ?>" class="form-control"/ readonly>
			  
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" >Hora Providencia:</p>
			  	<input type="time"  name="hora_levantamiento" id="hora_levantamiento" value="" class="form-control "/> 
			    <div id="mensaje_hora" class="errores"></div>
		 </div>
		 
		  <div class="col-lg-4 col-md-4 col-xs-12">
         		<p class="formulario-subtitulo" >Cliente:</p>
			  	<input type="text"  name="nombres_clientes" id="nombres_clientes" value="<?php echo $datos['nombres_clientes']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		  <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" ># Juicio:</p>
			  	<input type="text"  name="juicio_referido_titulo_credito" id="juicio_referido_titulo_credito" value="<?php echo $datos['juicio_referido_titulo_credito']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		 <div class="col-lg-2 col-md-2 col-xs-12">
         		<p class="formulario-subtitulo" ># Operación:</p>
			  	<input type="text"  name="numero_titulo_credito" id="numero_titulo_credito" value="<?php echo $datos['numero_titulo_credito']; ?>" class="form-control" readonly/> 
			    
		 </div>
		 
		
         
		   <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:10px;">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio:</p>
			  	<input type="text"  name="numero_oficio" id="numero_oficio" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio" class="errores"></div>
		  </div>
		  
		    
		     
		    
		        <div class="col-lg-12 col-md-12 col-xs-12" style=" text-aling: justify;">
            	 <br><p align="justify"><font face="arial" size=2><b>NOTA:</b> Estimados usuarios el sistema automáticamente llena en la razón el siguiente texto.<br><b>RAZÓN.- </b> Siento por tal, que no se notifica con este auto a los coactivados, por cuanto aún no han sido citados.- "Ciudad" xxxx, "Fecha" xx xx xxxx xx xxx.- <b>CERTIFICO.-</b></font></p>
				 <FONT FACE="arial" SIZE=2 COLOR=red>(Si necesita cambiar el texto de la razón ingreselo en el siguiente campo, sin incluir las palabras <b>RAZÓN.- </b> y <b>CERTIFICO.-</b>)</FONT>
				
				</div>
		     
             <div class="col-xs-12 col-md-12 col-lg-12" style="margin-top: 10px;">
		                          <p class="formulario-subtitulo" >Razón Providencias:</p>
                                  <textarea type="text"  class="form-control" id="razon_levantamiento" name="razon_levantamiento" value=""  placeholder="Ingrese Razón"></textarea>
                                 <div id="mensaje_razon" class="errores"></div>
             </div>
		     </div>
             </div>
		     </div>
	         </div>
	         </div>
	        
	        
	        
	            <div class="col-lg-12 col-md-12 col-xs-12 ">
	            <div class="col-lg-6 col-md-6 col-xs-12 ">
	            <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Abogado Anterior <br><FONT FACE="arial" SIZE=2 COLOR=red>(Llenar solo si usted esta remplazando a un abogado anterior)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p class="formulario-subtitulo" >Nombre Abogado Anterior:</p>
			  	<input type="text"  name="nombre_usuario_saliente" id="nombre_usuario_saliente" value="" class="form-control" placeholder="Ej1. la Abogada xxxxxx xxxxxx           Ej2. el Abogado xxxxxx xxxxxx"/> 
	            </div>
	        	
	        	</div>
	        	</div>
	          </div>
	         <div class="col-lg-6 col-md-6 col-xs-12 ">
	         <div class="panel panel-info">
	         	<div class="panel-heading">
	         		<h4><i class='glyphicon glyphicon-edit'></i> Nombre Estado Procesal <br><FONT FACE="arial" SIZE=2 COLOR=red>(Seleccionar solo si desea actualizar el estado procesal del juicio)</FONT></h4>
	         	</div>
	        	<div class="panel-body">
	        	
	        	<div class="col-lg-12 col-md-12 col-xs-12">
			  	<p  class="formulario-subtitulo">Actualizar Estado Procesal:</p>
			  	<select name="id_estados_procesales_juicios" id="id_estados_procesales_juicios"  class="form-control" >
			  		<option value="0"><?php echo "--TODOS--";  ?> </option>
					<?php foreach($resultEstadoProcesal as $res) {?>
						<option value="<?php echo $res->id_estados_procesales_juicios; ?>"<?php if($sel_id_estados_procesales_juicios==$res->id_estados_procesales_juicios){echo "selected";}?> ><?php echo $res->nombre_estados_procesales_juicios;  ?> </option>
			            <?php } ?>
				</select>

                 </div>
	        	
	        	</div>
	        	</div>
	          </div>
	          </div>
	          
	        
	        
	        <div class="col-lg-12 col-md-12 col-xs-12 " style="text-align: center; margin-top: 10px">
  		    
		 <button type="submit" formtarget="_self" formaction="<?php echo $helper->url("MatrizJuicios","Imprimir_ProvidenciaLevantamiento"); ?>" data-opcion="1"   id="generar" name="generar" value=""   class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-print"></i> Generar Providencia</button>         
	
		
	  
	  </div>
	        
	        
	        
	        <!-- oculto -->
	          <div class="col-lg-12 col-md-12 col-xs-12" style="visibility:hidden">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 2:</p>
			  	<input type="hidden"  name="numero_oficio1" id="numero_oficio1" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio1" class="errores"></div>
		  </div>
		  
		   <div class="col-lg-12 col-md-12 col-xs-12" style="visibility:hidden">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 3:</p>
			  	<input type="hidden"  name="numero_oficio2" id="numero_oficio2" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio2" class="errores"></div>
		  </div>
		  
		   <div class="col-lg-12 col-md-12 col-xs-12" style="visibility:hidden">
         		<p class="formulario-subtitulo" >Número y Fecha de Oficio 4:</p>
			  	<input type="hidden"  name="numero_oficio3" id="numero_oficio3" value="" class="form-control" placeholder="Ej. BNF-LIQ-DCC-2017-0700 del 21 de abril del 2017"/> 
			    <div id="mensaje_numero_oficio3" class="errores"></div>
		  </div>
		   
		    <div class="col-xs-12 col-md-12 col-lg-12" style="visibility:hidden">
		                          
		                          <p class="formulario-subtitulo" >Dirigido A:</p>
                                  <textarea type="hidden"  class="form-control" id="dirigido_levantamiento" name="dirigido_levantamiento" value=""  placeholder="Ingrese a quién va Dirigido"></textarea>
                                 
             </div>
             <!-- oculto -->
     </form>
     
      </div>
     
  </div>

 
    
   </body>  

    </html>   
        
