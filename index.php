<?php

//Print the folder structure
function fileStruct($dir){
    $rows = 5;
    $i = 0;

    //Get working directory of pictures
    $rootDir = getcwd();
    $cwd = $rootDir  .  $dir;

    //Files in current directory
    $files = scandir($cwd);

    echo "<table><tr>";

    //Go through each file and create link
    foreach ($files as $item){
	//if file hidden, then don't show
	if ((strpos($item, '.')===FALSE)){
		$href = '?dir=' . $dir . '/'  . $item;  
		echo "<a href =\"$href\">$item</a><br>";
	//if picture, then put a different type of link
	} else if (strpos($item, '.JPG')){
		//Organize pictures into rows
       		if ($i==$rows){
                	echo "</tr><tr>";
                	$i = 0;
        	}
		$i++;	
		//Create image thumbnail link
                $href = substr($dir, 1) . '/' . $item;
                echo "<td><a href =\"$href\"><img src=\"$href\" height = 150 width = 150></a></td>";
        }
    }

    echo "</tr></table>";

} 

?>
 
<html><body>
 
<p><b>Pictures</b></p>

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
