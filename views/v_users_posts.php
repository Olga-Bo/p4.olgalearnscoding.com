<div class='well'>
	<?php foreach($posts as $post): ?>
		<div id='course-box' >
		<div id='course-thumb'>
			<img  src="/uploads/image.png">
		</div>
		
		<h3 id='class-name'><?=nl2br($post['class_name'])?></h3>
		<label>Location</label><br><?=nl2br($post['location'])?><br>
		<label>Description</label><br><?=nl2br($post['content'])?><br>
		<a href="/posts/delete/<?=$post['post_id']?>/"><span class='label label-default'>Delete Class</span></a>
		
	<?php endforeach; ?>



</div>