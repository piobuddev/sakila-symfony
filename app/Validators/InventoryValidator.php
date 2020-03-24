<?php declare(strict_types=1);

namespace Sakila\Validators;

use Sakila\Domain\Inventory\Validator\InventoryValidatorInterface;

class InventoryValidator extends AbstractValidator implements InventoryValidatorInterface
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
