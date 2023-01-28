<?php

declare(strict_types=1);

namespace Application\Form\Signup;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class ForgotPassword extends Form
{
    const FORM_NAME = 'ForgotPassword';

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
                'pattern'      => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$',
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Provide a valid and working email address',
                'placeholder'  => 'Enter Your Email Address'
            ]
        ]);

        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'forgot_password',
            'attributes' => [
                'value' => 'Send new password',
                'class' => 'w-100 btn btn-lg btn-primary'
            ]
        ]);

    }
}