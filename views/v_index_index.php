<?php if($user): ?>
	Hello <?=$user->first_name;?>
<?php else: ?>

	<div class='jumbotron'>
		<div>
			<h3>Welcome to Wonder Skill, a directory of hands on classes for kids.</h3>
			<li><a class='btn btn-info btn-block' href='/stream/index'><h3>Browse Classes</h3></a></li>
			<h4>If you are new to Wonder Skill and would like to create/attend a class please sign up  or login if you already have registered. </h4>
		</div>
		<a class='btn btn-default btn-sm' href='/users/signup'>Sign Up</a>
	    <a class='btn btn-default btn-sm' href='/users/login'>Log In</a>

	</div>
<?php endif; ?>

