

jQuery(document).ready(function( $ ) {


$( "#add-comment" ).click(function() {
 
  $("#-label").css("display", "block");
  });
$( "#pageInsert" ).click(function() {
 
 
  $('#type').attr('value', 'Page'); // change l'attribut src en écrasant l'ancienne valeur
  $('#titre-insert').text("Ajouter une page");
  $('#-label').text("Titre du page");






  //$('#firsttitle').css('display','block');

$('#menu').show();
$('#menu-label').show();
  $('#firsttitle').show();
  $('#firsttitle-label').show();
  $('#thirdtitle').show();
  $('#image').show();
  $('#image-label').show();
  $('#secondtitle').show();
  $('#secondtitle-label').show();
  $('#thirdtitle').show();
  $('#thirdtitle-label').show();
  $('#firsttitle').show();
  $('#firsttitle-label').show();
  $('#title').show();
  $('#title-label').show();
   $('#type').show();
  $('#type-label').show();
  $('#-label').show();

  


  
});

$( "#postInsert" ).click(function() {
  $('#firsttitle').show();
  $('#firsttitle-label').show();
  $('#type').show();
  $('#type-label').show();
  $('#-label').show();
  
  $('#-label').text("Titre du Chapitre");
  $('#firsttitle-label').text("Dexième titre du chapitre");
  $('#menu-label').text("Titre du chapitre");
  $('#thirdtitle').hide();
  $('#image').hide();
  $('#image-label').hide();
  $('#secondtitle').hide();
  $('#secondtitle-label').hide();
  $('#thirdtitle-label').hide();
  $('#title-label').hide();
  $('#type').attr('value', 'Chapitre'); // change l'attribut src en écrasant l'ancienne valeur
  $('#titre-insert').text("Ajouter un chapitre");

  
});
  
  
});




  tinymce.init({
  selector: 'textarea#basic-example',
  height: 400,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});

  

