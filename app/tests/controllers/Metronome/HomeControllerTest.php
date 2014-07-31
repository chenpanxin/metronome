<?php namespace Busker;

use TestCase;
use Artisan;

class HomeControllerTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testHomeIndex()
    {
        // $this->action('GET', 'Busker\HomeController@index');
        // $this->assertViewHas('topics');
        // $this->assertResponseOk();
    }
}
