<?php namespace App\Modules\Comments;

use App\Providers\ModuleServiceProvider;

/**
 * Class ClientsServiceProvider
 *
 * @package App\Modules\Admin\Clients
 */
class CommentsServiceProvider extends ModuleServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Reģistrējam moduļa vārdvietas, maršrutētāju, notikumu klausītāju un izšaujam moduļa palaisšanas notikumu
		$this->bootModule(__DIR__, 'comments');

		$this->app->bind('App\Modules\Comments\Repositories\CommentsRepositoryInterface',
			'App\Modules\Comments\Repositories\CommentsRepository');

		$this->app->bind('App\Modules\Comments\Repositories\CommentsRepositoryInterface',
			'App\Modules\Comments\Repositories\CommentsRepository');
	}
}