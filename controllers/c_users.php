<?php
class users_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function __construct() {
    
    	# Make sure the base controller construct gets called
		parent::__construct();
    } 


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can sign up	
	-------------------------------------------------------------------------------------------------*/
    public function signup() {
       
       # Set up the view
       $this->template->content = View::instance('v_users_signup');
       
       # Render the view
       echo $this->template;
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the sign up form
    -------------------------------------------------------------------------------------------------*/
    public function p_signup() {
	    	
    	#Sanitize _POST
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

	    # Mark the time
	    $_POST['created']  = Time::now();
	    
        #Check to make sure all form values are filled in.
	     foreach($_POST as $key => $value){ 
	          if((!isSet($value)) || (!$value) || ($value = "")) { 
	                Router::redirect('/users/signup/?partial-registration');
	         } 
	     }  

	    #Query DB for email 
	    $q = "SELECT * FROM users WHERE email = '".$_POST['email']."'";

	    $exsitingUsers = DB::instance(DB_NAME)->select_rows($q);

	    if(!empty($exsitingUsers)){

	    	Router::redirect('/users/login/?user-exists');
	    }
	    else {
	    # Hash password
	    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

	    # Create a hashed token
	    $_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
	    
	    # Insert the new user    
	    DB::instance(DB_NAME)->insert_row('users', $_POST);
	    
	    # Send them to the login page
	    Router::redirect('/users/login/?success');

	    }

    }


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can login
	-------------------------------------------------------------------------------------------------*/
    public function login() {
    
    	$this->template->content = View::instance('v_users_login');    	
    	echo $this->template;   
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the login form
    -------------------------------------------------------------------------------------------------*/
    public function p_login() {
	   	   
	   	# Hash the password they entered so we can compare it with the ones in the database
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Set up the query to see if there's a matching email/password in the DB
		$q = 
			'SELECT token 
			FROM users
			WHERE email = "'.$_POST['email'].'"
			AND password = "'.$_POST['password'].'"';
				
		# If there was, this will return the token	   
		$token = DB::instance(DB_NAME)->select_field($q);
		
		# Success
		if($token) {
		
			# Don't echo anything to the page before setting this cookie!
			setcookie('token',$token, strtotime('+1 year'), '/');
			
			# Send them to the homepage
			Router::redirect('/users/profile/');
		}
		# Fail
		else {
			//echo "Login failed! <a href='/users/login'>Try again?</a>";
			Router::redirect('/users/login/?fail');
		}
	   
    }


	/*-------------------------------------------------------------------------------------------------
	No view needed here, they just goto /users/logout, it logs them out and sends them
	back to the homepage.	
	-------------------------------------------------------------------------------------------------*/
    public function logout() {
       
       # Generate a new token they'll use next time they login
       $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       
       # Update their row in the DB with the new token
       $data = Array(
       	'token' => $new_token
       );
       DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);
       
       # Delete their old token cookie by expiring it
       setcookie('token', '', strtotime('-1 year'), '/');
       
       # Send them back to the homepage
       Router::redirect('/');
       
    }

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function profile($user_name = NULL) {
		
		# Only logged in users are allowed...
		if(!$this->user) {
			die('Members only. <a href="/users/login">Login</a>');
		}
		
		# Set up the View
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile";
				
		# Pass the data to the View
		$this->template->content->user_name = $user_name;
		
		# Display the view
		echo $this->template;
				
    }


	public function myposts() {

		if(!$this->user) {
			die('Members only. <a href="/users/login">Login</a>');
		}
		
		# Set up view
		$this->template->content = View::instance('v_users_posts');

		$q = 'SELECT *
				FROM posts
				WHERE user_id = '.$this->user->user_id;

		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
	}
	/*-------------------------------------------------------------------------------------------------
	Upload user image	
	-------------------------------------------------------------------------------------------------*/
  
    /*public function profile_update() {
        # if user specified a new image file, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            # upload an image
            $image = Upload::upload($_FILES, "/uploads/avatars/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->user_id);

            if($image == 'Invalid file type.') {
                # return an error
                Router::redirect("/users/profile/error"); 
            }
            else {
                # process the upload
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

                # resize the image
                $imgObj = new Image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars/' . $image);
                $imgObj->resize(50,50);
                $imgObj->save_image($_SERVER["DOCUMENT_ROOT"] . '/uploads/avatars' . $image);

            }
        }
        else
        {
            # return an error
            Router::redirect("/users/profile/error");  
        }

        # Redirect back to the profile page
        router::redirect('/users/profile'); 
    } 
	*/


} # end of the class





