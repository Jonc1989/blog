<?php

return [

	/**
	 * Default path of repositories in `app` folder.
	 * In this case:
	 * 		app/Repositories
	 */
	'path' => 'Modules',

	/**
	 * Default path of models in larave is the `app` folder.
	 * In this case:
	 * 		app/
	 */
	'model_path' => 'Modules',

	/**
	 * Configure the naming convention you wish for your repositories.
	 *
	 * Example: php artisan make:repository Users 
	 * 		- Contract: UsersRepository
	 * 		- Eloquent: EloquentUsersRepository
	 */
	'fileNames' => [

		'contract' => '{name}RepositoryInterface',

		'eloquent' => '{name}Repository',
		
	],

];