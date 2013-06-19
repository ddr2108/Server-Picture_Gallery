<?php

//Print the folder structure
function fileStruct($dir){
    $rows = 8;
    $colNum = 0;
    $picNum = 0;

    //Get working directory of pictures
    $rootDir = getcwd();
    $cwd = $rootDir  .  $dir;

    //Files in current directory
    $files = scandir($cwd);


    //Up one directory
    $posUp = strrpos($dir, '/');
    $upDir = substr($dir, 0, $posUp);
    $up  = '?dir=' . $upDir;
    echo "<a href =\"$up\">Up One Directory</a><br><br>";

    //Create table
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
       		if ($colNum==$rows){
                	echo "</tr><tr>";
                	$colNum = 0;
        	}
		$colNum++;
		//Link to image
                $href = substr($dir, 1) . '/' . $item;
                //Link to send to slide.php
		$fileGet = 'slide.php?file='  . $dir . '-'  . $picNum;
		echo "<td><a href =\"$fileGet\"><img src=\"$href\" height = 150 width = 150></a></td>";
        }
	$picNum++;
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
