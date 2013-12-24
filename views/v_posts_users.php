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


		<?php if(isset($connections[$post['post_id']])): ?>
		<a href='/posts/unfollow/<?=$post['post_id']?>'>Unfollow</a>
	<?php else: ?>
		<a href='/posts/follow/<?=$post['post_id']?>'>Follow</a>
	<?php endif; ?>	
		
		</div>
		
	<?php endforeach; ?>

</div>
	
<!--<?php foreach($posts as $post): ?>

	<?=$user['first_name']?> <?=$user['last_name']?><br>
	<?$post['class_name']?>
	
	<?php if(isset($connections[$post['post_id']])): ?>
		<a href='/posts/unfollow/<?=$user['post_id']?>'>Unfollow</a>
	<?php else: ?>
		<a href='/posts/follow/<?=$post['post_id']?>'>Follow</a>
	<?php endif; ?>	
	
	<br><br>

<?php endforeach ?>-->
