<?php

namespace MShule\AfricasTalking\Test;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use MShule\AfricasTalking\AfricasTalkingChannel;
use MShule\AfricasTalking\AfricasTalkingMessage;
use Mockery;
use PHPUnit_Framework_TestCase;

class AfricasTalkingChannelTest extends PHPUnit_Framework_TestCase
{
    /** @var AfricasTalking */
    private $client;

    /** @var AfricasTalkingChannel */
    private $channel;

    /** @var AfricasTalkingMessage */
    private $message;

	public function setUp()
    {
        $this->client = Mockery::mock(new AfricasTalking('sandbox', '29e55fe8ec7ef19dd64daba0d1480d0562ca5a85617e6353d505816646e11e0b'));
        $this->channel = new AfricasTalkingChannel($this->client);
        $this->message = new AfricasTalkingMessage();
    }

    public function tearDown()
    {
        Mockery::close();
        parent::tearDown();
    }

    public function it_can_be_instantiated()
    {
        $this->assertInstanceOf(AfricasTalking::class, $this->client);
        $this->assertInstanceOf(AfricasTalkingChannel::class, $this->channel);
        $this->assertInstanceOf(AfricasTalkingMessage::class, $this->message);
    }

    public function it_can_send_a_notification()
    {
    	$notifiable = new TestNotifiable;
    	$notification = new TestNotification;

        $this->channel->send($notifiable, $notification);
    }
}

class TestNotifiable
{
    use Notifiable;

    public function routeNotificationForAfricasTalking()
    {
        return '+254712345678';
    }
}

class TestNotification extends Notification
{
    public function toAfricasTalking($notifiable)
    {
    	return (new AfricasTalkingMessage())->from('60606')->content('Hello World!');
    }
}
