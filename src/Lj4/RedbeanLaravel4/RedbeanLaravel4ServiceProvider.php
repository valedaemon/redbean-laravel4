<?php namespace Lj4\RedbeanLaravel4;

use Illuminate\Support\ServiceProvider, R, Illuminate\Support\Facades as Laravel;

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
		require_once __DIR__ . '/vendor' . '/rb.php';
		//Get DB configs from app/config/database.php
		$db_type = Laravel\Config::get('database.default');
		$connections = Laravel\Config::get('database.connections');
		$db_host = $connections[$default]['host'];
		$db_user = $connections[$default]['username']; 
		$db_pass = $connections[$default]['password'];
		$db_name = $connections[$default]['database'];

		//Run the R::setup command based on db_type
		if ($db_type != 'sqlite') {
			R::setup("'".$db_type.":host=."$db_host.";dbname=".$db_name."','".$db_user."','".$db_pass."'");
		} else {
			R::setup("'".$db_type.":".$db_name."','".$db_user."','".$db_pass."'");
		}
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