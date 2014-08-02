<?php

/**
 * User Table Schema Information
 * -----------------------------
 * id                 :integer
 * password           :string
 * avatar_url         :string
 * email              :string
 * username           :string
 * downcase           :string
 * locale             :string
 * remember_token     :string
 * notification_level :integer  default(0)
 * backendable        :boolean  default(false)
 * verified           :boolean  default(false)
 * locked_at          :datetime
 * created_at         :datetime
 * updated_at         :datetime
 */

use Laracasts\TestDummy\Factory;

class UserTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        DB::beginTransaction();
    }

    public function testUser()
    {
        $user = Factory::build('User');
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
