<?php

declare(strict_types=1);

namespace Chiron\Http\Message;

/**
 * HTTP response status codes
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
 * @link https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
 */
final class StatusCode
{
    /**
     * Allowed range for a valid HTTP status code.
     */
    public const MINIMUM_VALUE = 100;
    public const MAXIMUM_VALUE = 599;

    /* Http Status Code, http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml */
    public const CONTINUE = 100;
    public const SWITCHING_PROTOCOLS = 101;
    public const PROCESSING = 102;
    public const EARLY_HINTS = 103;
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NONAUTHORITATIVE_INFORMATION = 203;
    public const NO_CONTENT = 204;
    public const RESET_CONTENT = 205;
    public const PARTIAL_CONTENT = 206;
    public const MULTI_STATUS = 207;
    public const ALREADY_REPORTED = 208;
    public const IM_USED = 226;
    public const MULTIPLE_CHOICES = 300;
    public const MOVED_PERMANENTLY = 301;
    public const FOUND = 302;
    public const SEE_OTHER = 303;
    public const NOT_MODIFIED = 304;
    public const USE_PROXY = 305;
    public const UNUSED = 306;
    public const TEMPORARY_REDIRECT = 307;
    public const PERMANENT_REDIRECT = 308;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const PAYMENT_REQUIRED = 402;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const NOT_ACCEPTABLE = 406;
    public const PROXY_AUTHENTICATION_REQUIRED = 407;
    public const REQUEST_TIMEOUT = 408;
    public const CONFLICT = 409;
    public const GONE = 410;
    public const LENGTH_REQUIRED = 411;
    public const PRECONDITION_FAILED = 412;
    public const PAYLOAD_TOO_LARGE = 413;
    public const URI_TOO_LONG = 414;
    public const UNSUPPORTED_MEDIA_TYPE = 415;
    public const RANGE_NOT_SATISFIABLE = 416;
    public const EXPECTATION_FAILED = 417;
    public const IM_A_TEAPOT = 418;
    public const MISDIRECTED_REQUEST = 421;
    public const UNPROCESSABLE_ENTITY = 422;
    public const LOCKED = 423;
    public const FAILED_DEPENDENCY = 424;
    public const TOO_EARLY = 425;
    public const UPGRADE_REQUIRED = 426;
    public const PRECONDITION_REQUIRED = 428;
    public const TOO_MANY_REQUESTS = 429;
    public const REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
    public const UNAVAILABLE_FOR_LEGAL_REASONS = 451;
    public const INTERNAL_SERVER_ERROR = 500;
    public const NOT_IMPLEMENTED = 501;
    public const BAD_GATEWAY = 502;
    public const SERVICE_UNAVAILABLE = 503;
    public const GATEWAY_TIMEOUT = 504;
    public const VERSION_NOT_SUPPORTED = 505;
    public const VARIANT_ALSO_NEGOTIATES = 506;
    public const INSUFFICIENT_STORAGE = 507;
    public const LOOP_DETECTED = 508;
    public const NOT_EXTENDED = 510;
    public const NETWORK_AUTHENTICATION_REQUIRED = 511;

    /**
     * Array Map of standard HTTP status code/reason phrases.
     *
     * @var array
     */
    // TODO : utiliser les constantes définies précédemment dans la classe (ex : remplacer '400' par self::HTTP_BAD_REQUEST)
    private static $statusNames = [
        // Informational 1xx
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        103 => 'Early Hints',
        // Successful 2xx
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        // Redirection 3xx
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        // Client Error 4xx
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Too Early',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        // Server Error 5xx
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    ];

    /**
     * Array of standard HTTP status code/reason phrases.
     *
     * @see https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
     *
     * @var array
     */
    // TODO : utiliser les constantes définies précédemment dans la classe (ex : remplacer '400' par self::HTTP_BAD_REQUEST)
    private static $reasonPhrases = [
        // Successful 2xx
        200 => 'Standard response for successful HTTP requests.',
        201 => 'The request has been fulfilled, resulting in the creation of a new resource.',
        202 => 'The request has been accepted for processing, but the processing has not been completed.',
        203 => 'The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin\'s response.',
        204 => 'The server successfully processed the request and is not returning any content.',
        205 => 'The server successfully processed the request, but is not returning any content.',
        206 => 'The server is delivering only part of the resource (byte serving) due to a range header sent by the client.',
        207 => 'The message body that follows is an XML message and can contain a number of separate response codes, depending on how many sub-requests were made.',
        208 => 'The members of a DAV binding have already been enumerated in a previous reply to this request, and are not being included again.',
        226 => 'The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.',
        // Redirection 3xx
        300 => 'Indicates multiple options for the resource from which the client may choose.',
        301 => 'This and all future requests should be directed to the given URI.',
        302 => 'This is an example of industry practice contradicting the standard.',
        303 => 'The response to the request can be found under another URI using a GET method.',
        304 => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match.',
        305 => 'The requested resource is available only through a proxy, the address for which is provided in the response.',
        306 => 'No longer used.',
        307 => 'In this case, the request should be repeated with another URI; however, future requests should still use the original URI.',
        308 => 'The request and all future requests should be repeated using another URI.',
        // Client Error 4xx
        400 => 'The request cannot be fulfilled due to bad syntax.',
        401 => 'Authentication is required and has failed or has not yet been provided.',
        402 => 'Reserved for future use.',
        403 => 'The request was a valid request, but the server is refusing to respond to it.',
        404 => 'The requested resource could not be found but may be available again in the future.',
        405 => 'A request was made of a resource using a request method not supported by that resource.',
        406 => 'The requested resource is only capable of generating content not acceptable.',
        407 => 'Proxy authentication is required to access the requested resource.',
        408 => 'The server did not receive a complete request message in time.',
        409 => 'The request could not be processed because of conflict in the request.',
        410 => 'The requested resource is no longer available and will not be available again.',
        411 => 'The request did not specify the length of its content, which is required by the resource.',
        412 => 'The server does not meet one of the preconditions that the requester put on the request.',
        413 => 'The server cannot process the request because the request payload is too large.',
        414 => 'The request-target is longer than the server is willing to interpret.',
        415 => 'The request entity has a media type which the server or resource does not support.',
        416 => 'The client has asked for a portion of the file, but the server cannot supply that portion.',
        417 => 'The expectation given could not be met by at least one of the inbound servers.',
        418 => 'I\'m a teapot',
        421 => 'The request was directed at a server that is not able to produce a response.',
        422 => 'The request was well-formed but was unable to be followed due to semantic errors.',
        423 => 'The resource that is being accessed is locked.',
        424 => 'The request failed due to failure of a previous request.',
        425 => 'The request could not be processed due to the consequences of a possible replay attack.',
        426 => 'The server cannot process the request using the current protocol.',
        428 => 'The origin server requires the request to be conditional.',
        429 => 'The user has sent too many requests in a given amount of time.',
        431 => 'The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large.',
        451 => 'Resource access is denied for legal reasons.',
        // Server Error 5xx
        500 => 'An error has occurred and this resource cannot be displayed.',
        501 => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request.',
        502 => 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
        503 => 'The server is currently unavailable. It may be overloaded or down for maintenance.',
        504 => 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
        505 => 'The server does not support the HTTP protocol version used in the request.',
        506 => 'Transparent content negotiation for the request, results in a circular reference.',
        507 => 'The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request. There is insufficient free space left in your storage allocation.',
        508 => 'The server detected an infinite loop while processing the request.',
        510 => 'Further extensions to the request are required for the server to fulfill it.A mandatory extension policy in the request is not accepted by the server for this resource.',
        511 => 'The client needs to authenticate to gain network access.',
    ];

