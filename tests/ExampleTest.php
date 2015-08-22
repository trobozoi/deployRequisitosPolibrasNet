<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')->see('Laravel 5');
		
		$response = $this->call('GET', 'application/index');
		$response = $this->call('GET', 'application/create');
		$response = $this->call('GET', 'application/show');
		$response = $this->call('GET', 'application/edit');
		
		$response = $this->call('GET', 'version/index');
		$response = $this->call('GET', 'version/create');
		$response = $this->call('GET', 'version/show');
		$response = $this->call('GET', 'version/edit');
		
		$response = $this->call('GET', 'file/index');
		$response = $this->call('GET', 'file/create');
		$response = $this->call('GET', 'file/show');
		$response = $this->call('GET', 'file/edit');
		
		$response = $this->call('GET', 'client/index');
		$response = $this->call('GET', 'client/create');
		$response = $this->call('GET', 'client/show');
		$response = $this->call('GET', 'client/edit');
		
		$response = $this->action('GET', 'ApplicationController@index');
		$response = $this->action('GET', 'ApplicationController@create');
		$response = $this->action('GET', 'ApplicationController@show');
		$response = $this->action('GET', 'ApplicationController@edit');
		
		$response = $this->action('GET', 'ClientController@index');
		$response = $this->action('GET', 'ClientController@create');
		$response = $this->action('GET', 'ClientController@show');
		$response = $this->action('GET', 'ClientController@edit');
		
		$response = $this->action('GET', 'FileController@index');
		$response = $this->action('GET', 'FileController@create');
		$response = $this->action('GET', 'FileController@show');
		$response = $this->action('GET', 'FileController@edit');
		
		$response = $this->action('GET', 'VersionController@index');
		$response = $this->action('GET', 'VersionController@create');
		$response = $this->action('GET', 'VersionController@show');
		$response = $this->action('GET', 'VersionController@edit');
    }
}
