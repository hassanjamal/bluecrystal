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
     /* public getAbout() {{{ */ 
     /**
      * getAbout
      * 
      * @access public
      * @return void
      */
     public function getAbout()
     {
         return View::make('site/about');
     }
     /* }}} */

     /* public getSchemes() {{{ */ 
     /**
      * getSchemes
      * 
      * @access public
      * @return void
      */
     public function getSchemes()
     {
         return View::make('site/schemes');
     }
     /* }}} */


     /* public getBranches() {{{ */ 
     /**
      * getBranches
      * 
      * @access public
      * @return void
      */
     public function getBranches()
     {
         return View::make('site/branches');
     }
     /* }}} */


     /* public getLoans() {{{ */ 
     /**
      * getLoans
      * 
      * @access public
      * @return void
      */
     public function getLoans()
     {
         return View::make('site/loans');
     }
     /* }}} */


     /* public getCareer() {{{ */ 
     /**
      * getCareer
      * 
      * @access public
      * @return void
      */
     public function getCareer()
     {
         return View::make('site/career');
     }
     /* }}} */

     /* public getMedia() {{{ */ 
     /**
      * getMedia
      * 
      * @access public
      * @return void
      */
     public function getMedia()
     {
         return View::make('site/media');
     }
     /* }}} */


     
     /* public getFaq() {{{ */ 
     /**
      * getFaq
      * 
      * @access public
      * @return void
      */
     public function getFaq()
     {
         return View::make('site/faq');
     }
     /* }}} */

}

