<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- JS/CSS File we want on every page -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>	
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>					
										
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="/css/journal-theme.css" type="text/css">
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
		
</head>

<body>	

	<div id='navbar-main' class='navbar navbar-inverse'>
		<ul class='nav navbar-nav'>
				
				
			<?php if($user): ?>
				<li><a href='/users/profile'>Home</a></li>
				<li><a href='/posts/add'>Add Class</a></li>
				<li><a href='/posts/'>Browse Classes</a></li>
				<li><a href='/users/myposts'>My classes</a></li>
				<li><a href='/posts/users'>Follow Users</a></li>
				<li><a href='/users/logout'>Logout</a></li>
			<?php else: ?>
				<li><a href='/'>Home</a></li>
				<li><a href='/users/signup'>Sign Up</a></li>
				<li><a href='/users/login'>Log In</a></li>
			<?php endif; ?>
		<ul>
	</div>

	<div class='container'>
	
		<?php if($user): ?>
			You are logged in as <?=$user->first_name?> <?=$user->last_name?><br>
		<?php endif; ?>
		
		<br><br>
		
		<?php if(isset($content)) echo $content; ?>

		<?php if(isset($client_files_body)) echo $client_files_body; ?>
    </div>

</body>
</html>