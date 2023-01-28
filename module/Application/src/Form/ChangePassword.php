<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class ChangePassword extends Form
{
    const FORM_NAME = 'ChangePassword';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);


        $this->add([
            'type'       => Element\Password::class,
            'name'       => 'old_password',
            'options'    => [
                'label' => 'Old Password',
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
            'name'       => 'new_password',
            'options'    => [
                'label' => 'New Password',
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
            'type'       => Element\Password::class,
            'name'       => 'confirm_new_password',
            'options'    => [
                'label' => 'Repeat New Password',
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
            'name'       => 'change_password',
            'attributes' => [
                'value' => 'Change Password',
                'class' => 'w-100 btn btn-lg btn-primary'
            ]
        ]);
    }
}