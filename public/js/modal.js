function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        // Asignamos el atributo src a la tag de imagen
        $('#imagenmuestra').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  // El listener va asignado al input
  $("#src_img").change(function() {
    readURL(this);
});

//descargar imagen en tu pc
function downloadImage() {
  var image = document.getElementById("imagenmuestra").src;
    var link = document.createElement('a');
    link.download = "image.png";
    link.href = image;
    link.click();
}

 //file type validation
  function validateFileType(){
    var fileName = document.getElementById("src_img").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        //TO DO
    }else{
        alert("Solo se permiten archivos con extension .jpeg/.jpg/.png!");
    }
  }

