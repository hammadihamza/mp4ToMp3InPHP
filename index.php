<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter from mp3 to mp4</title>
<link rel="stylesheet" href="style.css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
    <h2>Converter from mp3 to mp4</h2>
        <div class="card">
        <div class="user-box">
        Upload video here: <input type="file" name="video">
        </div>
        <div class="user-box">
        <button type="submit" name="download">download</button>
        </div>
        </div>
    </form>
    <?php 
    if(isset($_POST["download"])){
        $name = $_FILES['video']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	//validate file format
	$file_name = $_FILES['video']['name'];
	$file_extension = explode(".",$file_name);
	$file_extension = strtolower(end($file_extension));
    if($file_extension == "mp4"){
        $video_name = uniqid().".mp3";
        move_uploaded_file($_FILES["video"]["tmp_name"],"videos/$video_name");
        echo "
        <script>
        window.location.href = 'dl.php?fl=$video_name';
        </script>
        ";
    }

    else{
        echo "<script> 
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
          })
        </script>";
    }
    }
    ?>
</body>
</html>