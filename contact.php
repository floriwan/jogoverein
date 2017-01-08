
<?php

$post_request = false;

$name = "Name";
$email_address = "Email";
$subject = "Subject";
$message = "Nachricht";


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $post_request = true;
    
	$errors = '';
	//$myemail = 'nospam@goeldenitz.org';
	$myemail = 'verein@goeldenitz.org, nospam@goeldenitz.org';
	
	if(empty($_POST['name'])  || empty($_POST['email']) || empty($_POST['message'])) {
		$errors .= "\n Error: all fields are required!";
	}
	
	$x = $_POST['x'];
	$y = $_POST['y'];
	$result = $_POST['result'];
	if (!empty($_POST['name'])) $name = $_POST['name'];
	if (!empty($_POST['email'])) $email_address = $_POST['email'];
	if (!empty($_POST['message'])) $message = $_POST['message'];
	if (!empty($_POST['subject'])) $subject = $_POST['subject'];
	
	if ($x + $y != $result) {
        $errors .= "\n Error: result of the addition is wrong!";
	}
	
	if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email_address)) {
		$errors .= "\n Error: invalid email address";
	}
	
	if( empty($errors)) {
		$to = $myemail;
		$email_subject = "jogoverein contact form : $name - $subject";
		$email_body = "You have received a new message. ".
		" Here are the details:\n Name: $name \n ".
		"Email: $email_address\n Message \n $message";
		$headers = "From: $myemail\n";
		$headers .= "Reply-To: $email_address";
		mail($to,$email_subject,$email_body,$headers);
		
		//redirect to the 'thank you' page
		//header('Location: index.html');
	} 
		
}

$x = rand(1, 5);
$y = rand(1, 5);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
	<head>
		<title>Kontakt - JoGoVEREIN</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

            <?php include ("language_selection.php"); ?>
            <?php include ("header.".$GLOBALS['lang'].".php"); ?>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Kontakt</h2>
						<p>Wenn ich Sie &uuml;ber Neuerungen informieren soll, nutzen Sie bitte das Kontakt Formular.</br>
						Ich trage Sie dann in meinen email Verteiler ein.</p>
					</header>
					<div class="box">
					
						<p> 
							<?php 
                                if ($post_request) {
                                    if (empty($errors)) 
										echo "Email erfolgreich versendet";
									else
										echo "Email konnte nicht versendet werden (". $errors .")";
                                }
							?> 
						</p>
						
						<form method="post" action="">
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<input type="text" name="name" value="" placeholder="<?php echo $name; ?>" />
								</div>
								<div class="6u 12u(mobilep)">
									<input type="email" name="email" value="" placeholder="<?php echo $email_address; ?>" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="text" name="subject" value="" placeholder="<?php echo $subject; ?>" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<textarea name="message" placeholder="<?php echo $message; ?>" rows="6"></textarea>
								</div>
							</div>
							<div class="row uniform 50%">
                                <div class="12u">
                                    <?php echo $x . " + " . $y . " = "; ?><input type="text" name="result" value="" placeholder="" />
                                    <input type="hidden" name="x" value="<?php echo $x; ?>">
                                    <input type="hidden" name="y" value="<?php echo $y; ?>">
                                </div>
							</div>
							<div class="row uniform">
								<div class="12u">
									<ul class="actions align-center">
										<li><input type="submit" value="Nachricht senden" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
					
					<table><tr>
					<td>Dipl.-Ing Joachim G&ouml;ldenitz</br>
						Nibelungenstra&szlig;e 22</br>
						64625 Bensheim</br>
						E-Mail: verein@goeldenitz.org
					</td>
					<td>Konto: 285491606</br>
						BLZ: 50010060 Postbank Ffm</br>
						IBAN: DE67 50010060 0285491606</br>
						BIC: PBNKDEFF	
					</td>
				</tr></table>


			</section>
				
			<!-- Footer -->
				<?php include ("footer.html"); ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>

</html>
