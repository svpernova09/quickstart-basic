<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserIndexTest extends TestCase {

    use DatabaseTransactions;

    public function testUserIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/user')
            ->see('Current Users')
            ->see('Name')
            ->see('Email')
            ->see('Tasks Assigned')
            ->dontSee('Whoops');
    }
}
