<div>
		<h4>If you are new to Wonder Skill and would like to create/attend a class please <a href='/users/signup'>Sign Up</a> or  <a href='/users/login'>Log In</a> if you already have account. </h4>

</div>
<div class='well'>
	<?php foreach($posts as $post): ?>
		<div id='course-box' >
		<div id='course-thumb'>
			<img  src="/uploads/image.png">
		</div>
		
		<h3 id='class-name'><?=nl2br($post['class_name'])?></h3>
		<label>Location</label><br><?=nl2br($post['location'])?><br>
		<label>Description</label><br><?=nl2br($post['content'])?><br>
		<label>Teacher</label><br><?=$post['first_name']?><br>
		
		</div>
		
	<?php endforeach; ?>

</div>
	