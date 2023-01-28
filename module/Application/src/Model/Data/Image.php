<?php

declare(strict_types=1);

namespace Application\Model\Data;

class Image
{
    protected $id;
    protected $userId;
    protected $way;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->userId = !empty($data['user_id']) ? $data['user_id'] : null;
        $this->way = !empty($data['way']) ? $data['way'] : null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getWay()
    {
        return $this->way;
    }

    /**
     * @param mixed $way
     */
    public function setWay($way): void
    {
        $this->way = $way;
    }

}