<?php

namespace Src\Shared\StatusCode;

class ErrorCode
{
    /* Security exceptions start */
    /**
     * When token/session has expired
     */
    public const TOKEN_EXPIRED = 401;

    /**
     * When payload is changed (for cases when the requested payload is different to current one)
     */
    public const INVALID_PAYLOAD = 402;

    /**
     * When a new session is detected
     */
    public const SESSION_CHANGED = 403;

    /**
     * When a the requested token is invalid
     */
    public const INVALID_TOKEN = 404;

    /**
     *
     */
    public const ENCODING_FAILED = 405;

    /**
     *
     */
    public const DECODING_FAILED = 406;
    /* Security exceptions end  */

    /* Transaction error codes */
    /**
     * Error code for when merchant is not active
     */
    public const USER_NOT_ACTIVE = 101;
    /**
     * Error code for when merchant contract is expired
     */
    public const USER_NOT_FOUND = 102;

    /**
     * When user requested and current user are not the same. IDOR case
     */
    public const INVALID_USER = 103;

    /**
     * error description based on error codes
     * @var string[]
     */
    public static $errorDescription = [
        self::TOKEN_EXPIRED => 'tokenExpired',
        self::INVALID_PAYLOAD => 'invalidPayload',
        self::SESSION_CHANGED => 'sessionChanged',
        self::INVALID_TOKEN => 'invalidToken',
        self::ENCODING_FAILED => 'tokenEncodingFailed',
        self::DECODING_FAILED => 'tokenDecodingFailed',

        self::USER_NOT_ACTIVE => 'userNotActive',
        self::USER_NOT_FOUND => 'userNotFound',
        self::INVALID_USER => 'invalidUser',
    ];
}
