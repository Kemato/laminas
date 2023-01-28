<?php

namespace Application\Model\Repository;

use Laminas\Db\TableGateway\TableGatewayInterface;


class UserRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function selectUser($id)
    {
        return $this->tableGateway->select(['id' => $id])->current();
    }

    public function selectAll()
    {
        return $this->tableGateway->select();
    }

    public function createUser($mail, $post, $password)
    {
        $this->tableGateway->insert(['main_mail' => (string)$mail, 'post' => (int)$post, 'password' => (string)$password]);
    }

    public function changePassword($password, $id)
    {
        $this->tableGateway->update(['password' => (string)$password], ['id' => $id]);
    }

    public function updateUser($firstName, $lastName, $patronymic, $gender, $birthday, $skype, $id)
    {
        $this->tableGateway->update([
            'first_name' => (string)$firstName,
            'last_name'  => (string)$lastName,
            'patronymic' => (string)$patronymic,
            'gender'     => (string)$gender,
            'birthday'   => (string)$birthday['year'] . $birthday['month'] . $birthday['day'],
            'skype'      => (string)$skype
        ], ['id' => (int)$id]);
    }

    public function updateAdmin($firstName, $lastName, $patronymic, $gender, $birthday, $skype, $post, $isActive, $isAdmin, $id)
    {
        $this->tableGateway->update([
            'first_name' => (string)$firstName,
            'last_name'  => (string)$lastName,
            'patronymic' => (string)$patronymic,
            'gender'     => (string)$gender,
            'birthday'   => (string)$birthday['year'] . $birthday['month'] . $birthday['day'],
            'skype'      => (string)$skype,
            'post'       => (int)$post,
            'is_active'  => (bool)$isActive,
            'is_admin'   => (bool)$isAdmin
        ], ['id' => (int)$id]);
    }
}