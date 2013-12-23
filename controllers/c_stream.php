<?php

class stream_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		
	} 

	public function index() {
		
		# Set up view
		$this->template->content = View::instance('v_stream_index');


		$q = 'SELECT *
				FROM posts
				INNER JOIN users 
				    ON posts.user_id = users.user_id';
		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
		
	}


	}