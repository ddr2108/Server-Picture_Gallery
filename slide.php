<?php

//Print the folder structure
function slideshow($dir){
    $rows = 5;
    $i = 0;

    //Get working directory of pictures
    $rootDir = getcwd();
    $cwd = $rootDir  .  $dir;

    //Files in current directory
    $files = scandir($cwd);
}
?>
 
<html><body>
 
<p><b>Slideshow</b></p>

<?php 
//Check if directory is set
if (isset($_GET['file'])) 
	$file=$_GET['file']; 
else 
	$file=''; 

//Call fx to create links
//slideshow($file);
?> 

</body></html>
