<?php
/**
 * Created by PhpStorm.
 * User: Igors
 * Date: 05.09.2014
 * Time: 10:07
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Class ApiViewController
 *
 * @package App\Http\Controllers
 */
class ApiViewController extends Controller
{

	/**
	 * Set up controller filters
	 */
	public function __construct()
	{
		//$this->beforeFilter( 'admin' );
	}

	/**
	 * @param string $url
	 *
	 * @return \Illuminate\View\View
	 */
	public function render( $url )
	{

		\Blade::setEscapedContentTags( '<%%', '%%>' );
		\Blade::setContentTags( '<%', '%>' );

		return view( $url );
	}

} 