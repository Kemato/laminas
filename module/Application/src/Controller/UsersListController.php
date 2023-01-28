<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Other\Options;
use Application\Model\Repository\MailRepository;
use Application\Model\Repository\PhoneRepository;
use Application\Model\Repository\PostRepository;
use Application\Model\Repository\UserRepository;
use Application\Model\User;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class UsersListController extends AbstractActionController
{

    private $usersTable;
    private $postTable;
    private $jobTitle;

    public function __construct(UserRepository $usersTable, PostRepository $postTable)
    {

        $this->usersTable = $usersTable;
        $this->postTable = $postTable;
        foreach ($this->postTable->fetchAll() as $key => $item)
        {
            $this->jobTitle[$item->getId()] = $item->getPost();
        }

    }
    public function userAction()
    {


        return new ViewModel([
            'users' => $this->usersTable->selectAll(),
            'job_title'  => $this->jobTitle
        ]);
    }
    public function adminAction()
    {
        return new ViewModel([
            'users' => $this->usersTable->selectAll(),
            'job_title'  => $this->jobTitle
        ]);
    }
}
