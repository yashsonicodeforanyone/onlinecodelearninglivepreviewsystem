<?php
session_start();
if(isset($_SESSION['tyu'])){

  unset($_SESSION['tyu']);

}

$_SESSION['tyu']="onlinefree8888@gmail.com";



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Media Upload</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/dropzone.css">
</head>
<body >
	<div id="main" style="margin-top:40px; border:1px solid black; border-radius:30px;" >
		<div id="header">
			<h1 >Select Media</h1>
		</div>
		<div id="content">
      <form class="dropzone" id="file_upload">
      </form>
      <div id="button">
      <button style="background-color:blue;" id="upload_btn">Upload</button>
    
      <button id="reset">Reset</button>
      </div>
      
    </div>
	</div>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/dropzone.js"></script>
  <script>
$("#reset").click(function(){
location.reload(true);

});

    Dropzone.autoDiscover = false;
    
    
    var myDropzone = new Dropzone("#file_upload", { 
      url: "upload.php",
      parallelUploads: 12,
      uploadMultiple: true,
      acceptedFiles: '.png,.jpg,.jpeg',
      autoProcessQueue: false,
      success: function(file,response){
        
        console.log(response);
        if(response == 'done'){
          $('#content .message').hide();
          $('#content').append('<div class="message success">Images Uploaded Successfully.</div>');
          $("#button").html('<form action="../payment/index.php" method="post"><button name="submit" type="submit">Submit</button></form>');

        }
        else if(response == 'less than'){

          $('#content .message').hide();
          $('#content').append('<div class="message error">Select Image more than 6.</div>');
        }
        else if(response == 'image already submit'){

          $('#content .message').hide();
          $('#content').append('<div class="message error">Your image is already submit.</div>');
        }
        else{
          $('#content .message').hide();
          $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
        }
      },
    });

    $('#upload_btn').click(function(){
    
      myDropzone.processQueue();
    });
  </script>
</body>
</html>
