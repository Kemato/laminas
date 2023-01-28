<?php

declare(strict_types=1);

namespace Application\Form;

use Application\Form\Other\Options;
use Application\Model\Repository\UserRepository;
use Application\Model\Data\User;
use Laminas\Form\Form;
use Laminas\Form\Element;
use Laminas\Http\Request;


class AdminSettings extends Form
{
    const FORM_NAME = 'AdminSettings';
    const MIN_AGE = 18;

    public function __construct(User $user, $jobTitles, $genderOptions)
    {
        parent::__construct(self::FORM_NAME);
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $patronymic = $user->getPatronymic();
        $birthday = $user->getBirthday();
        $skype = $user->getSkype();
        $gender = $user->getGender();
        $title = $user->getPost();
        $active = $user->getIsActive();
        $admin = $user->getIsAdmin();

        $this->setAttribute('method', Request::METHOD_POST);

        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'firstName',
            'options'    => [
                'label' => 'Name'
            ],
            'attributes' => [
                'value'        => $firstName,
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 50,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control d-block    ',
                'title'        => 'Enter Your Name',
                'placeholder'  => 'Enter Your Name'
            ]
        ]);
        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'lastName',
            'options'    => [
                'label' => 'Surname'
            ],
            'attributes' => [
                'value'        => $lastName,
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 50,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control d-block',
                'title'        => 'Enter Your Surname',
                'placeholder'  => 'Enter Your Surname'
            ]
        ]);
        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'patronymic',
            'options'    => [
                'label' => 'Patronymic'
            ],
            'attributes' => [
                'value'        => $patronymic,
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 50,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control d-block',
                'title'        => 'Enter Patronymic',
                'placeholder'  => 'Enter Patronymic'
            ]
        ]);
        $this->add([
            'type'       => Element\Text::class,
            'name'       => 'skype',
            'options'    => [
                'label' => 'Skype',

            ],
            'attributes' => [
                'value'        => $skype,
                'required'     => true,
                'size'         => 40,
                'maxlength'    => 50,
                'autocomplete' => false,
                'data-toggle'  => 'tooltip',
                'class'        => 'form-control d-block',
                'title'        => 'Enter skype',
                'placeholder'  => 'Enter skype'
            ]
        ]);

        $this->add([
            'type'       => Element\Select::class,
            'name'       => 'gender',
            'options'    => [
                'label'         => 'Gender',
                'empty_option'  => 'Select...',
                'value_options' => $genderOptions
            ],
            'attributes' => [
                'value'    => $gender,
                'required' => true,
                'class'    => 'custom-select',
            ]
        ]);

        $this->add([
            'type'       => Element\Select::class,
            'name'       => 'title',
            'options'    => [
                'label'         => 'Title',
                'empty_option'  => 'Select...',
                'value_options' => $jobTitles
            ],
            'attributes' => [
                'value'    => $title,
                'required' => true,
                'class'    => 'custom-select',
            ]
        ]);

        $this->add([
            'type'       => Element\Select::class,
            'name'       => 'active',
            'options'    => [
                'label'         => 'Active',
                'value_options' => ['No', 'Yes'],
            ],
            'attributes' => [
                'value'    => $active,
                'required' => true,
                'class'    => 'custom-select',
            ]
        ]);

        $this->add([
            'type'       => Element\Select::class,
            'name'       => 'admin',
            'options'    => [
                'label'         => 'Admin',
                'value_options' => ['No', 'Yes'],
            ],
            'attributes' => [
                'value'    => $admin,
                'required' => true,
                'class'    => 'custom-select',
            ]
        ]);


        $this->add([
            'type'       => Element\DateSelect::class,
            'name'       => 'birthday',
            'options'    => [
                'label'               => 'Select Your Date of Birth',
                'create_empty_option' => true,
                'max_year'            => date('Y') - self::MIN_AGE,
                'render_delimiters'   => false,
                'year_attributes'     => [
                    'class' => 'custom-select w-30'
                ],
                'month_attributes'    => [
                    'class' => 'custom-select w-30'
                ],
                'day_attributes'      => [
                    'class' => 'custom-select w-30',
                    'id'    => 'day'
                ],
            ],
            'attributes' => [
                'value'    => $birthday,
                'required' => true
            ]
        ]);
        $this->add([
            'type'       => Element\Submit::class,
            'name'       => 'edit_profile',
            'attributes' => [
                'value' => 'Edit Profile',
                'class' => 'btn btn-class'
            ]
        ]);

    }
}