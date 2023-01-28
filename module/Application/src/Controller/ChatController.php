<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Letter;
use Application\Model\Repository\ChatRepository;
use Application\Model\Repository\UserRepository;
use Application\Form\SearchDialog;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class ChatController extends AbstractActionController
{

    private $userTable;
    private $chatTable;
    private $userId = 1;

    public function __construct(UserRepository $userTable, ChatRepository $chatTable)
    {
        $this->userTable = $userTable;
        $this->chatTable = $chatTable;
    }
    public function mergeChat(object $send, object $receive){
        foreach ($send as $item){
            $message[$item->getId()] = [
                'text'      => $item->getText(),
                'time_sent' => $item->getCreatedAt(),
                'time_read' => $item->getReadAt(),
                'from_me'   => true,
            ];
        }
        foreach ($receive as $item){
            $message[$item->getId()] = [
                'text'      => $item->getText(),
                'time_sent' => $item->getCreatedAt(),
                'time_read' => $item->getReadAt(),
                'from_me'   => false,
            ];
        }
        return $message;
    }
    public function indexAction()
    {
        $talkerId = (int)$this->params()->fromRoute('id');
        $messagesSend = $this->chatTable->getChatSend($this->userId, $talkerId);
        $messagesReceive = $this->chatTable->getChatSend($talkerId, $this->userId);
        $dialogs = $this->chatTable->getChats($this->userId);
        foreach ($dialogs as $key => $item)
        {
            $dialogs[$key] = [
                'id' => $item,
                'first_name' => $this->userTable->selectUser($item)->getFirstName(),
                'last_name' => $this->userTable->selectUser($item)->getLastName(),
                'last_message' => $this->chatTable->getLastMessage($item, $this->userId)->getText(),
                'image' => $this->userTable->selectUser($item)->getImage(),
            ];
        }
        $letterForm = new Letter();
        $searchForm = new SearchDialog();
        $letterForm->setAttribute('action', $this->url()->fromRoute('chat',['action' => 'addMessage', 'id' => $talkerId]));
        $searchForm->setAttribute('action', $this->url()->fromRoute('chat'));

        return new ViewModel([
            'dialogs'     => $dialogs,
            'letter_form' => $letterForm,
            'search_form' => $searchForm,
            'message'     => $this->mergeChat($messagesSend, $messagesReceive)
        ]);
    }
    public function addMessageAction(){
        $talkerId = (int)$this->params()->fromRoute('id');
        $this->layout()->setTemplate('layout/clear');
        $form = new Letter();
        $form->get('send')->setValue('Add');
        $request = $this->getRequest();
        $text = $request->getPost()->toArray()['message'];
        $this->chatTable->createMessage($this->userId, $talkerId, $text);
        return $this->redirect()->toRoute('chat', ['action' => 'index', 'id' => $talkerId]);
    }
}
