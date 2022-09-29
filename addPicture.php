<?php
session_start();
// Include the database configuration file
include('dbConfig.php');
if (!isset($_SESSION) || !isset($_SESSION['login']))
{
    header('Location: /Admin.php', true, 302);
    die();
}

$errors = array();
// File upload path
$targetDir = "uploads/";


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $title =valid_donnees( $_POST['title']);
    $des = valid_donnees($_POST['description']);

    if (empty($title)) {
        array_push($errors, "title required");
    }
    //verification du mot de passe 
    if (empty($des)) {
        array_push($errors, "description required");
    }
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $dbh->exec("INSERT into images (file_name, uploaded_on,description,title) VALUES ('".$fileName."', NOW(),'".$des."','".$title."')");
            if($insert){
                array_push($errors, "The file ".$fileName. " has been uploaded successfully.");
            }else{
                array_push($errors,"File upload failed, please try again.");
            } 
        }else{
            array_push($errors, "Sorry, there was an error uploading your file.");
        }
    }else{
        array_push($errors,'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.');
    }
}else{
    array_push($errors,'Please select a file to upload.');
}

// Display status message


function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}
function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<p class="errreur">  ';
		foreach ($errors as $error) {
			echo ' ' . $error;
		}
		echo '</p>';
	}
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icons8-camera-50.ico" />
    <link rel="stylesheet" href="css/addpic.css">
    <title>Add pic</title>

</head>

<body>
    <nav>
        <a href="accueil.php">Home</a>
        <a href="editPic.php"> Picture</a>
        <a href="editMessage.php"> Message</a>
        <a href="addPicture.php"> Add Pic</a>
        <a href="php/logout.php">logout</a>
        <div class="animation start-home"></div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
          
                  
                     
                <div class="card">
                    <form action="addPicture.php" method="post" class="box" enctype="multipart/form-data">
                        <h1>Add Pictures</h1>
                        <input type="text" name="title" placeholder="Title"> 
                        <input type="text" name="description" placeholder="Description"> 
                        <input type="file" name="file" > 
                        <input type="submit" name="submit" value="Add">
                        <?php echo display_error(); ?>
                        <div class="col-md-12">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>





</body>

</html>