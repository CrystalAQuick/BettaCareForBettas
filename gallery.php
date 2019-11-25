<?php
    require('database/db_connect.php');
    include('lib/ImageResize.php');
    include('lib/ImageResizeException.php');
    global $anImage;

    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $queryGallery = "SELECT * FROM gallery " ;

    $statementGallery = $db->prepare($queryGallery);

    $statementGallery->execute();
    $images = $statementGallery->fetchAll();

    if(isset($_POST['submit'])){

        if(strlen($title) >= 1  && strlen($about) >= 1){

            $insertStuff = "INSERT INTO gallery (title, about) VALUES (:title, :about)";

            $statementStuff = $db->prepare($insertStuff);
            

            $statementStuff -> bindValue(':title', $title);
            $statementStuff -> bindValue(':about', $about);
                       // $statementStuff -> bindValue(':image', $image);

            $statementStuff->execute();
        }
        header("Location: gallery.php");
    }


    // file_upload_path() - Safely build a path String that uses slashes appropriate for our OS.
    // Default upload path is an 'uploads' sub-folder in the current folder.
    function file_upload_path($original_filename, $upload_subfolder_name = 'uploads') {
       $current_folder = dirname(__FILE__);
       
       // Build an array of paths segment names to be joins using OS specific slashes.
       $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];
       
       // The DIRECTORY_SEPARATOR constant is OS specific.
       return join(DIRECTORY_SEPARATOR, $path_segments);
    }

    // file_is_an_image() - Checks the mime-type & extension of the uploaded file for "image-ness".
    function file_is_an_image($temporary_path, $new_path) {
        $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png', 'application/pdf'];
        $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png', 'pdf'];
        
        $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
        //$actual_mime_type        = getimagesize($temporary_path)['mime'];
        $actual_mime_type        = mime_content_type($temporary_path);
        
        $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
        $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);
        
        return $file_extension_is_valid && $mime_type_is_valid;
    }
    
    $image_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] === 0);
    $upload_error_detected = isset($_FILES['image']) && ($_FILES['image']['error'] > 0);
    if ($image_upload_detected) { 
        $image_filename        = $_FILES['image']['name'];
        $temporary_image_path  = $_FILES['image']['tmp_name'];




        $new_image_path        = file_upload_path($image_filename);
        if (file_is_an_image($temporary_image_path, $new_image_path)) {
            move_uploaded_file($temporary_image_path, $new_image_path);

            // gets just the extenstion of the image
            $anImage  = pathinfo($image_filename, PATHINFO_EXTENSION);
           
           //makes sure its not a pdf
            if($anImage != 'pdf'){
               // echo $anImage;
                $extend = "." . $anImage;
                $image = new \Gumlet\ImageResize("uploads/" . $image_filename);
             
             $fileExt = explode('.', $image_filename);
            $fileActualExt = strtolower(end($fileExt));

                $image->resizeToBestFit(100, 100);    
                $image->save("uploads/". "{$image_filename}");
             //   $image->save("uploads/". "{$title}" .".". "{$fileActualExt}");
            

                $uniqueName =  uniqid('', false);
                $image->save("uploads/"."{$uniqueName}" ."{$image_filename}");
                // $image2->save("uploads/". "{$title}"."{$uniqueName}" .".". "{$fileActualExt}");

                 $insertStuff = "INSERT INTO gallery (title, about, uniqueName, image) VALUES (:title, :about, :uniqueName, :image)";

            $statementStuff = $db->prepare($insertStuff);
            
            $temp = $uniqueName . $image_filename;
            $statementStuff -> bindValue(':title', $title);
            $statementStuff -> bindValue(':about', $about);
             $statementStuff -> bindValue(':uniqueName', $uniqueName);
               $statementStuff -> bindValue(':image', $temp);
             // $statementStuff -> bindValue(':image', $image);
            $statementStuff->execute();
    


            } 

        }
   
    }


?>
 <!DOCTYPE html>
 <html lang="en">
     <head><title>File Upload Form</title></head>
      <link rel="stylesheet" type="text/css" href="styles/questions.css">
 <body>

         <?php include('components/navTemp.php'); ?>

       <div id="wrapper">
        <h1>Humble brag Posts!</h1>
            <form method='post' enctype='multipart/form-data' action="gallery.php">
                                <input type="text" name="title" placeholder="title" /><br>
                <input type="text" name="about" placeholder="about" /><br>
             <!-- <label for='image'>Image</label> --><br>
             <input type='file' name='image' id='image'><br>
             <input type='submit' name='submit' value='Upload Image'>
            </form>    
            <?php if ($upload_error_detected): ?>

            <p>Error Number: <?= $_FILES['image']['error'] ?></p>

            <?php elseif ($image_upload_detected): ?>
            <?php if($anImage == 'png' || $anImage == 'gif' || $anImage == 'jpg' || $anImage == 'jpeg'):?>
           <?php endif ?>
            <?php endif ?>          
       </div> 

      <?php foreach($images as $img): ?>
        <h1><?= $img['title'] ?><a href="editGallery.php?id=<?=$img['id']?>">-edit</a></h1>

    <?php if($img['uniqueName'] != '' ): ?>
        <img src="uploads/<?= $img['image'] ?> " alt="<?= $img['uniqueName'] ?>" />
    <?php endif; ?>
                   
                  <h1><?= $img['about'] ?></h1>
      <?php endforeach ?>
?>



 </body>
 </html>


 