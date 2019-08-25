<?php

		//Alert Vars
		$msg = '';
		$msgClass = '';

		//check for submit
		if(filter_has_var(INPUT_POST, 'submit')){
			$name = htmlspecialchars($_POST['name']);
			$email = htmlspecialchars($_POST['email']);
			$website = htmlspecialchars($_POST['website']);
			$message = htmlspecialchars($_POST['message']);

			//check reqd fields
			if(!empty($name) && !empty($email)){
				//pass
				//Check Email
				if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
					//FAIL
					$msg = 'Please use a valid email';
					$msgClass = 'alert-danger';					

				}else{
					//PASS
					$toEmail = 'shawnabrookes@gmail.com';
					$subject = 'DarkHorse Query from: ' .$name;
					$body = '<h2>Contact Request</h2>
							 <h4>Name: </h4> <p>'.$name.'</p>
							 <h4>Email: <p>'.$email.'</p></h4>
							 <h4>Website: <p>'.$website.'</p></h4>
							 <h4>Message: </h4><p>'.$message.'</p>';

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .="Content-type: text/html; charset=iso-8859-1" . "\r\n";

					$headers .= "From: " .$name. "<".$email.">". "\r\n";
					"Reply-To: " .$name. "\r\n" .
					"X-Mailer: PHP/" . phpversion();

					if(mail($toEmail, $subject, $body, $headers)){
						$msg = 'Your Email has been sent.';
						$msgClass = 'alert-success';
					}else{
						$msg = 'Oops, There was a problem...';
						$msgClass = 'alert-danger';						
					}
				}


			}else{
			//fail
			$msg = 'Please fill in required fields';
			$msgClass = 'alert-danger';

			}

		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CONTACT</title>
	<script src="http://www.darkhorsedp.com/DarkHorse/jQuery3_1.js"></script>
	<link rel="stylesheet" href="http://www.darkhorsedp.com/DarkHorse/bootstrap_4_1_1_dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="http://www.darkhorsedp.com/DarkHorse/index.css"/>
  <link rel="stylesheet" href="http://www.darkhorsedp.com/DarkHorse/CONTACT.css"/>
	<script src="http://www.darkhorsedp.com/DarkHorse/bootstrap_4_1_1_dist/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-uhut8PejFZO8994oEgm/ZfAv0mW1/b83nczZzSwElbeILxwkN491YQXsCFTE6+nx" crossorigin="anonymous">
	<meta charset="UTF-8">

</head>

<body style="background-color: black;">
<div class="row align-items-center justify-content-center"><!--NAV BAR CENTER-->

<nav class="navbar navbar-expand-lg navbar-light bg-black">
  <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-white" id="navbarNavDropdown">
    <ul class="navbar-nav text-white">

      <li class="nav-item active navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/index.html">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/DEVELOPMENT.html">Development</a>
      </li>

      <li class="nav-item navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/DESIGN.html">Digital Design</a>
      </li>

      <li class="nav-item navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/WRITING.html">Professional Writing</a>
      </li>

      <li class="nav-item navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/ABOUT.html">About</a>
      </li>

       <li class="nav-item navText">
        <a class="nav-link text-white" href="http://www.darkhorsedp.com/contactForm.php">Contact</a>
      </li>

    </ul>
  </div>
</nav>

<div class="container-fluid">

    <div class="row">

      <div class="col" style="background-color:#050505; height:.5em;" >

      </div>

    </div>
 </div>

<div class="container-fluid mb-4">
	
	<div class="row align-items-center justify-content-center">
	    
	    <h1 class="text-center col-lg-8 col-md-8 col-sm-8 col-sm-8" style="color:white;"><u>Contact</u></h1>

	</div>

</div>

<div class="container-fluid mb-4">	

	<div class="row align-items-center justify-content-center">

			<?php if($msg != ''): ?>

			 <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>

			 <?php endif; ?>

	</div>

</div>

<div class="container-fluid mb-4">

	<div class="row justify-content-center">

			<form style="width:60%" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

				<div class="form-group">	

					<label style="color:white;">Name: <span style="color:red;">*Required</span></label>
					<input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">

				</div>

				<div class="form-group">	

					<label style="color:white;">Email <span style="color:red;">*Required</span></label>
					<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">

				</div>

				<div class="form-group">	

					<label style="color:white;">Website/ Web App Address</label>
					<input type="text" name="website" class="form-control" value="<?php echo isset($_POST['website']) ? $website : ''; ?>">

				</div>

				<div class="form-group">	

					<label style="color:white;">What service(s) do you need?</label>
					<textarea name="message" class="form-control" value="" rows="6"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>

				</div>	

				<br>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>	

			</form>


	</div>

</div>


<div class="container-fluid">

    <div class="row">

      <div class="col" style="background-color:#050505; height:.5em;" >

      </div>

    </div>
 </div>

<div class="container-fluid">

    <div class="row">

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background-color:black;">
       <a target="_blank" href="https://www.linkedin.com/company/darkhorsedigitalperformance/"><img src="DarkHorse/Images/xlinkedin.png" alt="" class="img-thumbnail img-fluid" style="background-color:black; border:none;"></a>
       <a target="_blank" href="https://www.facebook.com/DarkHorseDigitalPerformance/"><img src="DarkHorse/Images/xfacebook.png" alt="" class="img-thumbnail img-fluid" style="background-color:black; border:none;"></a>
       <a target="_blank" href="https://twitter.com/DarkHorseDP"><img src="DarkHorse/Images/xtwitter.png" alt="" class="img-thumbnail img-fluid" style="background-color:black; border:none;"></a>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
        <br />
        <p class="text-center ">DarkHorseDigitalPerformance@gmail.com</p>
        <p class="text-center ">© DarkHorse Digital Performance <a target="_blank" href="https://en.wikipedia.org/wiki/Roman_numerals"> MMXVIII</a></p>
        <p class="text-center ">DHP LLC</p>       
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" >
       <img src="DarkHorse/Images/DHBottomIcon.png" alt="" class="img-fluid img-thumbnail mx-auto d-block" style="height:6em; background-color:black; border:none;">
      </div>

    </div>

</div>

<script src="DarkHorse/index.js"></script>



	
</body>

</html>