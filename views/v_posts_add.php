<div class='well'>
<form class="bs-example form-horizontal" method='post'>
	<fieldset>
		<legend>Create class</legend>
		<div class="form-group">
			<label for="class_name"><span class="required ">Class name</span></label></br>
			<input name="class_name" type="text" class="text required form-control" />		
		</div>

		<div class="form-group">
			<label for="location"><span class="required">Location</span></label></br>
			<input name="location" type="text" class="text required form-control"/>		
		</div>

		<div class="form-group">
			<label for="content"><span class="required">Description</span></label></br>
		 	<textarea name='content' class="form-control"></textarea>
		</div>
		
		<button type='Submit' class="btn btn-primary">Add class</button>
	</fieldset>
</form>
</div>

<div id='results'></div>