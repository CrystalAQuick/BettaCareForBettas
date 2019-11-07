<?php


    if(isset($_POST['submitDelete']) && isset($_POST['id']) ){

        $delete = "DELETE FROM faq WHERE id = {$_GET['id']}";
      
        if($db ->query($delete) == true){ 
            header("Location: faqMod.php");
        } else {
            echo "not deleted";
        }
        $deleteStatement = $db->prepare($delete);
    }

?>
