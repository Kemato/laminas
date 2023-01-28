<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Form\NewJobTitle;
use Application\Model\Repository\PostRepository;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class JobTitleController extends AbstractActionController
{
    private $postTable;
    public function __construct(PostRepository $postTable)
    {
        $this->postTable = $postTable;
    }
    public function indexAction()
    {
        $newTitleForm = new NewJobTitle();
        $jobTitle = $this->postTable->fetchAll();
        $newTitleForm->setAttribute('action', $this->url()->fromRoute('title', ['action' =>'add']));

        return new ViewModel([
                'new_title_form' => $newTitleForm,
                'title'          => $jobTitle
            ]
        );
    }
    public function addAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $form = new NewJobTitle();
        $form->get('add_title')->setValue('Add');
        $request = $this->getRequest();
        $newTitle = $request->getPost()->toArray()['title'];
        $this->postTable->createPost($newTitle);
        return $this->redirect()->toRoute('title');
    }
    public function deleteAction()
    {
        $this->layout()->setTemplate('layout/clear');
        $id = (int)$this->params()->fromRoute('id');
        $this->postTable->deletePost($id);
        return $this->redirect()->toRoute('title');
    }
}
