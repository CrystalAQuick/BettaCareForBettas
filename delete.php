<?php

//	require('connect.php');
    	
    if(isset($_POST['submitDelete']) && isset($_POST['id'])){
    	//	$delete = "DELETE FROM blogs WHERE id = :id=29";

        $delete = "DELETE FROM questions WHERE id = {$_GET['id']}";
      
        if($db ->query($delete) == true){ 
            // echo "Record was deleted successfully."; 
            header("Location: view.php");
        } else {
            echo "not deleted";
        }
        $deleteStatement = $db->prepare($delete);
    }

?>

