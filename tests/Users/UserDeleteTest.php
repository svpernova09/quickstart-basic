<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserDeleteTest extends TestCase {

    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testDeleteUser()
    {
        $response = $this->call('POST', '/user/1', ['_method' => 'DELETE']);

        $this->assertEquals(302, $response->status());
    }
}
