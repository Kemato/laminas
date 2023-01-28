<?php

namespace Application\Model\Repository;

use Application\Model\Data\Message;
use Laminas\Db\TableGateway\TableGatewayInterface;


class ChatRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getChatSend($userId, $talkerId)
    {
        return $this->tableGateway->select(['receiver_id' => $talkerId, 'sender_id' => $userId]);
    }

    public function getChats($userId)
    {
        $received = $this->tableGateway->select(['receiver_id' => $userId]);
        $send = $this->tableGateway->select(['sender_id' => $userId]);
        foreach ($received as $item) {
            $merge[$item->getSenderId()] = $item->getSenderId();
        }
        foreach ($send as $item) {
            $merge[$item->getReceiverId()] = $item->getReceiverId();
        }
        return $merge;
    }

    public function getLastMessage($userId, $talkerId)
    {
        $receiveObj = $this->tableGateway->select(['receiver_id' => $talkerId, 'sender_id' => $userId]);
        $sendObj = $this->tableGateway->select(['sender_id' => $userId, 'receiver_id' => $talkerId]);
        foreach ($receiveObj as $item) {
            $receive = $item;
        }
        foreach ($sendObj as $item) {
            $send = $item;
        }

        if ($send && $receive && $send->getCreatedAt() > $receive->getCreatedAt()) {
            return $send;
        } elseif($send && $receive && $send->getCreatedAt() <= $receive->getCreatedAt()) {
            return $receive;
        }
        else{
            return Null;
        }
    }

    public function createMessage($senderId, $receiverId, $text)
    {
        $this->tableGateway->insert(['sender_id' => (int) $senderId, 'receiver_id' => (int) $receiverId, 'text' => (string) $text]);
    }
}