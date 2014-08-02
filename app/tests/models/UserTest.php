<?php

/**
 * User Table Schema Information
 * -----------------------------
 * id                 :integer
 * password           :string
 * avatar_url         :string
 * email              :string   unique
 * username           :string   unique
 * downcase           :string   unique
 * locale             :string   default('zh')
 * remember_token     :string   nullable
 * notification_level :integer  default(0)
 * backendable        :boolean  default(false)
 * verified           :boolean  default(false)
 * locked_at          :datetime nullable
 * created_at         :datetime
 * updated_at         :datetime
 */

use Laracasts\TestDummy\Factory;

class UserTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        var_dump(static::$migrated);
        if (! static::$migrated)
        {
            $this->migrateAndSeed();
            static::$migrated = true;
        }
        DB::beginTransaction();
    }

    public function testUser()
    {
        // var_dump(User::first());
        // $user = Factory::build('User');
        // $this->assertTrue(User::first()->profile instanceOf Profile);
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
        var_dump(static::$migrated);
    }
}
