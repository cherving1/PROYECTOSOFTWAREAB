<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_set_and_get_name_attribute()
    {
        $user = new User();
        $user->name = 'JOHN DOE';
        $this->assertEquals('john doe', $user->name);
        $this->assertEquals('John Doe', $user->name);
    }

    /** @test */
    public function it_can_mass_assign_name()
    {
        $user = User::create([
            'name' => 'jane doe',
            'email' => 'jane@example.com',
            'password' => 'password123',
        ]);
        $this->assertEquals('jane doe', $user->name);
    }

    /** @test */
    public function it_has_correct_hidden_attributes()
    {
        $user = new User();
        $this->assertContains('password', $user->getHidden());
        $this->assertContains('remember_token', $user->getHidden());
    }
}
