<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskCreateTest extends TestCase {

    use DatabaseTransactions;

    public function testCreateTask()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/')
            ->see('New Task')
            ->see('Task')
            ->see('Assign to User')
            ->type('New Task', 'name')
            ->select('1', 'user_id')
            ->press('Add Task')
            ->see('Current Tasks')
            ->see('New Task')
            ->seeInDatabase('tasks', [
                'name' => 'New Task',
                'user_id' => '1',
            ])
            ->dontSee('Whoops');
    }
}
