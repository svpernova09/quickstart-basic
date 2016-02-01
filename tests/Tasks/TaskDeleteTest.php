<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TaskDeleteTest extends TestCase {

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testDeleteTask()
    {
        $response = $this->call('POST', '/task/1', ['_method' => 'DELETE']);

        $this->assertEquals(302, $response->status());
    }
}
