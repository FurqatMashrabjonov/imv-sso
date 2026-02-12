<?php

namespace Imv\Sso\DTO;

class UserDTO extends BaseDTO
{
    public function __construct(
        public readonly ?string $sub = null,
        public readonly ?string $pin = null,
        public readonly ?string $tin = null,
        public readonly ?string $name = null,
        public readonly ?string $given_name = null,
        public readonly ?string $family_name = null,
        public readonly ?string $birth_date = null,
        public readonly ?string $per_type = null,
        public readonly ?string $mob_phone_no = null,
        public readonly ?string $email = null,
        public readonly ?bool $active = null,
    ) {}
}
