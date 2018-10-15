<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AbstractController
{
    protected const DEFAULT_PAGE      = 1;
    protected const DEFAULT_PAGE_SIZE = 15;

    /**
     * @param mixed $data
     * @param int   $code
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function response($data = null, $code = Response::HTTP_OK): Response
    {
        return new JsonResponse($data, $code);
    }
}
