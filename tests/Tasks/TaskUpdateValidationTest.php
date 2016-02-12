<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskUpdateValidationTest extends TestCase {

    use DatabaseTransactions;

    public function testTaskUpdateValidation()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/task/1/edit')
            ->see('Edit Task')
            ->see('Task')
            ->see('Assign to User')
            ->type('', 'name')
            ->select($user->id, 'user_id')
            ->press('Update Task')
            ->see('The name field is required')
            ->see('Whoops! Something went wrong!');
    }
}
