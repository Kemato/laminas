<?php

declare(strict_types=1);

namespace Application\Form\Other;


use Application\Model\Repository\PostRepository;

class Options
{
    private $postTable;
    public function __construct(PostRepository $postTable)
    {
        $this->postTable = $postTable;
    }

    private array $genderOptions = [
        'Man'   => 'Man',
        'Woman' => 'Woman'
    ];

    public function getJobTitleOptions(): object
    {
        return $this->postTable;
    }

    public function getGenderOptions(): array
    {
        return $this->genderOptions;
    }
}
