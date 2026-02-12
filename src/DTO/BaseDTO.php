<?php

namespace Imv\Sso\DTO;

use Imv\Sso\Exceptions\SsoException;
use Saloon\Http\Response;

abstract class BaseDTO
{
    public static function from(array $data): static
    {
        $ref = new \ReflectionClass(static::class);
        $params = $ref->getConstructor()->getParameters();

        $args = [];
        foreach ($params as $param) {
            $name = $param->getName();

            if (array_key_exists($name, $data)) {
                $args[$name] = $data[$name];
            } elseif ($param->isDefaultValueAvailable()) {
                $args[$name] = $param->getDefaultValue();
            } else {
                throw new \InvalidArgumentException("Missing required field: {$name}");
            }
        }

        return new static(...$args);
    }

    public static function fromResponse(Response $response): static
    {
        if ($response->failed()) {
            throw SsoException::fromResponse($response);
        }

        return static::from($response->json());
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
