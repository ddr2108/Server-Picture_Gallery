<?php

function fileStruct($dir){ 
    echo '<a href ="?dir=a">Link to here</a><br>';
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


