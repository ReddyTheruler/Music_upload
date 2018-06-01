
<form method="POST" action="" enctype="multipart/form-data">

<select name="stime" id="stime">
  <option value="Bollywoodsongs">Bollywoodsongs</option>
  <option value="Worldsongs">Worldsongs</option>
  <option value="Punjabisongs">Punjabisongs</option>
  <option value="Telugusongs">Telugusongs</option>
</select>  

<input type="file" name="video"/>
<input type="submit" name="submit" value="Upload"/>
</form>
<?php
include("db.php");
$errors=1;
 //Targeting Folder
 $target="videos/";
if(isset($_POST['submit'])){
 //Targeting Folder
 #$stime = mysqli_real_escape_string($con,$_POST['stime']);
 $target=$target.basename($_FILES['video']['name']);
 //Getting Selected video Type
 $type=pathinfo($target,PATHINFO_EXTENSION);
 //Allow Certain File Format To Upload
 if($type!='mp4' && $type!='3gp' && $type!='avi'){
  echo "Only mp4,3gp,avi file format are allowed to Upload";
   $errors=0;
 }
  //checking for Exsisting video Files
  if(file_exists($target)){
   echo "File Exist";
   $errors=0;
  }
   //Checking for File Size 1000000 bytes== 1MB ..here file limit is 2MB..You can Change the limit..
   //250*2000000==500MB
  $filesize=$_FILES['video']['size'];
   if($filesize>250*2000000){
    echo 'You Can not Upload Large File(more than 2MB) by Default ini setting..<a href="http://www.codenair.com/2018/03/how-to-upload-large-file-in-php.html">How to upload large file in php</a>'; 
       $errors=0;
   }
   if($errors == 0){
    echo ' Your File Not Uploaded';
   }else{
   //Moving The video file to Desired Directory
  $uplaod_success=move_uploaded_file($_FILES['video']['tmp_name'],$target);
  if($uplaod_success){
   //Getting Selected video Information
      $stime = mysqli_real_escape_string($con,$_POST['stime']);
      $name=$_FILES['video']['name'];
      $size=$_FILES['video']['size'];
   $result=mysqli_query($con,"INSERT INTO videos ( stime, name,size,type)VALUES('$stime', '$name','$size','$type')");
   if($result==TRUE){
    echo "Your video '$name' Successfully Upload and Information Saved Our Database";
   }
  }
  }
 }
?>