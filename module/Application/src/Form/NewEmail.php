<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class NewEmail extends Form
{
    const FORM_NAME = 'NewEmail';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Email::class,
            'name'       => 'email',
            'options'    => [
                'label' => 'Email Address'
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 128,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Provide a valid and working email address',
                'placeholder'  => 'Enter Your Email Address'
            ]
        ]);
        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'add_email',
            'attributes' => [
                'value' => 'Add New Email',
                'class' => 'btn btn-class'
            ]
        ]);
    }
}