<?php if(isset($_GET['partial-registration'])): ?>
<div class="alert alert-danger fade in">
        <strong><i class="icon-warning-sign"></i>We are unable to process your registration!</strong>  Please enter in all the appropriate information to continue. 
</div>
<?php endif; ?>





<div class='well'>
	<form class="bs-example form-horizontal" id="signupForm" method='POST' action='/users/p_signup' role='form'>
		<fieldset>
			<legend>Sign Up</legend>
			<div>
				<label for="first_name">Firstname</label>
				<input id="first_name" name="first_name" type="text" class='form-control'/>
			</div>
			<div>
				<label for="last_name">Lastname</label>
				<input id="last_name" name="last_name" type="text" class='form-control'/>
			</div>
			<div>
				<label for="email">Email</label>
				<input id="email" name="email" type="email" class='form-control'/>
			</div>
			<div>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" class='form-control'/>
			</div>


		</fieldset></br>
		
		<button type='Submit' class="btn btn-primary">Sign up</button>

	</form>

</div>
