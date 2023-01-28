<?php

declare(strict_types=1);

namespace Application\Form\Signup;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Application\Form\Other\Options;
use Laminas\Http\Request;


class Registration extends Form
{
    const FORM_NAME = 'Registration';

    public function __construct($jobTitleOptions)
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
            'type'       => Element\Select::class,
            'name'       => 'dropdown',
            'class'      => 'custom-select w-30',
            'attributes' => [
                'required'    => true,
                'data-toggle' => 'tooltip',
                'class'       => 'form-control',
            ],
            'options'    => [
                'label'         => 'Select your Post',
                'value_options' => $jobTitleOptions,
                ],
        ]);

        $this->add([
            'type'       => Element\Password::class,
            'name'       => 'password',
            'options'    => [
                'label' => 'Password',
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 25,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Password must have between 8 and 25 characters',
                'placeholder'  => 'Enter Your Password'
            ]
        ]);

        $this->add([
            'type'       => Element\Password::class,
            'name'       => 'confirm_password',
            'options'    => [
                'label' => 'Verify Password',
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 25,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Password must match that provided above',
                'placeholder'  => 'Enter Your Password Again'
            ]
        ]);

        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'create_account',
            'attributes' => [
                'value' => 'Create Account',
                'class' => 'w-100 btn btn-lg btn-primary'
            ]
        ]);

    }
}
