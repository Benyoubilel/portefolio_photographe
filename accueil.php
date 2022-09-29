<?php session_start();
include('dbConfig.php');

// TRAITEMENT SUR LE FICHIER TEXTE
if(empty($hits)){
$fp=fopen("compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
$num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
fclose($fp); // FERME LE FICHIER
}
if (!isset($_SESSION) || !isset($_SESSION['login']))
{
    header('Location: /Admin.php', true, 302);
    die();
}
//compter le nombre de messages recu
$sql='select * from contacter';
$sth=$dbh->query($sql);
$nbrmsg=$sth->rowCount();
//compter le nombre d'images dans le portfilio

$req='select * from images';
$sth=$dbh->query($req);
$nbrpic=$sth->rowCount();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styleAcc.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icons8-camera-50.ico"/>
    <title>Accueil</title>
    <style>
        body,html{height: 100%;   overflow-y: hidden; overflow-x: hidden;
   }
        section{
            align-items: center;
            position:relative;
            top:-50px;
            left: 25%;
        }
        .txt{
            position:relative;
            left:-25%;
            
            
        }
        body{
    background-image: url(../img/second_bg.jpg);
    background-size:cover;
    position:relative;
}
nav {
	margin: 27px auto 0;

	position: relative;
	width: 590px;
	height: 50px;
	background-color: #34495e;
	border-radius: 8px;
	font-size: 0;
}
nav a {
	line-height: 50px;
	height: 100%;
	font-size: 15px;
	display: inline-block;
	position: relative;
	z-index: 1;
	text-decoration: none;
	text-transform: uppercase;
	text-align: center;
	color: white;
	cursor: pointer;
}
nav .animation {
	position: absolute;
	height: 100%;
	top: 0;
	z-index: 0;
	transition: all .5s ease 0s;
	border-radius: 8px;
}
a:nth-child(1) {
	width: 100px;
}
a:nth-child(2) {
	width: 110px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 160px;
}
a:nth-child(5) {
	width: 120px;
}
nav .start-home, a:nth-child(1):hover~.animation {
	width: 100px;
	left: 0;
	background-color: #1abc9c;
}
nav .start-about, a:nth-child(2):hover~.animation {
	width: 110px;
	left: 100px;
	background-color: #e74c3c;
}
nav .start-blog, a:nth-child(3):hover~.animation {
	width: 100px;
	left: 210px;
	background-color: #3498db;
}
nav .start-portefolio, a:nth-child(4):hover~.animation {
	width: 160px;
	left: 310px;
	background-color: #9b59b6;
}
nav .start-contact, a:nth-child(5):hover~.animation {
	width: 120px;
	left: 470px;
	background-color: #e67e22;
}


h1 {
	text-align: center;
	margin: 40px 0 40px;
	text-align: center;
	font-size: 30px;
	color: #ecf0f1;
	text-shadow: 2px 2px 4px #000000;

}




    </style>
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
    <div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row txt">
    <div class="col-12 mt-3 mb-1">
        <h1 class="text-uppercase danger"><p>ADMIN PANEL</p></h1>
        
      </div>
    </div>
    
  

  
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                    <!-- CODE PHP -->
                  <h3 class="primary"><?php echo $nbrpic; ?></h3>
                  <span>TOTAL PICTURES</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-picture primary font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                    <!-- code php -->
                  <h3 class="warning"><?php echo $nbrmsg; ?></h3>
                  <span>TOTAL MESSAGES</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-bubbles warning font-large-2 float-right"></i>
                </div>
              </div>
              <div class="progress mt-1 mb-0" style="height: 7px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   

    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
      <a href="editPic.php">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                <h3><?php echo $nbrpic; ?></h3> <!-- code php needed -->
                  <span>EDIT PICTURES</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
      
      <div class="col-xl-3 col-sm-6 col-12">
      <a href="editMessage.php">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pencil warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3><?php echo $nbrmsg; ?></h3> <!-- code php needed -->
                  <span>EDIT MESSAGES</span>
                </div>
              </div>
            </div>
          </div>
        </div></a>
      </div>
      
     
      
    </div>
    <div class="row">
    
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-pointer danger font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                    <!-- code php needed -->
                  <h3><?php echo $num; ?></h3>  
                  <span>Total Visits</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
<div class="col-xl-3 col-sm-6 col-12">
<a href="addPicture.php">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                <h3><?php echo $nbrpic; ?></h3> 
                  <span>ADD Pictures</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-plus danger font-large-2 float-right"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</body>
</html>



