<?php if(isset($_GET['user-exists'])): ?>
<div class="alert alert-danger fade in">
        <i class="icon-warning-sign">Someone already uses this email address. Please login or <a href="/users/signup">SIGN UP</a> with differen email. 
</div>
<?php endif; ?>

<?php if(isset($_GET['success'])): ?>
<div class="alert alert-success fade in">
        <i class="icon-warning-sign">Your registration was successful. Please login.
</div>
<?php endif; ?>

<?php if(isset($_GET['fail'])): ?>
<div class="alert alert-danger fade in">
        <i class="icon-warning-sign">Login failed. Email or password are incorrect.
</div>
<?php endif; ?>

<div class="well">
			
		<form action='/users/p_login' method="POST" id="login" class='bs-example form-horizontal' role='form' >
		<fieldset>
			<legend>Log In</legend>
				<div class="form-group">
					<label for="email"><span class="required">Email address</span></label>
					<input id="email" name="email" class="text required email form-control" type="text" />
				</div>
				
				<div class="form-group">
					<label for="password"><span class="required">Password</span></label>
					<input name="password" type="password" class="text required form-control" id="password" minlength="4" maxlength="20" />
				</li>

		</fieldset>
		
		<fieldset class="submit">
			<button type='Submit' class="btn btn-primary">Log in</button>

		</fieldset>
		
		<div class="clear"></div>
	</form>
			
	</div>