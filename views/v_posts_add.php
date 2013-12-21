<div class='well'>
	<span id='input-error'></span>
<form id="commentForm" class="cmxform bs-example form-horizontal" method='post'>
	<fieldset>
		<legend>Create class</legend>
		<span>all required fields are marked with *</span>
		<div class="form-group">
			<label for="class_name"><span>Class name *</span></label></br>
			<input name="class_name" id="course-name" type="text" class="text required form-control"/>
			<span class="empty-input"></span>		
		</div>

		<div class="form-group">
			<label for="location"><span class="required">Location *</span></label></br>
			<input name="location"id='location' type="text" class="text required form-control"/>
			<span class="empty-input"></span>			
		</div>

		<div class="form-group">
			<label for="content"><span class="required">Description *</span></label></br>
		 	<textarea name='content' id='description' class="form-control"></textarea>
		 	<span class="empty-input"></span>	
		</div>
		
		<button type='Submit' class="btn btn-primary submit-class" >Add class</button>
	</fieldset>
</form>
</div>

<div id='results'></div>