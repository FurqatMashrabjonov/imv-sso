<?php

namespace Imv\Sso\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class AuthorizationCodeRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $code,
        protected string $verifier,
        protected string $redirectUri,
    ) {}

    public function resolveEndpoint(): string
    {
        return 'oauth2/token';
    }

    protected function defaultQuery(): array
    {
        return [
            'grant_type' => 'authorization_code',
            'code' => $this->code,
            'code_verifier' => $this->verifier,
            'redirect_uri' => $this->redirectUri,
        ];
    }
}
