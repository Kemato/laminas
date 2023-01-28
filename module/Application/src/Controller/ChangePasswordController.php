<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Model\Repository\UserRepository;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Form\ChangePassword;

class ChangePasswordController extends AbstractActionController
{
    private object $userTable;

    public function __construct(UserRepository $userTable)
    {
        $this->userTable = $userTable;
    }
    public function indexAction()
    {
        $changePassword = new ChangePassword();
        $changePassword->setAttribute('action', $this->url()->fromRoute('change_password', ['action' => 'change']));
        return new ViewModel(['change_password' => $changePassword]);
    }
    public function changeAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $id = 1;
        $changePassword = new ChangePassword();
        $changePassword->get('change_password')->setValue('Add');
        $request = $this->getRequest();
        $password = $request->getPost()->toArray()['new_password'];
        $passwordUser = $this->userTable->selectUser($id)->getPassword();
        $passwordOld = $request->getPost()->toArray()['old_password'];
        $passwordConfirm = $request->getPost()->toArray()['confirm_new_password'];
        if($password == $passwordConfirm && $passwordOld == $passwordUser){
            $this->userTable->changePassword($password, $id);
            return $this->redirect()->toRoute('profile');
        }
        else
        {
            return $this->redirect()->toRoute('change');
        }
    }
}
