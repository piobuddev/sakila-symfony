<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Store;

class StoreTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Store $store
     *
     * @return array
     */
    public function transform(Store $store): array
    {
        return [
            'storeId'        => $store->getStoreId(),
            'managerStaffId' => $store->getManagerStaffId(),
            'addressId'      => $store->getAddressId(),
        ];
    }
}
