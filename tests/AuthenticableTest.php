<?php

namespace Deiucanta\Smart\Tests;

use Deiucanta\Smart\Tests\Models\User;

class AuthenticableTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_extends_eloquent_model_and_user()
    {
        $user = new User();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Model::class, $user);
        $this->assertInstanceOf(\Illuminate\Foundation\Auth\User::class, $user);
    }

    /** @test */
    public function it_uses_smart_model_trait()
    {
        $user = new User();

        $this->assertArraySubset(class_uses($user), ['SmartModel']);
    }
}
