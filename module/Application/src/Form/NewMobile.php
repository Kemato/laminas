<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class NewMobile extends Form
{
    const FORM_NAME = 'NewMobile';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Tel::class,
            'name'       => 'telephone',
            'options'    => [
                'label' => 'New Mobile Number'
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 12,
                'maxlength'    => 12,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control',
                'title'        => 'Add new mobile number',
                'placeholder'  => 'Enter Your New Number'
            ]
        ]);
        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'add_number',
            'attributes' => [
                'value' => 'Add New Number',
                'class' => 'btn btn-class'
            ]
        ]);
    }
}