<?php

//Print the folder structure
function slideshow($file){
    $rows = 5;
    $i = 0;

    //Find image link
    $imageEnd = strpos($file,'-');
    $imageIndex = substr($file,$imageEnd+1);
    $imageLink = substr($file, 0, $imageEnd);
   
    //Get working directory of pictures
    $rootDir = getcwd();
    $cwd = $rootDir  .  $imageLink;

    //Files in current directory
    $files = scandir($cwd);
 
    //Get path of picture
    $image = $imageLink . '/' . $files[$imageIndex];
    $image = substr($image, 1);    

    //Print image
    echo '<table><tr><td>';
    echo "<img src =\"$image\"  height = 600 width = 900></td></tr>";
    echo '</table>';
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
slideshow($file);
?> 

</body></html>
