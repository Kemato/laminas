<?php

namespace Application\Model\Data;


class Message
{
    public $id;
    public $senderId;
    public $receiverId;
    public $text;
    public $createdAt;
    public $readAt;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->senderId = !empty($data['sender_id']) ? $data['sender_id'] : null;
        $this->receiverId = !empty($data['receiver_id']) ? $data['receiver_id'] : null;
        $this->text = !empty($data['text']) ? $data['text'] : null;
        $this->createdAt= !empty($data['created_at']) ? $data['created_at'] : null;
        $this->readAt = !empty($data['read_at']) ? $data['read_at'] : null;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @param mixed $senderId
     */
    public function setSenderId($senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * @param mixed $receiverId
     */
    public function setReceiverId($receiverId): void
    {
        $this->receiverId = $receiverId;
    }

    /**
     * @param mixed $readAt
     */
    public function setReadAt($readAt): void
    {
        $this->readAt = $readAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @return mixed
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * @return mixed
     */
    public function getReadAt()
    {
        return $this->readAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}