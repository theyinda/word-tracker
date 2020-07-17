<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "email_task";

// $host = "x40p5pp7n9rowyv6.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
// $dbusername = "kwws14q1gbssr121";
// $dbpassword = "byn7cat9pgu42j1d";
// $dbname = "a0xy0b5qb5exk0kd";
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "users";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

$msg = '';
$msgClass = '';
// Email form validation
if (filter_has_var(INPUT_POST, 'submit')) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	if (!empty($email)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$msg = 'Incorrect email';
			$msgClass = 'alert-danger';
		} else {
			$msg = 'Thank you for joining our waitlist';
			$msgClass = 'alert-success';
		}
	} else {
		$msg = 'Kindly fill this space';
		$msgClass = 'alert-danger';
	}
	$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $_POST['email'] . "'");
	if (mysqli_num_rows($select)) {
		$msg = 'Registered';
		$msgClass = 'alert-danger';
	};
	$query = "INSERT INTO users (email) VALUES ('$email')";
	if (mysqli_query($conn, $query)) {
		echo 'Success';
		// 		$msg = 'You have subscribed successfully';
		// 		$msgClass = 'alert-success';
	} else {
		echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
		// 		$msg = 'Your email has not been sent...';
		// 		$msgClass = 'alert-danger';
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" />
    <title>Word Tracker</title>
  </head>
  <body>
    <div class="container-fluid main">
    <!--ABOUT-->
    <section class="about"> 
      <div class="container">
        <div class="row" data-aos="fade-down" data-aos-duration="1500">
          <img class="logo-img" src="img/logo.svg" alt="logo">
       </div>
        <div class="row">
          <div class="col-md"data-aos="fade-right" data-aos-duration="1500">
            <h2 class="logo-txt">Now you can track your<br> frequently most-used<br> words</h2>
            <p>Find out what words you’ve said the most.</p>

            <form action="index.php" method="POST">
                <?php if ($msg != '') : ?>
                  <div style="width: 60%; height: 60px; text-align:center; margin:auto; margin-bottom:30px" class="alert <?php echo $msgClass; ?>">
                      <?php echo $msg ?>
                  </div>
                <?php endif; ?>  
                <div class="input-group mb-3 track-form">
                    <input type="email" class="form-control" required name="email"  value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Your Email" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" name="submit">Join Waitlist</button>
                        </div>
                </div>
            </form>
          </div>

          <div class="col-md-8" data-aos="fade-left" data-aos-duration="1500">
            <img class=" header-bg" src="./img/header-bg.svg" alt="clear-audio">
          </div>
        </div>
      </div>
    </section>  

        <!--FEATURES-->
        <section class="features">
          <div class="container">
          <div class="text-center">
                <h2 class="feature-text">Our Features</h2>
            </div>

                <div class="row feature">
                  
                  <div class="col-md-6 feature-content" data-aos="fade-right" data-aos-duration="1500">
                    <img class="img-fluid clear-audio-img" src="./img/clear-audio.svg" alt="clear-audio">
                    <h3 class="clear-audio-text text-center">Clear Audio</h3>
                      <p class="clear-audio-subtext text-center">Clear audio recordings. special sound field <br>that detects the persons voice while they<br> speak.</p>
                    </p>
                  </div>

                  <div class="col-md-6 text feature-content" data-aos="zoom-in-up" data-aos-duration="1500">
                    <img class="img-fluid apple-watch-img" src="./img/apple-watch.svg" alt="apple-watch">
                    <h3 class="apple-watch-text text-center">Apple Watch</h3>
                        <p class="apple-watch-subtext text-center">Record audio anywhere right from your<br> wrist. Quickly capture spontaneous<br> conversations by just a tap</p>
                      </p>
                  </div>
                </div>
            </div>
        </section>
        
        <!--HOW IT WORKS-->
        <section class="app-works">
          <div class="container">
                <h2 class="work-text">HOW IT WORKS</h2>
            </div>

            <div class="row">
                  
              <div class="col-md-6" data-aos="zoom-in" data-aos-duration="1500">
                <img class="img-fluid work-logo-img" src="./img/work-logo.svg" alt="clear-audio">
              </div>

              <div class="col-md-6 text" data-aos="zoom-in" data-aos-duration="1500">
                
                <div class="row work-ana">
                  
                  <div class="col-md-6">
                    <img class="img-fluid record-logo-img" src="./img/record.svg" alt="clear-audio">
                    <h2 class="record-text">Record</h2>
                    <p class="record-subtext">Records & syncs your<br> voice in the background<br> while you’re having a<br> conversation.</p>
                  </div>
    
                  <div class="col-md-6 text">
                    <img class="img-fluid transcribe-logo-img" src="./img/transcribe.svg" alt="clear-audio">
                    <h2 class="transcribe-text">Transcribe</h2>
                    <p class="transcribe-subtext">Automatically transcribes<br> your recorded voice to text<br> format.</p>
                  </div>
                </div>

                <div class="row work-ana">
                  
                  <div class="col-md-6 ">
                    <img class="img-fluid analyse-logo-img" src="./img/analyse.svg" alt="clear-audio">
                    <h2 class="analyse-text">Analyse</h2>
                    <p class="analyse-subtext">While transcribing it<br> analyses and fetchs your<br> frequently most-used<br> words.</p>
                  </div>
    
                  <div class="col-md-6 text">
                    <img class="img-fluid data-logo-img" src="./img/data.svg" alt="clear-audio">
                    <h2 class="data-text">Saves Data</h2>
                    <p class="data-subtext">Records & syncs your<br> voice in the background<br> while you’re having a<br> conversation.</p>
                  </div>
                </div>
              </div>
            </div>
        </section>      

        <!--APP GALLERY-->
    
        <section class="gallery-text">
          <div class="container">
            <div class="text-center">
              <h2 class="feature-text">Our App Gallery</h2>
            </div>
          </div>
           
          <div class="container">
            <div class="row ">
            <div class="col-md-4 gallery">
              <div uk-lightbox>
                <a class="uk-inline" href="./img/galleryOne-big.svg" data-caption="Sign Up">
                  <img src="./img/galleryOne-small.svg" alt="">
                </a>  
              </div> 
              </div>

              <div class="col-md-4 gallery">
                <div uk-lightbox>
                  <a class="uk-inline" href="./img/galleryTwo-big.svg" data-caption="Record">
                    <img src="./img/galleryTwo-small.svg" alt="">
                  </a>  
                </div> 
              </div>

              <div class="col-md-4 gallery">
                <div uk-lightbox>
                  <a class="uk-inline" href="./img/galleryThree-big.svg" data-caption="Recordings">
                    <img src="./img/galleryThree-small.svg" alt="">
                  </a>  
                </div> 
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row gallery-app">
                    
              <div class="col-md-4 gallery">

                <div uk-lightbox>
                  <a class="uk-inline" href="./img/galleryFour-big.svg" data-caption="Settings">
                    <img src="./img/galleryFour-small.svg" alt="">
                  </a>  
                </div> 
              </div>

              <div class="col-md-4 gallery">
                <div uk-lightbox>
                  <a class="uk-inline" href="./img/galleryFive-big.svg" data-caption="Words">
                    <img src="./img/galleryFive-small.svg" alt="">
                  </a>  
                </div> 
              </div>

              <div class="col-md-4 gallery">
                <div uk-lightbox>
                  <a class="uk-inline" href="./img/gallerySix-big.svg" data-caption="Ranking">
                    <img src="./img/gallerySix-small" alt="">
                  </a>  
                </div> 
              </div>
            </div>
          </div>  
        </section>  
         <!--FOOTER-->
         <section class="footer">
          <div class="container-fluid">

            <div class="row subscribe-foot">
              <div class="text-center sub-foot">
                  <h2 class="text-white subscribe-text">Subscribe for Beta Access!</h2>
                  <p class="text-white subscribe-paragraph">Be the first to know when this app is up and running</p>
                 
                  <form action="index.php" method="POST">
                      <?php if ($msg != '') : ?>
                        <div style="width: 60%; height: 60px; text-align:center; margin:auto; margin-bottom:30px" class="alert <?php echo $msgClass; ?>">
                          <?php echo $msg ?>
                        </div>
                      <?php endif; ?>  
                        <div class="input-group mb-3 text-center form">
                            <input type="email" class="form-control btn-hover" required name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" placeholder="Your Email">
                            <div class="input-group-append">
                            <button type="submit" class="btn sub-btn" name="submit">Subscribe now</button>
                            </div>
                        </div>
                    </form>  
                </div> 
            </div>


            <div class="row">
              <div class="col-md-6">
                <h3 class="text-white footer-text">WordTracker</h3>
                
                <a href="#"><img class="mx-4 icon" src="./img/instagram.svg" alt="instagram"></a>
                <a href="#"><img class="mr-4 icon" src="./img/twitter.svg" alt="twitter"></a>
              </div>

              <div class="col-md-6 copyright">
                <p class=" text-white copyright-sub">2020 WORD TRACKER INC. ALL RIGHTS RESERVED </p>
              </div>      
            </div>
          </div>            
        </section>             
  
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
   <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script>
  </body> 
 </html>    
