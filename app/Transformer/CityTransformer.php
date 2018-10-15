<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;
use Sakila\Entity\City;

class CityTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'country',
    ];

    /**
     * @param \Sakila\Entity\City $city
     *
     * @return array
     */
    public function transform(City $city): array
    {
        return [
            'cityId'    => $city->getCityId(),
            'city'      => $city->getCity(),
            'countryId' => $city->getCountryId(),
        ];
    }

    /**
     * @param \Sakila\Entity\City $city
     *
     * @return \League\Fractal\Resource\ResourceAbstract
     */
    public function includeCountry(City $city): ResourceAbstract
    {
        $country = $city->getCountry();

        return $this->item($country, new CountryTransformer());
    }
}
