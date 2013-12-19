<?php if($user): ?>
	Hello <?=$user->first_name;?>
<?php else: ?>

	<div class='jumbotron'>
				<div>
					<h3>Welcome to Wonder Skill, a directory of hands on classes for kids. Please log in if you already have registered. If not, create a new account.</h3>
				</div>
				<li><a class='btn btn-primary btn-lg' href='/users/signup'>Sign Up</a></li>
			    <li><a class='btn btn-primary btn-lg' href='/users/login'>Log In</a></li>
			</div>
<?php endif; ?>

