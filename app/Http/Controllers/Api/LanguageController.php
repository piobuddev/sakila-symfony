<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Command\Bus\CommandBus;
use Sakila\Domain\Language\Service\Request\AddLanguageRequest;
use Sakila\Domain\Language\Service\Request\RemoveLanguageRequest;
use Sakila\Domain\Language\Service\Request\ShowLanguageRequest;
use Sakila\Domain\Language\Service\Request\ShowLanguagesRequest;
use Sakila\Domain\Language\Service\Request\UpdateLanguageRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends AbstractController
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
     * @param int $languageId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(int $languageId): Response
    {
        $language = $this->commandBus->execute(new ShowLanguageRequest($languageId));

        return $this->response($language);
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
        $languages   = $this->commandBus->execute(new ShowLanguagesRequest($page, $pageSize));

        return $this->response($languages);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request): Response
    {
        $data  = json_decode((string)$request->getContent(), true);
        $language = $this->commandBus->execute(new AddLanguageRequest($data));

        return $this->response($language, Response::HTTP_CREATED);
    }

    /**
     * @param int                                       $languageId
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(int $languageId, Request $request): Response
    {
        $data = json_decode((string)$request->getContent(), true);
        $language = $this->commandBus->execute(new UpdateLanguageRequest($languageId, $data));

        return $this->response($language);
    }

    /**
     * @param int $languageId
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy(int $languageId): Response
    {
        $this->commandBus->execute(new RemoveLanguageRequest($languageId));

        return $this->response();
    }
}
