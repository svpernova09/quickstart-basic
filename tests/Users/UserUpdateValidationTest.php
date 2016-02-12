<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserUpdateValidationTest extends TestCase {

    use DatabaseTransactions;

    public function testUserUpdateValidation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/user/1/edit')
            ->see('Edit User')
            ->see('User Name')
            ->see('User Email')
            ->type('', 'name')
            ->type('', 'email')
            ->press('Update User')
            ->see('The name field is required')
            ->see('The email field is required')
            ->see('Whoops! Something went wrong!');
    }

    public function testEmailValidation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/user/1/edit')
            ->see('Edit User')
            ->see('User Name')
            ->see('User Email')
            ->type('User Name', 'name')
            ->type('Email', 'email')
            ->press('Update User')
            ->see('The email must be a valid email address.')
            ->see('Whoops! Something went wrong!');
    }
}
