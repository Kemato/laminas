<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\NewEmail;
use Application\Form\NewMobile;
use Application\Form\ProfileSettings;
use Application\Form\AdminSettings;
use Application\Model\Repository\ImageRepository;
use Application\Model\Repository\MailRepository;
use Application\Model\Repository\PhoneRepository;
use Application\Model\Repository\PostRepository;
use Application\Model\Repository\UserRepository;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;


class ProfileController extends AbstractActionController
{
    private $mailTable;
    private $phoneTable;
    private $usersTable;
    private $postTable;
    private $userId = 10;
    private $jobTitle;

    public function __construct(MailRepository $mailTable, PhoneRepository $phoneTable, UserRepository $usersTable, PostRepository $postTable)
    {
        $this->mailTable = $mailTable;
        $this->phoneTable = $phoneTable;
        $this->usersTable = $usersTable;
        $this->postTable = $postTable;
        foreach ($this->postTable->fetchAll() as $item) {
            $this->jobTitle[$item->getId()] = $item->getPost();
        }
    }

    public function indexAction()
    {
        $id = $this->userId;
        $user = $this->usersTable->selectUser($id);
        $phones = $this->phoneTable->selectOne($id);
        $mails = $this->mailTable->selectOne($id);
        $title = $this->postTable->getTitle($user->getPost());
        return new ViewModel([
            'phones'    => $phones,
            'mails'     => $mails,
            'data_user' => $user,
            'job_title' => $title
        ]);
    }

    public function editAction()
    {
        $id = $this->userId;
        $user = $this->usersTable->selectUser($id);

        $phones = $this->phoneTable->selectOne($id);
        $mails = $this->mailTable->selectOne($id);
        $post = $this->postTable->getTitle($user->getPost());
        $profileEditForm = new ProfileSettings($user);
        $newMobileNumberForm = new NewMobile();
        $newEmailForm = new NewEmail();
        $profileEditForm->setAttribute('action', $this->url()->fromRoute('profile', ['action' => 'updateUser']));
        $newMobileNumberForm->setAttribute('action', $this->url()->fromRoute('profile_edit', ['action' => 'addPhone']));
        $newEmailForm->setAttribute('action', $this->url()->fromRoute('profile_edit', ['action' => 'addMail']));


        return new ViewModel([
            'new_mobile_number_form' => $newMobileNumberForm,
            'new_email_form'         => $newEmailForm,
            'profile_edit_form'      => $profileEditForm,
            'phones'                 => $phones,
            'mails'                  => $mails,
            'job_title'              => $this->postTable->getTitle($user->getPost())->getPost(),
            'image'                  => $user->getImage(),
        ]);
    }

    public function adminEditAction()
    {
        $this->layout()->setTemplate('layout/layout_admin');
        $id = (int)$this->params()->fromRoute('id');
        $user = $this->usersTable->selectUser($id);
        $genderOptions = ['', 'Man', 'Woman'];
        $profileEditForm = new AdminSettings($user, $this->jobTitle, $genderOptions);
        $newMobileNumberForm = new NewMobile();
        $newEmailForm = new NewEmail();
        $profileEditForm->setAttribute('action', $this->url()->fromRoute('profile', ['action' => 'updateAdmin', 'id' => $id]));
        $newMobileNumberForm->setAttribute('action', $this->url()->fromRoute('profile_edit', ['action' => 'addPhoneAdmin', 'id' => $id]));
        $newEmailForm->setAttribute('action', $this->url()->fromRoute('profile_edit', ['action' => 'addMailAdmin', 'id' => $id]));
        return new ViewModel([
            'new_mobile_number_form' => $newMobileNumberForm,
            'new_email_form'         => $newEmailForm,
            'profile_edit_form'      => $profileEditForm,
            'mobiles'                => $this->phoneTable->selectOne($id),
            'mails'                  => $this->mailTable->selectOne($id),
            'image'                  => $user->getImage(),
        ]);
    }

