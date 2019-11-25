 include('lib/ImageResize.php');
    include('lib/ImageResizeException.php');
    global $anImage;

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
                $image = new \Gumlet\ImageResize("uploads/" . $image_filename);

                $image->resizeToBestFit(400, 400);    
                $image->save("uploads/"."medium" . "{$image_filename}");
            
                $image->resizeToBestFit(50, 50);    
                $image->save("uploads/"."thumbnail" . "{$image_filename}");

            } 

        }
   
    }


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
                <input type="file" name="image" /> <br>
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