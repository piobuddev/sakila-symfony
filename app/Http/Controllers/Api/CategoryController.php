<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Category\Service\Request\AddCategoryRequest;
use Sakila\Domain\Category\Service\Request\RemoveCategoryRequest;
use Sakila\Domain\Category\Service\Request\ShowCategoryRequest;
use Sakila\Domain\Category\Service\Request\ShowCategoriesRequest;
use Sakila\Domain\Category\Service\Request\UpdateCategoryRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * @var \Sakila\Command\Bus\CommandBus
     */
    private $commandBus;

    /**
     * @param \Sakila\Command\Bus\CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param int $categoryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $categoryId): Response
    {
        $category = $this->commandBus->execute(new ShowCategoryRequest($categoryId));

        return $this->response($category);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request): Response
    {
        $page     = (int)$request->get('page', self::DEFAULT_PAGE);
        $pageSize = (int)$request->get('page_size', self::DEFAULT_PAGE_SIZE);
        $categories   = $this->commandBus->execute(new ShowCategoriesRequest($page, $pageSize));

        return $this->response($categories);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $category = $this->commandBus->execute(new AddCategoryRequest($data));

        return $this->response($category, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $categoryId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $categoryId, Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $category = $this->commandBus->execute(new UpdateCategoryRequest($categoryId, $data));

        return $this->response($category);
    }

    /**
     * @param int $categoryId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $categoryId): Response
    {
        $this->commandBus->execute(new RemoveCategoryRequest($categoryId));

        return $this->response();
    }
}
