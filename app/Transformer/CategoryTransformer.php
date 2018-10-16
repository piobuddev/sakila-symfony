<?php declare(strict_types=1);

namespace Sakila\Transformer;

use League\Fractal\TransformerAbstract;
use Sakila\Entity\Category;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * @param \Sakila\Entity\Category $category
     *
     * @return array
     */
    public function transform(Category $category): array
    {
        return [
            'categoryId' => $category->getCategoryId(),
            'name'       => $category->getName(),
        ];
    }
}
