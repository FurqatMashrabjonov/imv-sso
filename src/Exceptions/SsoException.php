<?php

namespace Imv\Sso\Exceptions;

use Saloon\Http\Response;

class SsoException extends \RuntimeException
{
    public function __construct(
        string $message,
        public readonly ?Response $response = null,
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function fromResponse(Response $response): self
    {
        $body = $response->json();

        $message = $body['message'] ?? $body['error'] ?? 'SSO request failed';

        return new self(
            message: $message,
            response: $response,
            code: $response->status(),
        );
    }
}
