<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Language;

class LanguageTransformer extends TransformerAbstract
{
    public function transform(Language $language): array
    {
        return [
            'languageId' => $language->getLanguageId(),
            'name'       => $language->getName(),
        ];
    }
}
