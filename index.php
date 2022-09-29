<?php session_start();
include('dbConfig.php');
include('compteur.php');
//sortir les photo de la base
$sth = $dbh->query("select * from images");
$result = $sth->fetchAll(PDO::FETCH_BOTH);

$errors = array();
if(isset($_POST["send"])){

    $name=valid_donnees($_POST['name']);
    $email=valid_donnees($_POST['email']);
    $sub=valid_donnees($_POST['subject']);
    $mess=valid_donnees($_POST['message']);
    if (empty($name)) {
      array_push($errors, "name required");
  }
  //verification du mot de passe 
  if (empty($email)) {
      array_push($errors, "email required");
  }
  if (empty($sub)) {
    array_push($errors, "subject required");
}
//verification du mot de passe 
if (empty($mess)) {
    array_push($errors, "message required");
}

$insert = $dbh->exec("INSERT into contacter (name,email,subject,message,date) VALUES ('".$name."','".$email."','".$sub."','".$mess."',NOW())");
if($insert){
    array_push($errors, "The message has been sended successfully.");
}else{
    array_push($errors,"sending failed, please try again.");
} 


  
}

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
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="shortcut icon" href="img/icons8-camera-50.ico"/>
        <title>Ben Youssef Photography</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/templatemo-main.css">

      <!--  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">-->
        <script src="https://kit.fontawesome.com/119135b609.js" crossorigin="anonymous"></script>
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
   

      </head>

<body>
<!--    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>-->
    
  
        <nav>
     
          <ul>
            <li><a href="#1"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>About</em></a></li>
            <li><a href="#3"><i class="fa fa-image"></i> <em>Work</em></a></li>
            <li><a href="#4"><i class="fa fa-envelope"></i> <em>Contact</em></a></li>
          </ul>
        </nav>
        <section>
        <div class="slides">
          <div class="slide" id="1">
            <div class="content first-content">
              <div class="container-fluid">
                  <div class="col-md-3">
                      <div class="author-image"><img src="img/BIL.jpg" alt=""></div>
                  </div>
                  <div class="col-md-9">
                      <h2>Bilel Ben Youssef</h2>
                      <p>Bilel <em>Ben Youssef</em>, born in Tunisia on January 07 ,1999. <em>He is IT student at ISET DJERBA,</em> He likes to capture emotions in photos.</p>
                      <div class="main-btn"><a href="#2">Read More</a></div>
                  </div>
              </div>
            </div>
          </div>
          <div class="slide" id="2">
            <div class="content second-content">
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div class="left-content">
                            <h2>About Me</h2>
                            <p><b>Bilel Ben youssef</b> was born in Tunis on January 7, 1999. Since his young age he loves the photography.</p>
                            <p>He is very passionate about photography. Especially taking photos of portraits and fashion and weddings moments … He likes to capture emotions in photos. The most real emotions of course! We all agree that photography is an art and it takes creativity to create wonderful portraits</p> 
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-image">
                          <img src="img/bilel.jpg" alt="">
                      </div>
                    </div>
                </div>
            </div>
          </div>
         
          <div class="slide" id="3">
            <div class="content fourth-content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- image 1 -->
                        <?php foreach($result as $mes): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="uploads/<?php echo $mes['file_name']; ?>" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2><?php echo ($mes['title']); ?></h2>
                                       <!--     <p><?php echo ($mes['description']); ?></p>-->
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="uploads/<?php echo $mes['file_name']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide" id="4">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div id="map">
 
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61855.54731418941!2d10.85942512946749!3d33.71755617859939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13aab9048f806c41%3A0x755fa267e88e2bbe!2sGuellala!5e0!3m2!1sfr!2stn!4v1655730174586!5m2!1sfr!2stn" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                   
                        <form id="contact" action="index.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-12">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" name="send" class="btn">Send Now</button>
                                    
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
</section>
        <footer class="footer">
          
          <div class="content">
        <p>
           <a href="https://www.facebook.com/ben.you.bilel" target="_blank"><i class="fa-brands fa-facebook"></i></a> 
            <a href="https://www.instagram.com/bilel_ben_you/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://github.com/Benyoubilel" target="_blank"><i class="fa-brands fa-github"></i></a>
           <a href="https://wa.me/21653509030" target="_blank"><i class="fa-brands fa-whatsapp"></i></a> 
        </p>
              <p>Copyright &copy; 2022 Bilel ben youssef </p>
          </div>
        </footer>

    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
    
    <!-- 100% privacy friendly analytics -->
<script async defer src="https://scripts.simpleanalyticscdn.com/latest.js"></script>
<noscript><img src="https://queue.simpleanalyticscdn.com/noscript.gif" alt="" referrerpolicy="no-referrer-when-downgrade" /></noscript>
</body>
</html>