<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserUpdateTest extends TestCase {

    use DatabaseTransactions;

    public function testUpdateUser()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/user')
            ->see('Current Users')
            ->see('Name')
            ->see('Email')
            ->see('Tasks Assigned')
            ->click('Edit')
            ->type('Edited User Name', 'name')
            ->type('edited@email.com', 'email')
            ->press('Update User')
            ->see('Current Users')
            ->see('Name')
            ->see('Email')
            ->see('Tasks Assigned')
            ->seeInDatabase('users', [
                'name' => 'Edited User Name',
                'email' => 'edited@email.com',
            ])
            ->dontSee('Whoops');
    }
}