    /**
     * Private constructor; non-instantiable class use only the static methods!
     */
    private function __construct()
    {
    }

    /**
     * Get the name for a given status code.
     *
     * @param int $statusCode http status code
     *
     * @throws \InvalidArgumentException If the requested $statusCode is not valid
     * @throws \OutOfBoundsException     If the requested $statusCode is not found
     *
     * @return string Returns name for the given status code
     */
    public static function getStatusName(int $statusCode): string
    {
        static::assertValidStatusCode($statusCode);
        if (! isset(self::$statusNames[$statusCode])) {
            throw new \OutOfBoundsException(sprintf('Unknown http status code: `%s`.', $statusCode));
        }

        return self::$statusNames[$statusCode];
    }

    /**
     * Get the reason phrase for a given status code.
     *
     * @param int $statusCode http status code
     *
     * @throws \InvalidArgumentException If the requested $statusCode is not valid
     * @throws \OutOfBoundsException     If the requested $statusCode is not found
     *
     * @return string Returns message for the given status code
     */
    public static function getReasonPhrase(int $statusCode): string
    {
        static::assertValidStatusCode($statusCode);
        if (! isset(self::$reasonPhrases[$statusCode])) {
            throw new \OutOfBoundsException(sprintf('Unknown http status code: `%s`.', $statusCode));
        }

        return self::$reasonPhrases[$statusCode];
    }

    /**
     * Assert a HTTP Status code is in the correct range.
     *
     * @param int $statusCode
     *
     * @throws \InvalidArgumentException if the HTTP status code is invalid
     */
    public static function assertValidStatusCode(int $statusCode): void
    {
        if ($statusCode < self::MINIMUM_VALUE || $statusCode > self::MAXIMUM_VALUE) {
            throw new \InvalidArgumentException("Invalid status code '$statusCode'; must be an integer between 100 and 599, inclusive.");
        }
    }

    // TODO : code à améliorer !!!!

    /**
     * Is response invalid?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isInvalid(int $statusCode): bool
    {
        return $statusCode < 100 || $statusCode >= 600;
    }

    /**
     * Is response informative?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isInformational(int $statusCode): bool
    {
        return $statusCode >= 100 && $statusCode < 200;
    }

    /**
     * Is response successful?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isSuccessful(int $statusCode): bool
    {
        return $statusCode >= 200 && $statusCode < 300;
    }

    /**
     * Is the response a redirect?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isRedirection(int $statusCode): bool
    {
        return $statusCode >= 300 && $statusCode < 400;
    }

    /**
     * Is there a client error?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isClientError(int $statusCode): bool
    {
        return $statusCode >= 400 && $statusCode < 500;
    }

    /**
     * Was there a server side error?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isServerError(int $statusCode): bool
    {
        return $statusCode >= 500 && $statusCode < 600;
    }

    /**
     * Is the response OK?
     *
     * @param int $statusCode http status code
     *
     * @return boolfinal
     */
    public static function isOk(int $statusCode): bool
    {
        return $statusCode === 200;
    }

    /**
     * Is the response forbidden?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isForbidden(int $statusCode): bool
    {
        return $statusCode === 403;
    }

    /**
     * Is the response a not found error?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isNotFound(int $statusCode): bool
    {
        return $statusCode === 404;
    }

    /**
     * Is the response a redirect of some form?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isRedirect(int $statusCode): bool
    {
        return in_array($statusCode, [301, 302, 303, 307, 308]);
    }

    /**
     * Is the response empty?
     *
     * @param int $statusCode http status code
     *
     * @return bool
     */
    public static function isEmpty(int $statusCode): bool
    {
        return in_array($statusCode, [204, 304]);
    }
}
