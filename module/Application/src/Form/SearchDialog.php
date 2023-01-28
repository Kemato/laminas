<?php

declare(strict_types=1);

namespace Application\Form;

use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;

class SearchDialog extends Form
{
    const FORM_NAME = 'SearchDialog';

    public function __construct()
    {
        parent::__construct(self::FORM_NAME);

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'dialog',
            'options'    => [
                'label' => '',
            ],
            'attributes' => [
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 50,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control d-block',
                'title'        => 'Enter name',
                'placeholder'  => 'Enter username '
            ]
        ]);

        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'search',
            'attributes' => [
                'value' => 'Search',
                'class' => 'btn'
            ]
        ]);

    }
}