var options = {
    type: 'POST',
    url: '/posts/p_add/',
    beforeSubmit: function() {
        $('#results').html("Adding...");
    },
    success: function(results) {   
        $('#results').html(results);
    } 
}; 

$('form').ajaxForm(options);

/*$('.submit-class').click(function(e){
	  e.preventDefault();
	var inputlength = $('input').val();
	if (inputlength == 0 )
	{
	   $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	   return false;
	
	}
	else {
		$('.form-group').removeClass('has-error');
		$("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	}
});*/

/*$('.submit-class').click(function(){  
	inputVal = $('.required').attr("value");
    if( inputVal == null)  
    {  
       $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
       return false; 
    }
    else {
		$("#input-error").html("<div class='alert alert-success'>New class was added</div>");

	} 

});*/

/*$('.submit-class').click(function(e){  
	$("form :input").each(function(){
	 var input = $(this).val(); // This is the jquery object of the input, do what you will
	 if (input  == 0 ){
	 	input.preppend('<p>no no</p>');
	 }
	});
});*/

/*$('.submit-class').click(function(e){
	var input = $('.required').val().length;
$('input').each(function(){
	 if( input == 0){
	     $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	       return false; 
	  }else{
	    $("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	    $("#input-error").append('<a href="/posts/index">View your classes</a></br><a href="/posts/add">Create class</a>');
	    $('form').hide();
	    return true; 
	  }
});

});*/

/*$('.submit-class').click(function(){
var anyFieldIsEmpty = $("form :input").filter(function() {
        return $.trim(this.value).length === 0;
    }).length > 0;

if (anyFieldIsEmpty) {
    $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	       return false; 
}
else{
	    $("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	    $("#input-error").append('<a href="/posts/index">View your classes</a></br><a href="/posts/add">Create class</a>');
	    $('form').hide();
	    return true; 
	  }


});*/

/*var foo = (function(){

		var input = $('.required').val().length;
	$('input').each(function(){
	 if( input === 0){
	     $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	       return false; 
	  }else{
	    $("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	    $("#input-error").append('<a href="/posts/index">View your classes</a></br><a href="/posts/add">Create class</a>');
	    $('form').hide();
	    return true; 
	  }
});


});*/

/*var foo = (function(){

$('.required').each( function() { 
  id = this.id; // Works fine
  mytext =  $(this).find('input[type=text]').val();  
  
  if( mytext = 0){
	     $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	    	$(this).after('<div> text in input = ' +mytext + '</div>'); 
	  }
});

});*/

/*var foo = (function(){

		var class_name = $('#class-name').val().length;
		var location = $('#location').val().length;
		var description = $('#description').val().length;

	$('input').each(function(){
	 if( input == 0){
	     $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
	       return false; 
	  }else{
	    $("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	    $("#input-error").append('<a href="/posts/index">View your classes</a></br><a href="/posts/add">Create class</a>');
	    $('form').hide();
	    return true; 
	  }
})
*/

var foo = (function(){ 
	
		var course_name = $('#course-name').val().length;
		var location = $('#location').val().length;
		var description = $('#description').val().length;

    if( course_name== 0 || location==0 || description==0)  
    {  
       $("#input-error").html("<div class='alert alert-danger'>Please fill out all fields</div>");
       
       	return false; 

    }
    else {
		$("#input-error").html("<div class='alert alert-success'>New class was added</div>");
	    $("#input-error").append('<a href="/posts/index">Browse all classes</a></br><a href="/posts/add">Create class</a>');
	    $("#input-error").append('<a href="/users/posts">View your classes</a></br><a href="/posts/add">Create class</a>');
	    $('form').hide();

	} 

});


$( ".submit-class" ).on( "click", foo);


