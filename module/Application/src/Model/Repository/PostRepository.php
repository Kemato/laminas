<?php

namespace Application\Model\Repository;

use Application\Model\Data\Mail;
use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;


class PostRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getTitle($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['post_id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function deletePost($id)
    {
        $this->tableGateway->delete(['post_id' => (int) $id]);
    }
    public function createPost($name)
    {
        $this->tableGateway->insert(['post_name' => (string) $name]);
    }
}