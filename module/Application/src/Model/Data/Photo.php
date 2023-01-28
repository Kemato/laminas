<?php

namespace Application\Model\Data;

class Photo
{
    public $id;
    public $title;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['post_id']) ? $data['post_id'] : null;
        $this->title = !empty($data['post_name']) ? $data['post_name'] : null;
    }
}