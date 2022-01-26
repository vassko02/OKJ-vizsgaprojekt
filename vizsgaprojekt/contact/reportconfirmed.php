<?php

	$MailObj->sendReport($_POST['email']);
	$MailObj->reportous($_POST['name'],$_POST['email'],$_POST['type'],$_POST['message']);
	//$MailObj->sendEmail($_POST['email']);
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

?>
<div class="container response">
	<div class="">
		<div class="completed center animate">
			<div class="icon">
				<span class=""><i class="fas fa-check"></i></span>
			</div>
			<h1>Success!</h1>
			<p>Thank you for your message, we will reply as soon as possible!</p>
			<a href="<?php echo $baseUrl?>/" class="redo btn">Back to the main page</a>
		</div>
	</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>