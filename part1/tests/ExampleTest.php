<?php


namespace Tests;


use Illuminate\Support\Facades\Mail;

class ExampleTest extends TestCase
{
    use MailTracking;

    /** @test */
    public function testBasicExample()
    {
        $this->visit('/')
            ->seeEmailWasSent();



//        $this->seeEmailWasSent();
//        $this->seeEmailWasNotSent();
//        $this->seeEmailsSent(1);
//        $this->seeEmailTo('foo@bar.com')
//            ->seeEmailFrom('bar@foo.com');
//        $this->seeEmailEquals('Hello world');
//            ->seeEmailContains('Hello');
    }

}
