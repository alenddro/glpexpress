
	function mensajeUsu($id, $nombre, $apellido, $correo){
		$("#containermodal").html(
		"<form name='ajaxform' id='ajaxform' action='assets/ajax/enviarmensaje.php' method='POST'>"+	
			"<div class='modal fade' id='myModal"+ $id +"'>"+
			  "<div class='modal-dialog'>"+
			    "<div class='modal-content'>"+
			      "<div class='modal-header'>"+
			        "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+
			        "<h4 class='modal-title'>Mandar un mensaje a "+ $nombre +" "+ $apellido +"</h4>"+
			      "</div>"+
			      "<div class='modal-body'>"+
			      	  "<input type='hidden' class='form-control'  name='nombre' value='"+ $nombre +"'></br>"+
			      	  "<input type='hidden' class='form-control'  name='apellido' value='"+ $apellido +"'></br>"+
			      	  "<input type='hidden' class='form-control'  name='correo' value='"+ $correo +"'></br>"+
				      "<input type='text' placeholder='Asunto' id='asunto' name='asunto' class='form-control'/><br/>"+
				      "<textarea placeholder='Escribir mensaje' class='form-control' name='mensaje' id='mensaje'></textarea>"+
			      "</div>"+
			      "<div class='modal-footer'>"+
			       	"<button type='button' class='btn btn-default' data-dismiss='modal'>Cancelar</button>"+
			        "<input id='btn_enviar' name='enviarcorreo' type='submit' class='btn btn-primary' value='Enviar'>"+
			      "</div>"+
			    "</div>"+
			  "</div>"+
			"</div>"+
		"</form>");
	 	

	 	$("#ajaxform").submit(function(e)
			{
			    var postData = $(this).serializeArray();
			    var formURL = $(this).attr("action");
			    $.ajax(
			    {
			        url : formURL,
			        type: "POST",
			        data : postData,
			        success:function(data) 
			        {
			            $('#respuestaMensajeModal').html(data);
			        },
			        error: function(jqXHR, textStatus, errorThrown) 
			        {
			            //if fails      
			        }
			    });
			    e.preventDefault(); //STOP default action
			});
			 
			$("#ajaxform").submit(); //Submit  the FORM
	}
	
	

//onClick=\"enviaCorreoJavascript('" + $correo + "' ,'"+  +"');\"
