<?php

namespace Application\Model\Repository;

use Application\Model\Data\Mail;
use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;


class PhoneRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function selectOne($id)
    {
        return $this->tableGateway->select(['user_id' => $id]);
    }
    public function getPhone($id)
    {
        $id = (int) $id;
        return $this->tableGateway->select(['user_id' => $id])->current();
    }
    public function selectAll()
    {
        return $this->tableGateway->select();
    }
//    public function getMail($id)
//    {
//        $id = (int) $id;
//        $rowset = $this->tableGateway->select(['id' => $id]);
//        $row = $rowset->current();
//        if (! $row) {
//            throw new RuntimeException(sprintf(
//                'Could not find row with identifier %d',
//                $id
//            ));
//        }
//
//        return $row;
//    }

//    public function saveMail(Mail $album)
//    {
//        $data = [
//            'artist' => $album->artist,
//            'title'  => $album->title,
//        ];
//
//        $id = (int) $album->getId();
//
//        if ($id === 0) {
//            $this->tableGateway->insert($data);
//            return;
//        }
//
//        try {
//            $this->getMail($id);
//        } catch (RuntimeException $e) {
//            throw new RuntimeException(sprintf(
//                'Cannot update album with identifier %d; does not exist',
//                $id
//            ));
//        }
//
//        $this->tableGateway->update($data, ['id' => $id]);
//    }

    public function deletePhone($id)
    {
        $this->tableGateway->delete(['id' => (int)$id]);
    }

    public function createPhone($number, $userId)
    {
        $this->tableGateway->insert(['user_id' => (int)$userId, 'number' => (string)$number, ]);
    }
}