<?php

namespace MShule\AfricasTalking\Test;

use MShule\AfricasTalking\AfricasTalkingMessage;
use PHPUnit_Framework_TestCase;

class AfricasTalkingMessageTest extends PHPUnit_Framework_TestCase
{   
    public function it_can_be_instantiated()
    {
        $message = new AfricasTalkingMessage;

        $this->assertInstanceOf(AfricasTalkingMessage::class, $message);
    }

    public function it_can_accept_content_when_created()
    {
        $message = new AfricasTalkingMessage('FooBar');

        $this->assertEquals('FooBar', $message->getContent());
    }

    public function it_supports_create_method()
    {
        $message = AfricasTalkingMessage::create('FooBar');

        $this->assertInstanceOf(AfricasTalkingMessage::class, $message);
        $this->assertEquals('FooBar', $message->getContent());
    }

    public function it_can_set_content()
    {
        $message = (new AfricasTalkingMessage)->content('FooBar');

        $this->assertEquals('FooBar', $message->getContent());
    }

    public function it_can_set_to()
    {
        $message = (new AfricasTalkingMessage)->to('+254712345678');

        $this->assertEquals('+254712345678', $message->getTo());
    }

    public function it_can_set_to_from_array()
    {
        $message = (new AfricasTalkingMessage)->to(['+254712345678', '+254712345679', '+254712345680']);

        $this->assertEquals('+254712345678,+254712345679,+254712345680', $message->getTo());
    }

    public function it_can_set_from()
    {
        $message = (new AfricasTalkingMessage)->from('+254712345678');

        $this->assertEquals('+254712345678', $message->getFrom());
    }

    public function it_supports_to_json_method()
    {
        $message = new AfricasTalkingMessage;

        $this->assertJson($message->toJson());
    }
}
