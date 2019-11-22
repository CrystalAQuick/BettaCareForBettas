<?php
 require('database/db_connect.php');
//https://www.youtube.com/watch?v=msO37iodcw8
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if(isset($_POST['submit'])){

		if(strlen($title) >= 1  && strlen($about) >= 1){

			$insertStuff = "INSERT INTO gallery (title, about) VALUES (:title, :about)";

            $statementStuff = $db->prepare($insertStuff);
            
   
            $statementStuff -> bindValue(':title', $title);
            $statementStuff -> bindValue(':about', $about);

            $statementStuff->execute();


			$file = $_FILES['file'];
		    $fileName = $_FILES['file']['name'];
		    $fileTmpName = $_FILES['file']['tmp_name'];
		    $fileSize = $_FILES['file']['size'];
		    $fileError = $_FILES['file']['error'];
		    $fileType = $_FILES['file']['type'];

		    $fileExt = explode('.', $fileName);
		    $fileActualExt = strtolower(end($fileExt));
		   

		    $allowed = array('jpg', 'jpeg', 'png');

		    if(in_array($fileActualExt, $allowed)){
		        if($fileError === 0){
		            if($fileSize  < 500000){
		                //$fileNameNew =  uniqid(',', true) . "." . $fileActualExt ;
		                //$fileNameNew =  uniqid('', false) . "-" . $fileName;
		       		    

		       		    //$fileNameNew =  $title .  $fileActualExt;         
			       		$fileNameNew =  $title . "." . $fileActualExt ;	                

		                $fileDest = 'uploads/' . $fileNameNew;
		                move_uploaded_file($fileTmpName, $fileDest);
		                
		            } else{
		                echo "Your file is too large!";
		            }

		        }else{
		            echo "There was an error in the uploading process";
		        }



		    } else {
		        echo "invalid image type";
		    }



		}
		
	}
		 		$queryGallery = "SELECT * FROM gallery " ;

		        $statementGallery = $db->prepare($queryGallery);

		        $statementGallery->execute();
                $images = $statementGallery->fetchAll();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="styles/questions.css">
</head>
<body>
	 <?php include('components/navTemp.php'); ?>
	 <h1>Gallery</h1>
	 <div id="wrapper">


 	
		 <div>
			 <form action="gallery.php" method="post" enctype="multipart/form-data" >
			 	<input type="text" name="title" placeholder="title" /><br>
			 	<input type="text" name="about" placeholder="about" /><br>
			 	<input type="file" name="file" /> <br>
			 	<input type="submit" name="submit">			 	
			 </form>	 	
		 </div>	 
	 </div>

      <?php foreach($images as $img): ?>
      	<h1><?= $img['title'] ?></h1>
  		<img src="uploads/<?= $img['title'] ?>.png" />
  		          <h1><?= $img['about'] ?></h1>
      <?php endforeach ?>


</body>
</html>