<?php
include('global.php');
		$db = Nesting::getInstance();
		$mysqli = $db->getConnection();
		
for($i = 1; $i <= count($_REQUEST['list']); ++$i) {
	$sql = "UPDATE nb_nesting SET parent_id = {$_REQUEST['list'][$i]} where id = $i";
	$query = mysqli_query($mysqli, $sql);
}
echo "<div class=\"infoRes\"> <p> Successfully updated </p> </div>";

		 $sql = "SELECT * FROM `nb_nesting`";
		 $query = mysqli_query($mysqli,$sql);		
 echo "<br> <table border='1' cellpadding='3' ><tr> <td><b>ID</b></td>    <td><b>Parent ID</b></td>   <td><b>Name</b></td> </tr> \n";  		 
   while ($result = mysqli_fetch_array($query)) {
		        $id = $result ['id'];
		        $name = $result ['name'];
		        $parent_id = $result ['parent_id']; 
				echo "<tr> <td>$id</td> <td>$parent_id</td> <td>$name</td>  </tr> \n";		        
   }	
echo "\n </table>";
?>