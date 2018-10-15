<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Address;

class AddressTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'city',
        'country',
    ];

    /**
     * @param \Sakila\Entity\Address $address
     *
     * @return array
     */
    public function transform(Address $address): array
    {
        return [
            'id'         => $address->getAddressId(),
            'address'    => $address->getAddress(),
            'address2'   => $address->getAddress2(),
            'district'   => $address->getDistrict(),
            'cityId'     => $address->getCityId(),
            'postalCode' => $address->getPostalCode(),
            'phone'      => $address->getPhone(),
        ];
    }

    /**
     * @param \Sakila\Entity\Address $address
     *
     * @return \League\Fractal\Resource\Item
     */
    protected function includeCity(Address $address)
    {
        return $this->item($address->getCity(), new CityTransformer());
    }

    /**
     * @param \Sakila\Entity\Address $address
     *
     * @return \League\Fractal\Resource\Item
     */
    protected function includeCountry(Address $address)
    {
        return $this->item($address->getCity()->getCountry(), new CountryTransformer());
    }
}