    public function deleteMailAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $id = (int)$this->params()->fromRoute('id');
        $this->mailTable->deleteMail($id);
        return $this->redirect()->toRoute('profile_edit');
    }

    public function deletePhoneAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $id = (int)$this->params()->fromRoute('id');
        $this->phoneTable->deletePhone($id);
        return $this->redirect()->toRoute('profile_edit');
    }

    public function addMailAction()
    {
        $id = $this->userId;
        $this->layout()->setTemplate('layout/clear');
        $form = new NewEmail();
        $form->get('add_email')->setValue('Add');
        $request = $this->getRequest();
        $newMail = $request->getPost()->toArray()['email'];
        $this->mailTable->createMail($newMail, $id);
        return $this->redirect()->toRoute('profile_edit');
    }

    public function addPhoneAction()
    {
        $id = $this->userId;
        $this->layout()->setTemplate('layout/clear');
        $form = new NewMobile();
        $form->get('add_number')->setValue('Add');
        $request = $this->getRequest();
        $newPhone = $request->getPost()->toArray()['telephone'];
        $this->phoneTable->createPhone($newPhone, $id);
        return $this->redirect()->toRoute('profile_edit');
    }
    public function addMailAdminAction()
    {
        $id = (int)$this->params()->fromRoute('id');
        $this->layout()->setTemplate('layout/clear');
        $form = new NewEmail();
        $form->get('add_email')->setValue('Add');
        $request = $this->getRequest();
        $newMail = $request->getPost()->toArray()['email'];
        $this->mailTable->createMail($newMail, $id);
        return $this->redirect()->toRoute('profile', ['action' => 'adminEdit', 'id' => $id]);
    }
    public function addPhoneAdminAction()
    {
        $id = (int)$this->params()->fromRoute('id');
        $this->layout()->setTemplate('layout/clear');
        $form = new NewMobile();
        $form->get('add_number')->setValue('Add');
        $request = $this->getRequest();
        $newPhone = $request->getPost()->toArray()['telephone'];
        $this->phoneTable->createPhone($newPhone, $id);
        return $this->redirect()->toRoute('profile', ['action' => 'adminEdit', 'id' => $id]);
    }

    public function updateUserAction()
    {
        $id = $this->userId;
        $user = $this->usersTable->selectUser($id);
        $form = new ProfileSettings((object)$user);
        $form->get('edit_profile')->setValue('Add');
        $request = $this->getRequest();

        $firstName = $request->getPost()->toArray()['firstName'];
        $lastName = $request->getPost()->toArray()['lastName'];
        $patronymic = $request->getPost()->toArray()['patronymic'];
        $gender = $request->getPost()->toArray()['gender'];
        $birthday = $request->getPost()->toArray()['birthday'];
        $skype = $request->getPost()->toArray()['skype'];
        $this->usersTable->updateUser($firstName, $lastName, $patronymic, $gender, $birthday, $skype, $id);
        return $this->redirect()->toRoute('profile');
    }

    public function updateAdminAction()
    {
        $id = (int)$this->params()->fromRoute('id');
        $user = $this->usersTable->selectUser($id);
        $genderOption = [];
        $form = new AdminSettings($user, $genderOption, $genderOption);
        $form->get('edit_profile')->setValue('Add');
        $request = $this->getRequest();

        $firstName = $request->getPost()->toArray()['firstName'];
        $lastName = $request->getPost()->toArray()['lastName'];
        $patronymic = $request->getPost()->toArray()['patronymic'];
        $gender = $request->getPost()->toArray()['gender'];
        $birthday = $request->getPost()->toArray()['birthday'];
        $skype = $request->getPost()->toArray()['skype'];
        $post = $request->getPost()->toArray()['title'];
        $isActive = $request->getPost()->toArray()['active'];
        $isAdmin = $request->getPost()->toArray()['admin'];
        $this->usersTable->updateAdmin(
            $firstName,
            $lastName,
            $patronymic,
            $gender,
            $birthday,
            $skype,
            $post,
            $isActive,
            $isAdmin,
            $id);
        return $this->redirect()->toRoute('profile', ['action' => 'adminEdit', 'id' => $id]);
    }
}
