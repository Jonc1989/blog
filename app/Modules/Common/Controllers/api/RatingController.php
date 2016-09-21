<?php

namespace App\Modules\Common\Controllers\api;

use App\Http\Controllers\ApiController;
use App\Http\Requests;
use App\Modules\Common\Repositories\RatingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class RatingController extends ApiController
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct( RatingRepositoryInterface $ratings )
	{
		$this->ratings = $ratings;
	}

	/**
	 * @param Request $request
	 */
	public function rate(Request $request)
	{

		return $this->respondData( $this->ratings->rate( $request->all() ));
	}

}
