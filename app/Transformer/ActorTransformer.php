<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\ActorEntity;

class ActorTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\ActorEntity $actor
     *
     * @return array
     */
    public function transform(ActorEntity $actor): array
    {
        return [
            'actorId'   => $actor->actorId,
            'firstName' => $actor->firstName,
            'lastName'  => $actor->lastName,
        ];
    }
}
