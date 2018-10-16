<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Inventory;

class InventoryTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Inventory $inventory
     *
     * @return array
     */
    public function transform(Inventory $inventory): array
    {
        return [
            'inventoryId' => $inventory->getInventoryId(),
            'filmId'      => $inventory->getFilmId(),
            'storeId'     => $inventory->getStoreId(),
        ];
    }
}
