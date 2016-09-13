<?php

namespace App\Modules\Comments\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use App\Modules\Comments\Events\CommentCreated;
use Illuminate\Http\Request;
use App\Modules\Comments\Repositories\CommentsRepositoryInterface;
use Illuminate\Support\Facades\Input;
class CommentController extends ApiController
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct( CommentsRepositoryInterface $comments )
	{
		$this->comments = $comments;
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if( Input::get( 'postId' ) && Input::get( 'type' ) ){
			$post_id = Input::get( 'postId' );
			$type = Input::get( 'type' );
			
			return $this->respondData( $this->comments->allComments( $post_id, $type ) );
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = $this->comments->create([
			'user_id'       => $request->get( 'userId' ),
			'post_id'       => $request->get( 'postId' ),
			'type'          => $request->get( 'type' ),
			'text'          => $request->get( 'comment' )
		]);
		
		$response = $this->respondCreated( null, $data );
		
		event( new CommentCreated( [
			'postId'    => $request->get( 'postId' ),
			'type'      => $request->get( 'type' ) 
		]));
		
		return $response;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

}
