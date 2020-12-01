<?php

declare(strict_types=1);

namespace Chiron\Http\Message;

//https://github.com/yiisoft/http/blob/master/src/Method.php
// TODO : classe à renommer en HttpMethods ????
// TODO : enrichir la méthode ->any()    https://github.com/narrowspark/framework/blob/2866c328dfeec4cc78f8c25f412832bb2e9da5e2/src/Viserio/Component/Routing/Router.php#L191
// TODO : classe à déplacer dans un projet http-method et ajouter cette dépendance composer dans le projet router.

/**
 * HTTP request methods
 *
 * @link https://developer.mozilla.org/docs/Web/HTTP/Methods
 */
final class RequestMethod
{
    /**
     * The GET method requests transfer of a current selected representation
     * for the target resource.  GET is the primary mechanism of information
     * retrieval and the focus of almost all performance optimizations.
     * Hence, when people speak of retrieving some identifiable information
     * via HTTP, they are generally referring to making a GET request.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.1
     */
    public const GET = 'GET';

    /**
     * The POST method requests that the target resource process the
     * representation enclosed in the request according to the resource's
     * own specific semantics.  For example, POST is used for the following
     * functions (among others):
     *
     * - Providing a block of data, such as the fields entered into an HTML
     *   form, to a data-handling process;
     * - Posting a message to a bulletin board, newsgroup, mailing list,
     *   blog, or similar group of articles;
     * - Creating a new resource that has yet to be identified by the
     * origin server; and
     * - Appending data to a resource's existing representation(s).
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.3
     */
    public const POST = 'POST';

    /**
     * The PUT method requests that the state of the target resource be
     * created or replaced with the state defined by the representation
     * enclosed in the request message payload.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.4
     */
    public const PUT = 'PUT';

    /**
     * The DELETE method requests that the origin server remove the
     * association between the target resource and its current
     * functionality.  In effect, this method is similar to the rm command
     * in UNIX: it expresses a deletion operation on the URI mapping of the
     * origin server rather than an expectation that the previously
     * associated information be deleted.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.5
     */
    public const DELETE = 'DELETE';

    /**
     * The PATCH method requests that a set of changes described in the
     * request entity be applied to the resource identified by the Request-
     * URI.
     *
     * @link https://tools.ietf.org/html/rfc5789#section-2
     */
    public const PATCH = 'PATCH';

    /**
     * The HEAD method is identical to GET except that the server MUST NOT
     * send a message body in the response (i.e., the response terminates at
     * the end of the header section).
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.2
     */
    public const HEAD = 'HEAD';

    /**
     * The OPTIONS method requests information about the communication
     * options available for the target resource, at either the origin
     * server or an intervening intermediary.  This method allows a client
     * to determine the options and/or requirements associated with a
     * resource, or the capabilities of a server, without implying a
     * resource action.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.7
     */
    public const OPTIONS = 'OPTIONS';

    /**
     * The CONNECT method requests that the recipient establish a tunnel to
     * the destination origin server identified by the request-target and,
     * if successful, thereafter restrict its behavior to blind forwarding
     * of packets, in both directions, until the tunnel is closed.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.6
     */
    public const CONNECT = 'CONNECT';

    /**
     * The TRACE method requests a remote, application-level loop-back of
     * the request message.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.8
     */
    public const TRACE = 'TRACE';

    /**
     * Helper constant to use all the defined methods.
     *
     * @link https://tools.ietf.org/html/rfc7231#section-4.3.8
     */
    public const ANY = [
        self::GET,
        self::POST,
        self::PUT,
        self::DELETE,
        self::PATCH,
        self::HEAD,
        self::OPTIONS,
        self::CONNECT,
        self::TRACE
    ];

    /**
     * Validate the provided HTTP method names.
     *
     * Validates, and then normalizes to upper case.
     *
     * @param string[] An array of HTTP method names.
     *
     * @throws Exception InvalidArgumentException for any invalid method names.
     *
     * @return string[]
     */
    // TODO : regarder aussi ici pour une méthode de vérification : https://github.com/cakephp/cakephp/blob/master/src/Routing/Route/Route.php#L169
    // TODO : fonction à renommer en "validate()" ????
    // TODO : il faudrait plutot que cette fonction soit renommée en isValid($string): bool et qu'elle retourne un booléen true/false sur la validée de la string, et les exceptions seraient levée plutot au niveau de cla sse Route selon la valeur de retour du booléen.
    //https://github.com/slimphp/Slim-Psr7/blob/master/src/Request.php#L155
    public static function validateHttpMethods(array $methods): array
    {
        if (false === array_reduce($methods, function ($valid, $method) {
            if ($valid === false) {
                return false;
            }
            if (! is_string($method)) {
                return false;
            }
            //if (! preg_match('/^[!#$%&\'*+.^_`\|~0-9a-z-]+$/i', $method)) {
            if (preg_match("/^[!#$%&'*+.^_`|~0-9a-z-]+$/i", $method) !== 1) {
            //if (! preg_match("/^[!#$%&'*+.^_`|~0-9a-z-]+$/i", $method)) {
                return false;
            }

            return $valid;
        }, true)) {
            throw new \InvalidArgumentException('One or more HTTP methods were invalid');
        }

        // TODO : reporter ce strtoupper dans la classe Route. cela n'a rien à faire dans une méthode de validation
        // TODO : il faudrait même éviter d'utiliser un strtoupper !!!!
        return array_map('strtoupper', $methods);
    }

    /**
     * Check if the given http method is not a "safe" method.
     *
     * @see https://tools.ietf.org/html/rfc7231.html#section-4.2.1
     *
     * @param string $method
     *
     * @return bool
     */
    public static function isUnsafe(string $method): bool
    {
        return self::isSafe($method) === false;
    }

    /**
     * Check if the given http method is "safe" as defined in RFC7231.
     *
     * @see https://tools.ietf.org/html/rfc7231.html#section-4.2.1
     *
     * @param string $method
     *
     * @return bool
     */
    public static function isSafe(string $method): bool
    {
        return in_array(strtoupper($method), [self::GET, self::HEAD, self::OPTIONS, self::TRACE]);
    }
}
