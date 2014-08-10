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

    public function testUserModel()
    {
        $this->assertInstanceOf('User', $this->user);
        $this->assertInternalType('string', $this->user->username);
        $this->assertInternalType('string', $this->user->backendable);
        $this->assertContains('@', $this->user->email);
        $this->assertRegExp('/[a-z0-9]+/', $this->user->downcase);
        // assertCount
    }

    public function testNormalUser()
    {
        $this->assertTrue($this->user->normalUser());
    }

    public function testProfile()
    {
        $this->assertInstanceOf('Profile', $this->user->profile);
    }

    public function testStat()
    {
        $this->assertInstanceOf('Stat', $this->user->stat);
    }

    public function tearDown()
    {
        DB::rollback();
        Mockery::close();
    }
}
