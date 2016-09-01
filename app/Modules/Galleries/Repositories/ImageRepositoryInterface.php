<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Images;

interface ImageRepositoryInterface
{
    public function __construct(Images $files);


}