<?php

//Print the folder structure
function fileStruct($dir){
    //Get working directory of pictures
    $rootDir = getcwd();
    $cwd = $rootDir  .  $dir;

    //Files in current directory
    $files = scandir($cwd);

    //Go through each file and create link
    foreach ($files as $item){
	//if file hidden, then don't show
	if ((strpos($item, '.')===FALSE)){
		$href = '?dir=' . $dir . '/'  . $item;  
		echo "<a href =\"$href\">$item</a><br>";
	}
    }

} 

?>
 
<html><body> 

<?php 
//Check if directory is set
if (isset($_GET['dir'])) 
	$dir=$_GET['dir']; 
else 
	$dir=''; 

//Call fx to create links
fileStruct($dir)
?> 

</body></html>


