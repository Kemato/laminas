<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\Signup\Registration;
use Application\Form\Signup\SignIn;
use Application\Model\Repository\PostRepository;
use Application\Model\Repository\UserRepository;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Application\Form\Signup\ForgotPassword;


class SignController extends AbstractActionController
{
    private object $postTable;
    private object $userTable;

    public function __construct(PostRepository $postTable, UserRepository $userTable)
    {
        $this->userTable = $userTable;
        $this->postTable = $postTable;
    }

    public function indexAction()
    {
        $posts = $this->postTable->fetchAll();
        $jobTitles = [];
        foreach ($posts as $key => $post) {
            $jobTitles[$key] = $post->getPost();
        }
        $this->layout()->setTemplate('layout/clear');
        $forgotPasswordForm = new ForgotPassword();
        $registrationForm = new Registration($jobTitles);
        $signInForm = new SignIn();
        $signInForm->setAttribute('action', $this->url()->fromRoute('sign', ['action' => 'sign']));
        $forgotPasswordForm->setAttribute('action', $this->url()->fromRoute('sign'));
        $registrationForm->setAttribute('action', $this->url()->fromRoute('sign', ['action' => 'registration']));

        return new ViewModel([
            'forgot_password_form' => $forgotPasswordForm,
            'registration_form'    => $registrationForm,
            'sign_in_form'         => $signInForm
        ]);
    }

    public function signAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $users = $this->userTable->selectAll();
        (int) $id = 0;
        $form = new SignIn();
        $form->get('sign_in')->setValue('Add');
        $request = $this->getRequest();

        $mailSign = $request->getPost()->toArray()['email'];
        $passwordSign = $request->getPost()->toArray()['password'];
        var_dump($mailSign, $passwordSign);
        foreach ($users as $user)
        {
            $password = $user->getPassword();
            $mail = $user->getMail();
            if($mailSign == $mail && $passwordSign == $password)
            {
                $id = $user->getId();
                break;
            }
        }
        if($id){
            return $this->redirect()->toRoute('profile');
        }
         else
        {
            return $this->redirect()->toRoute('sign');
        }
    }
    public function registrationAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $options = [];
        $form = new Registration($options);
        $form->get('create_account')->setValue('Add');
        $request = $this->getRequest();
        $mail = $request->getPost()->toArray()['email'];
        $password = $request->getPost()->toArray()['password'];
        $passwordConfirm = $request->getPost()->toArray()['confirm_password'];
        $jobTitle = $request->getPost()->toArray()['dropdown'];
        if($password == $passwordConfirm){
            $this->userTable->createUser($mail, $jobTitle, $password);
            return $this->redirect()->toRoute('profile');
        }
        else
        {
            return $this->redirect()->toRoute('sign');
        }
    }
}
