<?php declare(strict_types=1);

namespace Sakila\Validators;

use Sakila\Domain\Category\Validator\CategoryValidatorInterface;

class CategoryValidator extends AbstractValidator implements CategoryValidatorInterface
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
