<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskIndexTest extends TestCase {

    use DatabaseTransactions;

    public function testTaskIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->visit('/task')
            ->see('Current Tasks')
            ->see('Task')
            ->see('Assigned To')
            ->dontSee('Whoops');
    }
}
