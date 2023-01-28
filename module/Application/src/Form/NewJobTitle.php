<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class NewJobTitle extends Form
{
    const FORM_NAME = 'NewJobTitle';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'title',
            'options'    => [
                'label' => 'Add New Title'
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 30,
                'maxlength'    => 30,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Add new title ',
                'placeholder'  => 'Enter New Title'
            ]
        ]);
        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'add_title',
            'attributes' => [
                'value' => 'Add New Title',
                'class' => 'btn btn-class'
            ]
        ]);
    }
}