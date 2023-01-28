<?php

namespace Application\Model\Data;

class Post
{
    private $id;
    private $post;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['post_id']) ? $data['post_id'] : null;
        $this->post = !empty($data['post_name']) ? $data['post_name'] : null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $title
     */
    public function setPost($post): void
    {
        $this->post = $post;
    }

}