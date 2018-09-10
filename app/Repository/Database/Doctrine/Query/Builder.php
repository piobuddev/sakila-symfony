<?php declare(strict_types=1);

namespace Sakila\Repository\Database\Doctrine\Query;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Statement;
use Sakila\Exceptions\UnexpectedValueException;
use Sakila\Repository\Database\Query\BuilderInterface;

class Builder implements BuilderInterface
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    /**
     * @var \Doctrine\DBAL\Query\QueryBuilder
     */
    private $query;

    /**
     * @param \Doctrine\DBAL\Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->query      = $this->connection->createQueryBuilder();
    }

    /**
     * @param array $columns
     *
     * @return \Sakila\Repository\Database\Query\BuilderInterface
     */
    public function select(array $columns = null): BuilderInterface
    {
        $columns = $columns ?: ['*'];

        $this->query->select(...$columns);

        return $this;
    }

    /**
     * @param string $table
     *
     * @return \Sakila\Repository\Database\Query\BuilderInterface
     */
    public function from(string $table): BuilderInterface
    {
        $this->query->from($table);

        return $this;
    }

    /**
     * @param array $where
     *
     * @return \Sakila\Repository\Database\Query\BuilderInterface
     */
    public function where(array $where): BuilderInterface
    {
        if (!empty($where)) {
            $binding = [];
            $i = 0;
            foreach ($where as $column => $value) {
                $binding[] = $this->query->expr()->eq($column, '?');
                $this->query->setParameter($i++, $value);
            }

            $this->query->where($this->query->expr()->andX(...$binding));
        }

        return $this;
    }

    /**
     * @param array $order
     *
     * @return \Sakila\Repository\Database\Query\BuilderInterface
     */
    public function order(array $order): BuilderInterface
    {
        list($column, $dir) = array_pad($order, 2, 'asc');
        $this->query->orderBy($column, $dir);

        return $this;
    }

    /**
     * @param int $limit
     *
     * @return \Sakila\Repository\Database\Query\BuilderInterface
     */
    public function limit(int $limit): BuilderInterface
    {
        $this->query->setFirstResult(0)->setMaxResults($limit);

        return $this;
    }

    /**
     * @return array
     * @throws \Sakila\Exceptions\UnexpectedValueException
     */
    public function get(): array
    {
        $statement = $this->query->execute();
        if (!$statement instanceof Statement) {
            throw new UnexpectedValueException();
        }

        return $statement->fetchAll();
    }

    /**
     * @param int|null $page
     * @param int      $pageSize
     *
     * @return array
     * @throws \Sakila\Exceptions\UnexpectedValueException
     */
    public function paginate(?int $page, int $pageSize): array
    {
        $page = $page ?: 1;

        $statement = $this->query
            ->setFirstResult(($page - 1) * $pageSize)
            ->setMaxResults($pageSize)
            ->execute();

        if (!$statement instanceof Statement) {
            throw new UnexpectedValueException();
        }

        return $statement->fetchAll();
    }
}
