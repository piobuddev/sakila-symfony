<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Actor;

class ActorTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Actor $actor
     *
     * @return array
     */
    public function transform(Actor $actor): array
    {
        return [
            'actorId'   => $actor->getActorId(),
            'firstName' => $actor->getFirstName(),
            'lastName'  => $actor->getLastName(),
        ];
    }
}
