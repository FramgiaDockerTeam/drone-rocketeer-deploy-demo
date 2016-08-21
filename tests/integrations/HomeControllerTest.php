<?php

class HomeControllerTest extends TestCase
{
    /** @test */
    public function it_loads_home_page()
    {
        $this->visit('/')
            ->see('Demo');
    }
}