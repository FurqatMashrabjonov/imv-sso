<?php

namespace Imv\Sso\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class RefreshTokenRequest extends Request
{
    protected Method $method = Method::POST;

    public function __construct(
        protected string $refreshToken,
    ) {}

    public function resolveEndpoint(): string
    {
        return 'oauth2/token';
    }

    protected function defaultQuery(): array
    {
        return [
            'grant_type' => 'refresh_token',
            'refresh_token' => $this->refreshToken,
        ];
    }
}
