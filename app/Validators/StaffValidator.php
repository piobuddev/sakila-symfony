<?php declare(strict_types=1);

namespace Sakila\Validators;

use Sakila\Domain\Staff\Validator\StaffValidatorInterface;

class StaffValidator extends AbstractValidator implements StaffValidatorInterface
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
