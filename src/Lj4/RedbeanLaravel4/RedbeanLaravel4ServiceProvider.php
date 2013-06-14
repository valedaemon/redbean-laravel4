<?php namespace Lj4\RedbeanLaravel4;

use Illuminate\Support\ServiceProvider, Redbean\R, Illuminate\Support\Facades as Laravel, Illuminate\Support\Facades\Log as Log;

class RedbeanLaravel4ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('lj4/redbean-laravel4');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//Get DB configs from app/config/database.php
		$default = Laravel\Config::get('database.default');
		$connections = Laravel\Config::get('database.connections');
		$db_host = $connections[$default]['host'];
		$db_user = $connections[$default]['username']; 
		$db_pass = $connections[$default]['password'];
		$db_name = $connections[$default]['database'];
		$db_driver = $connections[$default]['driver'];

		//Run the R::setup command based on db_type
		if ($default != 'sqlite') {
			$conn_string = $db_driver.':host='.$db_host.';dbname='.$db_name;
		} else {
			$conn_string = $db_driver.':'.$db_name;
		}
		R::setup($conn_string, $db_user, $db_pass);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
