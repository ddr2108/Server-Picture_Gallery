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
    echo '<table height=450 width=650>';
    echo "<tr><td><a href =\"$image\"><img src=\"$image\"  height=400 width=600></a></td></tr>";

    //Get path of previous  picture
    $prevImage = $imageLink . '/' . $files[$imageIndex-1];
    $prevImage = substr($prevImage, 1);
    if (strpos($prevImage, '.JPG')){
	$prevImageFile = '?file=' . substr($file, 0, $imageEnd) . '-' . ($imageIndex-1);
        echo "<tr><td><a href =\"$prevImageFile\">Previous Image</a></td>";    	
    }else{
	echo "<tr><td>Previous Image</a></td>";
    }
 
    //Include home button 
    $home = 'index.php?dir=' . $imageLink;
    echo "<td><a href =\"$home\">Home</a></td>";
 
    //Get path of next picture
    $nextImage = $imageLink . '/' . $files[$imageIndex+1];
    $nextImage = substr($nextImage, 1);  
    if (strpos($nextImage, '.JPG')){
        $nextImageFile = '?file=' . substr($file, 0, $imageEnd) . '-' . ($imageIndex+1);
        echo "<tr><td><a href =\"$nextImageFile\">Next Image</a></td>";
    }else{
	echo "<tr><td>Next Image</a></td>";
    }
   
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
