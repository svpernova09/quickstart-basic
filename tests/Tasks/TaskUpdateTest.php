<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskUpdateTest extends TestCase {

    use DatabaseTransactions;

    public function testUpdateTask()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/task')
            ->see('Current Tasks')
            ->see('Task')
            ->see('Assigned To')
            ->click('Edit')
            ->type('Edited Task Name', 'name')
            ->select($user->id, 'user_id')
            ->press('Update Task')
            ->see('Current Tasks')
            ->see('Task')
            ->seeInDatabase('tasks', [
                'name' => 'Edited Task Name',
                'user_id' => $user->id,
            ])
            ->dontSee('Whoops');
    }
}
