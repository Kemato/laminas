<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class Letter extends Form
{
    const FORM_NAME = 'Letter';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'message',
            'options'    => [
                'label' => 'Email Address'
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 300,
                'maxlength'    => 255,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'placeholder'  => 'Your message...',
                'class'        => 'form-control',
            ]
        ]);
        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'send',
            'attributes' => [
                'value' => 'Send',
                'class' => 'btn wtext',
            ]
        ]);
    }
}