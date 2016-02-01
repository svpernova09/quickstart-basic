<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserCreateTest extends TestCase {

    use DatabaseTransactions;

    public function testCreateUser()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/')
            ->see('New User')
            ->see('User')
            ->see('User Name')
            ->see('User Email')
            ->type('New User', 'name')
            ->type('user@email.com', 'email')
            ->press('Add User')
            ->see('Current Users')
            ->see('New User')
            ->seeInDatabase('users', [
                'name' => 'New User',
                'email' => 'user@email.com',
            ])
            ->dontSee('Whoops');
    }
}
