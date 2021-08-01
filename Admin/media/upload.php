<?php

session_start();
$tyu=$_SESSION['tyu'];

include "../connection_login.php";

	

  if($_FILES['file']['name'] != ''){

  	$file_names = '';

  	$total = count($_FILES['file']['name']);
if($total >= 3){

	
	for($i=0; $i<$total; $i++){
		$filename = $_FILES['file']['name'][$i]; 
		$filen=explode(".",$filename);
		$name=$filen[0];
		$extension = pathinfo($filename,PATHINFO_EXTENSION);
		
		$valid_extensions = array("png","jpg","jpeg");
		$random=rand(1000,9999);
		if(in_array($extension, $valid_extensions)){ 
			$new_name = $random.$name.".". $extension;
			$path = "images/" . $new_name;
			
			move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);
			
			$file_names .= $new_name . " , ";
		}else{
			echo 'not done';
		}
	}
	

	$select="SELECT * FROM `properties` WHERE `email`='$tyu'";
	$sletcquery=mysqli_query($con,$select);
	$data=mysqli_fetch_assoc($sletcquery);
	$media_status=$data['media_status'];
	$image=$data['image'];
	if($media_status == "media_not_submit" & $image == ""){
		$z="media_submit";
		$query="UPDATE `properties` SET `image`='$file_names',`media_status`='$z' WHERE  `email`='$tyu'";
		
		$querydone=mysqli_query($con,$query);
			if($querydone){
				echo "done";
			}
		
	}else{
		echo "image already submit";
	}
	
}else{
	echo "less than";
}
}
	?>
