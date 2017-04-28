<?php namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->composeNavigation();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Compose the Navigation Bar
	 */
	private function composeNavigation()
	{
		//For Composing that would require some calculation
		view()->composer('partials._nav', 'App\Http\Composers\NavigationComposer');

		//For Simple View Composing
		/*view()->composer('partials._nav', function ($view) {
			$view->with('latest', Article::latest()->first());
		});*/
	}

}
