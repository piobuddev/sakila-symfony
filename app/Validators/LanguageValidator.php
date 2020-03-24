<?php declare(strict_types=1);

namespace Sakila\Validators;

use Sakila\Domain\Language\Validator\LanguageValidatorInterface;

class LanguageValidator extends AbstractValidator implements LanguageValidatorInterface
{
    /**
     * @return array
     */
    protected function getRules(): array
    {
        return [
            //todo: add rules
        ];
    }
}
