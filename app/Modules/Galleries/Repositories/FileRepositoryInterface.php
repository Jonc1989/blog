<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Files;

interface FileRepositoryInterface
{
    public function __construct(Files $files);


}