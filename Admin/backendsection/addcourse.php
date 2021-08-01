<?php
include "../includes/database.php";

if(isset($_POST['addcourse'])){
$titles=$_POST['titles'];
$descriptionofvideo=$_POST['descriptionofvideo'];
$selectcoursecategory=$_POST['selectcoursecategory'];
$selectcodelanguage=$_POST['selectcodelanguage'];
$tryitornot=$_POST['tryitornot'];
$filetype=$_POST['filetype'];

$file_text=$_POST['file_text'];
$zipfile=$_FILES['zipfile'];

$uniqid=bin2hex(random_bytes(10));

$foledername=rand(1111,9999);
$random=rand(1111,9999);
$zipfilename="";
$filenamedata="";

$videofile =$_FILES['videofile']['name'] ;   
$videoFileType = strtolower(pathinfo($videofile,PATHINFO_EXTENSION));

// singles,both,zip

if($videoFileType =='mp4'|| $videoFileType=='mpeg'){
$videorandomname=rand(1111,9999);
    if(move_uploaded_file($_FILES['videofile']['tmp_name'],"../../media/video/".$videorandomname.$videofile)){
if($filetype == "zip"){
    $path="../../media/file/".$foledername;
    if(is_dir($path) === false){
        mkdir($path,0777);
        $path2="../../media/file/".$foledername."/zip";
        mkdir($path2,0777);
    }
        if(!empty($zipfile['name'])){

    

            $zipfile=$zipfile['name'];
            $extension=pathinfo($zipfile,PATHINFO_EXTENSION);  
            if($extension == "zip"){
                
                    $path=$path2;
                        
                    
                    $new_name = $random.$zipfile;
                    $path = $path."/".$new_name;
            
                   if( move_uploaded_file($_FILES['zipfile']['tmp_name'], $path)){
        
                           $zipfilename=$new_name;
                       
                    }
            
            }
            
        
        

    }

}else if($filetype == "singles"){
    $path="../../media/file/".$foledername;
    if(is_dir($path) === false){
        mkdir($path,0777);
        $path2="../../media/file/".$foledername."/singlefile";
        mkdir($path2,0777);
    }

        $filename=$_POST['filename'];

    $no_of_files=sizeof($filename);
    
    if($no_of_files > 0 ){
        
        $path=$path2;
        
        
        for ($i=0; $i < $no_of_files; $i++) { 
        
        $filenameextract=$filename[$i];
        echo $filenameextract;
        $file_text_etract=$file_text[$i];
        $file_text_etract=str_replace("&","&amp;",$file_text_etract);
        $file_text_etract=str_replace("<","&lt;",$file_text_etract);
        $file_text_etract=str_replace(">","&gt;",$file_text_etract);
        $file_text_etract=str_replace('"',"&quot;",$file_text_etract);
        
        
       
        
        $filenamegenrate=rand(0000,9999);
        $fiame=$filenamegenrate.$filenameextract;
        $fileopen=fopen($path.'/'.$fiame,"a");
        fwrite($fileopen,$file_text_etract);
        $filenamedata.=$fiame.",";
        fclose($fileopen);
        
    }





    }


}else{

    $path="../../media/file/".$foledername;
    if(is_dir($path) === false){
        mkdir($path,0777);
        $path2="../../media/file/".$foledername."/singlefile";
        $path3="../../media/file/".$foledername."/zip";
        mkdir($path2,0777);
        mkdir($path3,0777);
    

        if(!empty($zipfile['name'])){

    

            $zipfile=$zipfile['name'];
            $extension=pathinfo($zipfile,PATHINFO_EXTENSION);  
            if($extension == "zip"){
                
                    $path=$path3;
                        
                    
                    $new_name = $random.$zipfile;
                    $path = $path."/".$new_name;
            
                   if( move_uploaded_file($_FILES['zipfile']['tmp_name'], $path)){
        
                           $zipfilename=$new_name;
                       
                    }
            
            }
            
        
        

    } 

    $filename=$_POST['filename'];

    $no_of_files=sizeof($filename);
    
    
    if($no_of_files > 0 ){
        
        $path=$path2;
        
    
    for ($i=0; $i < $no_of_files; $i++) { 
        $filenameextract=$filename[$i];
        $file_text_etract=$file_text[$i];
        $file_text_etract=str_replace("&","&amp;",$file_text_etract);
        $file_text_etract=str_replace("<","&lt;",$file_text_etract);
        $file_text_etract=str_replace(">","&gt;",$file_text_etract);
        $file_text_etract=str_replace('"',"&quot;",$file_text_etract);
        
        $filenamegenrate=rand(1111,9999);
        $fiame=$filenamegenrate.$filenameextract;
        $fileopen=fopen($path.'/'.$fiame,"a");
        fwrite($fileopen,$file_text_etract);
        $filenamedata.=$fiame.",";
        fclose($fileopen);
        
    }





    }
    
    }

    
}





















$videofilenames=$videorandomname.$videofile;

$insert=mysqli_query($con,"INSERT INTO `courses`(`titile`, `category`, `description`, `youtubelink`, `Codelanguage`, `filetype` , `zipfile` , `folderpathname`, `singlesfile`, `uniqueid`, `tryitornot`) VALUES ('$titles','$selectcoursecategory','$descriptionofvideo','$videofilenames','$selectcodelanguage','$filetype','$zipfilename','$foledername','$filenamedata','$uniqid','$tryitornot')");
if($insert){
    header("Location:../listofcourse.php");
}
}
}
}else if(isset($_POST['update'])){

    $titles=$_POST['titles'];
    $descriptionofvideo=$_POST['descriptionofvideo'];
    $selectcoursecategory=$_POST['selectcoursecategory'];
    $selectcodelanguage=$_POST['selectcodelanguage'];
    $tryitornot=$_POST['tryitornot'];
    $filetype=$_POST['filetype'];
    
    $file_text=$_POST['file_text'];
    $zipfile=$_FILES['zipfile'];
    
    $uniqid=$_POST['uniqid'];
    
    $foledername=$_POST['foldername'];
    $random=rand(1111,9999);
    $zipfilename="";
    $filenamedata="";
    
    // $videofile =$_FILES['videofile']['name'] ;   
    // $videoFileType = strtolower(pathinfo($videofile,PATHINFO_EXTENSION));
    
    // singles,both,zip
    
    // if($videoFileType =='mp4'|| $videoFileType=='mpeg'){
    // $videorandomname=rand(1111,9999);
    // if(move_uploaded_file($_FILES['videofile']['tmp_name'],"../../media/video/".$videorandomname.$videofile)){
    if($filetype == "zip"){
        $path="../../media/file/".$foledername;
        if(is_dir($path) === false){
            mkdir($path,0777);
            $path2="../../media/file/".$foledername."/zip";
            mkdir($path2,0777);
        }
            if(!empty($zipfile['name'])){
                
        
                
                $zipfile=$zipfile['name'];
                $extension=pathinfo($zipfile,PATHINFO_EXTENSION);  
                if($extension == "zip"){
                    
                    $path=$path2;
                            
                    
                        $new_name = $random.$zipfile;
                        $path = $path."/".$new_name;
                
                        if( move_uploaded_file($_FILES['zipfile']['tmp_name'], $path)){
            
                            $zipfilename=$new_name;
                           
                        }
                
                    }
                
                    
            
    
        }
        
    }else if($filetype == "singles"){
        $path="../../media/file/".$foledername;
        if(is_dir($path) === false){
            mkdir($path,0777);
            $path2="../../media/file/".$foledername."/singlefile";
            mkdir($path2,0777);
        }
    
        $filename=$_POST['filename'];
    
        $no_of_files=sizeof($filename);
        
        if($no_of_files > 0 ){
            
            $path=$path2;
            
            
            for ($i=0; $i < $no_of_files; $i++) { 
            
                $filenameextract=$filename[$i];
            echo $filenameextract;
            $file_text_etract=$file_text[$i];
            $file_text_etract=str_replace("&","&amp;",$file_text_etract);
            $file_text_etract=str_replace("<","&lt;",$file_text_etract);
            $file_text_etract=str_replace(">","&gt;",$file_text_etract);
            $file_text_etract=str_replace('"',"&quot;",$file_text_etract);
            
            
            
            
            $filenamegenrate=rand(0000,9999);
            $fiame=$filenamegenrate.$filenameextract;
            $fileopen=fopen($path.'/'.$fiame,"a");
            fwrite($fileopen,$file_text_etract);
            $filenamedata.=$fiame.",";
            fclose($fileopen);
            
        }
        
    
    
        
    
        }
        
    
    }else{
    
        $path="../../media/file/".$foledername;
        if(is_dir($path) === false){
            mkdir($path,0777);
            $path2="../../media/file/".$foledername."/singlefile";
            $path3="../../media/file/".$foledername."/zip";
            mkdir($path2,0777);
            mkdir($path3,0777);
        
            
            if(!empty($zipfile['name'])){
                
        
    
                $zipfile=$zipfile['name'];
                $extension=pathinfo($zipfile,PATHINFO_EXTENSION);  
                if($extension == "zip"){
                    
                    $path=$path3;
                    
                    
                        $new_name = $random.$zipfile;
                        $path = $path."/".$new_name;
                
                        if( move_uploaded_file($_FILES['zipfile']['tmp_name'], $path)){
            
                               $zipfilename=$new_name;
                               
                        }
                        
                }
                
                
            
    
            } 
    
        $filename=$_POST['filename'];
    
        $no_of_files=sizeof($filename);
        
        
        if($no_of_files > 0 ){
            
            $path=$path2;
            
        
        for ($i=0; $i < $no_of_files; $i++) { 
            $filenameextract=$filename[$i];
            $file_text_etract=$file_text[$i];
            $file_text_etract=str_replace("&","&amp;",$file_text_etract);
            $file_text_etract=str_replace("<","&lt;",$file_text_etract);
            $file_text_etract=str_replace(">","&gt;",$file_text_etract);
            $file_text_etract=str_replace('"',"&quot;",$file_text_etract);
            
            $filenamegenrate=rand(1111,9999);
            $fiame=$filenamegenrate.$filenameextract;
            $fileopen=fopen($path.'/'.$fiame,"a");
            fwrite($fileopen,$file_text_etract);
            $filenamedata.=$fiame.",";
            fclose($fileopen);
            
        }
        
    
    
        
    
    }
        
        }
    
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    $videofilenames=$videorandomname.$videofile;
    
    // $insert=mysqli_query($con,"UPDATE `courses` SET `titile`='$titles',`category`='$selectcoursecategory',`description`='$descriptionofvideo',`youtubelink`='$videofilenames',`Codelanguage`='$selectcodelanguage',`filetype`='$filetype',`folderpathname`='$foledername',`tryitornot`='$tryitornot' WHERE `uniqueid`='$uniqid'");
    $insert=mysqli_query($con,"UPDATE `courses` SET `titile`='$titles',`category`='$selectcoursecategory',`description`='$descriptionofvideo',`Codelanguage`='$selectcodelanguage',`filetype`='$filetype',`folderpathname`='$foledername',`tryitornot`='$tryitornot' WHERE `uniqueid`='$uniqid'");
    if($insert){
        header("Location:../listofcourse.php");
      
    }
}
//     }


    
// }










if(isset($_POST['delete'])){
    $uniqid=$_POST['uniqid'];
    

        $insert=mysqli_query($con,"DELETE FROM `courses` WHERE `sno`='$uniqid'");
        if($insert){
                header("Location:../listofcourse.php");
            }
            
    }



    if(isset($_POST['uplive'])){
    $uniqid=$_POST['uniqid'];
    $unlive=$_POST['uplive'];
    
    if($unlive == '0'){
        $r='1';
    }else{
        $r='0';
    }
    

        $insert=mysqli_query($con,"UPDATE `courses` SET `live`='$r' WHERE `uniqueid`='$uniqid'");
        if($insert){
                header("Location:../listofcourse.php");
            }
            
    }
    
    
    
    
    if(isset($_POST['topview'])){
    $uniqid=$_POST['uniqid'];
    $unlive=$_POST['topview'];
    
    if($unlive == '0'){
        $r='1';
    }else{
        $r='0';
    }
    

        $insert=mysqli_query($con,"UPDATE `courses` SET `showtop`='$r' WHERE `uniqueid`='$uniqid'");
        if($insert){
                header("Location:../listofcourse.php");
            }
            
    }
    
?>