<?php

class posts_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 
	
	 
	/*-------------------------------------------------------------------------------------------------
	Display a new post form
	-------------------------------------------------------------------------------------------------*/
	public function add() {
		
		$this->template->content = View::instance("v_posts_add");
		
		$client_files_body = Array(
			'/js/jquery.form.js',
			'/js/posts_add.js'
		);
		
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		echo $this->template;
		
	}	
	
	
	/*-------------------------------------------------------------------------------------------------
	Process new posts
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		
		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		DB::instance(DB_NAME)->insert('posts',$_POST);
		
		//$view = new View('v_posts_p_add');
		
		//$view->created = Time::display(Time::now());
		
		echo $view;
						
				
	}

	/*-------------------------------------------------------------------------------------------------
	Add thunbnail
	-------------------------------------------------------------------------------------------------*/

	 public function thumb_update() {
        # if user specified a new image file, upload it
        if ($_FILES['avatar']['error'] == 0)
        {
            # upload an image
            $image = Upload::upload($_FILES, "/uploads/", array("JPG", "JPEG", "jpg", "jpeg", "gif", "GIF", "png", "PNG"), $this->user->post_id);

            if($image == 'Invalid file type.') {
                # return an error
                Router::redirect("/users/posts/add/error"); 
            }
            else {
                # process the upload
                $data = Array("image" => $image);
                DB::instance(DB_NAME)->update("posts", $data, "WHERE post_id = ".$this->post_id);

            }
        }
        else
        {
            # return an error
             Router::redirect("/users/posts/add/error");  
        }

        # Redirect back to the profile page
        router::redirect('/users/add/posts'); 
    } 
	

	/*-------------------------------------------------------------------------------------------------
	View all posts
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Set up view
		$this->template->content = View::instance('v_posts_index');


		$q = 'SELECT *
				FROM posts
				INNER JOIN users 
				    ON posts.user_id = users.user_id';
		# Set up query
		/*$q = 'SELECT 
			    posts.content,
			    posts.created,
			    posts.user_id AS post_user_id,
			    users_users.user_id AS follower_id,
			    users.first_name,
			    users.last_name
			FROM posts
			INNER JOIN users_users 
			    ON posts.user_id = users_users.user_id_followed
			INNER JOIN users 
			    ON posts.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;*/
		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
		
	}

	public function myclass() {
		
		# Set up view
		$this->template->content = View::instance('v_posts_myclass');


		/*$q = 'SELECT *
				FROM posts
				INNER JOIN users 
				    ON posts.user_id = users.user_id';*/
		# Set up query
		$q = 'SELECT 
		posts.class_name, 
		posts.content, posts.created, 
		posts.location, 
		posts.post_id AS post_post_id, 
		users_posts.user_id ASfollower_id, 
		users.first_name, users.last_name
		FROM posts
		INNER JOIN users_posts ON posts.post_id = users_posts.post_id_followed
		INNER JOIN users ON posts.user_id = users.user_id
		WHERE users_posts.user_id ='.$this->user->user_id;

		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
		
	}



	
	/*-------------------------------------------------------------------------------------------------
	Delete post
	-------------------------------------------------------------------------------------------------*/
	public function delete($post_id) {
        	

        	$client_files_body = Array(
			'/js/delete_post.js'
		);
            # Set up the where condition
            $where_condition = 'WHERE post_id = '.$post_id;
            
            # Run the delete
            DB::instance(DB_NAME)->delete('posts', $where_condition);

                
            Router::redirect('/users/myposts');
        

                
        }
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function users() {
		
		# Set up view
		$this->template->content = View::instance("v_posts_users");
		
		# Set up query to get all posts
		$q = 'SELECT *
			FROM posts
			INNER JOIN users 
				    ON posts.user_id = users.user_id';
			
		# Run query
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Set up query to get all connections from users_posts table
		$q = 'SELECT *
			FROM users_posts
			WHERE user_id = '.$this->user->user_id;
			
		# Run query
		$connections = DB::instance(DB_NAME)->select_array($q,'post_id_followed');
		
		# Pass data to the view
		$this->template->content->posts       = $posts;
		$this->template->content->connections = $connections;
		
		# Render view
		echo $this->template;
		
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Creates a row in the users_users table representing that one user is following another
	-------------------------------------------------------------------------------------------------*/
	public function follow($post_id_followed) {
	
	    # Prepare the data array to be inserted
	    $data = Array(
	        "created"          => Time::now(),
	        "user_id"          => $this->user->user_id,
	        "post_id_followed" => $post_id_followed
	        );
	
	    # Do the insert
	    DB::instance(DB_NAME)->insert('users_posts', $data);
	
	    # Send them back
	    Router::redirect("/posts/users");
	
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Removes the specified row in the users_users table, removing the follow between two users
	-------------------------------------------------------------------------------------------------*/
	public function unfollow($post_id_followed) {
	
	    # Set up the where condition
	    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND post_id_followed = '.$post_id_followed;
	    
	    # Run the delete
	    DB::instance(DB_NAME)->delete('users_posts', $where_condition);
	
	    # Send them back
	    Router::redirect("/posts/users");
	
	}


	
	
	
} # eoc
