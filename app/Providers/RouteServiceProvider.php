<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		//

		parent::boot($router);

		//If Needed To perform conditional logic using
		//Route Binding
		/*$router->bind('articles', function(){
			return \App\Article::published()->findOrFail($id);
		});*/

		//Route Binding of Articles Wildcard
		//$router->model('articles', 'App\Article');

		$router->bind('articles', function($id){
			return \App\Article::published()->findOrFail($id);
		});

		//Will bind model for the given id
//		$router->model('tags', 'App\Tag');

		//will bind model for the given name
		$router->bind('tags', function($name){
			return \App\Article::where('name', $name)->findOrFail($id);
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
