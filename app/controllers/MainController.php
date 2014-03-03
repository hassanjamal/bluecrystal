<?php

class MainController extends BaseController {

    /**
     * Post Model
     * @var Post
     */
    // protected $post;

    /**
     * User Model
     * @var User
     */
    // protected $user;

    /**
     * Inject the models.
     * @param Post $post
     * @param User $user
     */
    
    
	/**
	 * Returns all the blog posts.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get all the blog posts
		// $posts = $this->post->orderBy('created_at', 'DESC')->paginate(10);

		// Show the page
		return View::make('site/index');
		// return View::make('site/blog/index', compact('posts'));
	}
     public function getAbout()
     {
         return View::make('site/about');
     }

}

