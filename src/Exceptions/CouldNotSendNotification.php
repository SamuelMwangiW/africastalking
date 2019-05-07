<?php

namespace MShule\AfricasTalking\Exceptions;

use MShule\AfricasTalking\AfricasTalkingMessage;

class CouldNotSendNotification extends \Exception
{
	/**
     * @param mixed $message
     *
     * @return static
     */
    public static function invalidMessageObject($message)
    {
        $className = get_class($message) ?: 'Unknown';

        return new static(
            "Notification was not sent. Message object class `{$className}` is invalid. It should be `".AfricasTalkingMessage::class.'`');
    }

    /**
     * Thrown when there is no api key.
     *
     * @return static
     */
    public static function missingApiKey()
    {
        return new static('Notification was not sent. Missing `api_key`.');
    }

    /**
     * Thrown when there is no username.
     *
     * @return static
     */
    public static function missingUsername()
    {
        return new static('Notification was not sent. Missing `username`.');
    }

    /**
     * Thrown when there is no content.
     *
     * @return static
     */
    public static function missingContent()
    {
        return new static('Notification was not sent. Missing `content`.');
    }

    /**
     * Thrown when there is no from number.
     *
     * @return static
     */
    public static function missingFrom()
    {
        return new static('Notification was not sent. Missing `from` number.');
    }

    /**
     * Thrown when no to number is provided.
     *
     * @return static
     */
    public static function missingTo()
    {
        return new static('Notification was not sent. Missing `to` number.');
    }

    /**
     * Thrown when gateway responds with a custom error.
     *
     * @return static
     */
    public static function gatewayException($code, $message = null)
    {
        if (!$message) {
            switch ($code) {
                case 401: $message = 'RiskHold'; break;
                case 402: $message = 'InvalidSenderId'; break;
                case 403: $message = 'InvalidPhoneNumber'; break;
                case 404: $message = 'UnsupportedNumberType'; break;
                case 405: $message = 'InsufficientBalance'; break;
                case 406: $message = 'UserInBlacklist'; break;
                case 407: $message = 'CouldNotRoute'; break;
                case 500: $message = 'InternalServerError'; break;
                case 501: $message = 'GatewayError'; break;
                case 502: $message = 'RejectedByGateway'; break;
                default: $message = 'Undefined'; break;
            }
        }
        return new static("Notification was not sent. There was an error from the gateway {$code}:{$message}");
    }
}
