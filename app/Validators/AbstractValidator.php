<?php declare(strict_types=1);

namespace Sakila\Validators;

use Sakila\Entity\Validator\ValidatorInterface;
use Sakila\Exceptions\Validation\ValidationException;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validation;

abstract class AbstractValidator implements ValidatorInterface
{
    private const ALLOW_EXTRA_FIELDS = true;
    private const ALLOW_MISSING_FIELDS = true;

    /**
     * @return array
     */
    abstract protected function getRules(): array;

    /**
     * @param array $attributes
     *
     * @throws \Sakila\Exceptions\Validation\ValidationException;
     */
    public function validate(array $attributes): void
    {
        $validation = Validation::createValidator()->validate($attributes, $this->getConstrains());
        if (0 !== $validation->count()) {
            throw new ValidationException((string)$validation->get(0)->getMessage());
        }
    }

    /**
     * @return \Symfony\Component\Validator\Constraints\Collection
     */
    private function getConstrains(): Collection
    {
        $options = [
            'fields'             => $this->getRules(),
            'allowExtraFields'   => self::ALLOW_EXTRA_FIELDS,
            'allowMissingFields' => self::ALLOW_MISSING_FIELDS,
        ];

        return new Collection($options);
    }
}
