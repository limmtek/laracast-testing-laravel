<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testWelcomePage()
    {
        $this->visit('/')
            ->see('Laravel 6');
    }

    public function testFeedbackLink()
    {
        $this->visit('/')
            ->click('Feedback')
            ->see('You\'ve been clicked')
            ->seePageIs('/feedback');
    }
}
