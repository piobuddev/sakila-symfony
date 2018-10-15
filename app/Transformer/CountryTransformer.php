<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Country;

class CountryTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Country $country
     *
     * @return array
     */
    public function transform(Country $country): array
    {
        return [
            'countryId' => $country->getCountryId(),
            'country'   => $country->getCountry(),
        ];
    }
}
