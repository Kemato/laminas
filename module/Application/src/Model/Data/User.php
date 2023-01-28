<?php

namespace Application\Model\Data;

class User
{
    public $id;
    public $firstName;
    public $lastName;
    public $patronymic;
    public $gender;
    public $birthday;
    public $skype;
    public $post;
    public $mainmail;
    public $phoneNumber;
    private $password;
    private $image;
    private $isActive;
    private $isAdmin;

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param string $patronymic
     */
    public function setPatronymic($patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * @param mixed $skype
     */
    public function setSkype($skype): void
    {
        $this->skype = $skype;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post): void
    {
        $this->post = $post;
    }

    public function getMail()
    {
        return $this->mainmail;
    }

    /**
     * @param mixed $main_mail
     */
    public function setMail(mixed $main_mail): void
    {
        $this->post = $main_mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }


    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->firstName = !empty($data['first_name']) ? $data['first_name'] : null;
        $this->lastName = !empty($data['last_name']) ? $data['last_name'] : null;
        $this->patronymic = !empty($data['patronymic']) ? $data['patronymic'] : null;
        $this->gender = !empty($data['gender']) ? $data['gender'] : null;
        $this->birthday = !empty($data['birthday']) ? $data['birthday'] : null;
        $this->skype = !empty($data['skype']) ? $data['skype'] : null;
        $this->post = !empty($data['post']) ? $data['post'] : null;
        $this->mainmail = !empty($data['main_mail']) ? $data['main_mail'] : null;
        $this->phoneNumber = !empty($data['phone_number']) ? $data['phone_number'] : null;
        $this->password = !empty($data['password']) ? $data['password'] : null;
        $this->image = !empty($data['avatar']) ? $data['avatar'] : null;
        $this->isActive = !empty($data['is_active']) ? $data['is_active'] : null;
        $this->isAdmin = !empty($data['is_admin']) ? $data['is_admin'] : null;
    }

    /**
     * @return mixed
     */
    public function getMainmail()
    {
        return $this->mainmail;
    }

    /**
     * @param mixed $mainmail
     */
    public function setMainmail($mainmail): void
    {
        $this->mainmail = $mainmail;
    }

}