<?php
	if(isset($_SESSION['loginemail'])){
		$email=$_SESSION['loginemail'];
	}
	if(isset($_SESSION['email'])){
		$email=$_SESSION['email'];
	}
	 $MailObj->sendEmail($email);
	  //echo "<pre>";
	  //print_r($_SESSION);
	  //echo "</pre>";

?>
<div class="container response">
	<div class="">
		<div class="completed center animate">
			<div class="icon">
				<span class=""><i class="fas fa-check"></i></span>
			</div>
			<h1>Success!</h1>
			<p>We've sent a summary about your reservation in email.</p>
			<a href="<?php echo $baseUrl?>/" class="redo btn">Back to the main page</a>
		</div>
	</div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>