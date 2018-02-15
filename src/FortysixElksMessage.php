<?php

namespace NotificationChannels\FortysixElks;

use Illuminate\Support\Arr;

class FortysixElksMessage
{
    /**
     * The receiver phone number.
     *
     * @var string
     */
    public $receiver;

    /**
     * The sender phone number or name.
     *
     * @var string
     */
    public $sender;

    /**
     * The text content of the sms.
     *
     * @var string
     */
    public $body;

    /**
     * isFlash sms state.
     *
     * @var boolean
     */
    public $isFlash;

    public static function create($receiver = '', $body = '', $isFlash = false, $sender = '')
    {
        return new static($receiver, $body, $isFlash, $sender);
    }

    /**
     * @param string $receiver
     * @param string $body
     * @param string $isFlash
     * @param string $sender
     */
    public function __construct($receiver = '', $body = '', $isFlash = false, $sender = '')
    {
        $this->receiver = $receiver;
        $this->body = $body;
        $this->sender = $sender;
        $this->isFlash = $isFlash;
    }

    /**
     * Set the receiver.
     *
     * @param string $receiver
     *
     * @return $this
     */
    public function receiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * Set the sender.
     *
     * @param string $sender
     *
     * @return $this
     */
    public function sender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Set the text content of the body.
     *
     * @param string $body
     *
     * @return $this
     */
    public function body($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Set the isFlash flag.
     *
     * @param boolean $isFlash
     *
     * @return $this
     */
    public function isFlash($isFlash)
    {
        $this->isFlash = ($isFlash ? true : false);
        return $this;
    }

}
