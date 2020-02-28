function esInteger(e) {
  var charCode 
  charCode = e.keyCode 
  status = charCode 
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
  return false
  }
  return true
}

$(function(){
   $("#formulario").submit(function(e){
      e.preventDefault();
      var url = "registrar.php"; // El script a dónde se realizará la petición.
      $.ajax({
             type: "POST",
             url: url,
             data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
             success: function(data)
             {
                alertify.notify(data, 2, function() {
                  window.location = 'index.php';
                }); // Mostrar la respuestas del script PHP.
             }
           });

      return false; // Evitar ejecutar el submit del formulario.
   });
    return false;
  });