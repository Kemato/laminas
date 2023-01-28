<?php

namespace Application\Model\Repository;

use Application\Model\Data\Image;
use Laminas\Db\TableGateway\TableGatewayInterface;


class ImageRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getImage($id)
    {
        return $this->tableGateway->select(['user_id'=>$id])->current();
    }
}