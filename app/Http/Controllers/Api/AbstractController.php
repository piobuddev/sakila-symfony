<?php declare(strict_types=1);

namespace Sakila\Http\Controllers\Api;

use Sakila\Transformer\Transformer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AbstractController
{
    /**
     * @var \Sakila\Transformer\Transformer
     */
    protected $transformer;

    /**
     * @param \Sakila\Transformer\Transformer $transformer
     */
    public function __construct(Transformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @param mixed  $data
     * @param string $transformer
     *
     * @return array
     */
    protected function item($data, string $transformer)
    {
        return $this->transformer->item($data, $transformer);
    }

    /**
     * @param mixed  $data
     * @param string $transformer
     *
     * @return array
     */
    protected function collection($data, string $transformer)
    {
        return $this->transformer->collection($data, $transformer);
    }

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
