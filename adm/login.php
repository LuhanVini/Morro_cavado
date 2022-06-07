
<HTML>
<HEAD>
	<TITLE>Sistema de chamado :: Login</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css" />
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.timepicker.js"></script>

</HEAD>
<BODY>



<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
-->
<div class="container">
<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
	<div class="card card-container">
		<img id="profile-img" class="profile-img-card" src="user-1.png" />
		<p id="profile-name" class="profile-name-card"></p>
		<form class="form-signin" action="login_vai.php" method="post">
			<input type="text" name="login" id="inputEmail" class="form-control" placeholder="User" required autofocus>
			<input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required>
			<!--<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar!</button>-->
			<button class="btn btn btn-primary" type="submit">Entrar!</button>

		</form><!-- /form -->
	</div><!-- /card-container --> 
</div>


  
	
</BODY></HTML>