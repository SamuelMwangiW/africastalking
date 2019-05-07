<?php

namespace MShule\AfricasTalking;

class AfricasTalkingMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * The phone number the message should be sent from.
     *
     * @var string
     */
    public $from;

    /**
     * The phone number(s) the message should be sent to.
     *
     * @var string
     */
    public $to;

    /**
     * Create a message object.
     *
     * @param string $content
     * @return static
     */
    public static function create($content = '')
    {
        return new static($content);
    }

    /**
     * Create a new message instance.
     *
     * @param  string $content
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param  string $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get the message content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the message to number.
     *
     * @param  string $to
     * @return $this
     */
    public function to($to)
    {
        if (is_array($to)) {
            $to = implode(',', $to);
        }
        $this->to = $to;
        return $this;
    }

    /**
     * Get the to we are sending the message.
     *
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set the phone number the message should be sent from.
     *
     * @param  string $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Get the from address.
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Get the json representation of the message.
     *
     * @return json
     */

    public function toJson()
    {
        return json_encode($this);
    }

    /**
     * Get the array representation of the message.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'content' => $this->getContent(),
            'to' => $this->getTo(),
            'from' => $this->getFrom(),
        ];
    }
}