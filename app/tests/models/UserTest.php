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

class UserTest extends TestCase {

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->migrateAndSeed();
        $this->user = User::first();
        DB::beginTransaction();
    }

    public function testNormalUser()
    {
        $this->assertTrue($this->user->normalUser());
    }

    public function testProfile()
    {
        $this->assertTrue($this->user->profile instanceOf Profile);
    }

    public function testStat()
    {
        $this->assertTrue($this->user->stat instanceOf Stat);
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
