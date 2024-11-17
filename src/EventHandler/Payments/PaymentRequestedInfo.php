<?php

namespace danog\MadelineProto\EventHandler\Payments;

use JsonSerializable;

final class PaymentRequestedInfo implements JsonSerializable
{
    public function __construct(
        /** User’s full name */
        public readonly string $name,
        /** User’s phone number */
        public readonly string $phone,
        /** User’s email address */
        public readonly string $email
    )
    {

    }

    /** @internal */
    public function jsonSerialize(): mixed
    {
        $res = ['_' => static::class];
        $refl = new ReflectionClass($this);
        foreach ($refl->getProperties(ReflectionProperty::IS_PUBLIC) as $prop) {
            $res[$prop->getName()] = $prop->getValue($this);
        }
        return $res;
    }
}