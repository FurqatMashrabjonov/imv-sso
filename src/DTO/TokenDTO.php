<?php

namespace Imv\Sso\DTO;

class TokenDTO extends BaseDTO
{
    public function __construct(
        public readonly string $access_token,
        public readonly string $refresh_token,
        public readonly int $expires_in,
        public readonly string $token_type = 'Bearer',
    ) {}
}
