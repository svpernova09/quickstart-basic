<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageLoadTest extends TestCase {

    use DatabaseTransactions;

    /**
     * Make sure we get 200 back
     */
    public function testResponseCode()
    {
        $response = $this->call('GET', '/', []);

        $this->assertEquals(200, $response->status());
    }

    /**
     * Make sure our view has our expected data
     */
    public function testViewContainsData()
    {
        $response = $this->call('GET', '/', []);

        $this->assertViewHas('tasks');
        $this->assertViewHas('users');
    }
}
