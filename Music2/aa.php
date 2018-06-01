<?php
include("db.php");
?>
<link rel="stylesheet" href="style.css" type="text/css"/>
<div id="content">
 <?php
 include('upload.php');
 $result=mysqli_query($con,"SELECT*FROM videos");
 while($row=$result->fetch_array()){?>
<div id="video_player_box"> 
  <video id="video" width="300" height="200" controls>
  <source src="<?php echo 'videos/'.$row['name'];?>" type="video/<?php echo $row['type'];?>">
    Your browser does not support the video tag.
</video>
<div id="download">
    <button id="downloadbtn"><a href="download.php?file=<?php echo $row['name'];?>">Download Now</a></button>
  </div>
</div>
 
  <?php }?>
  </div>