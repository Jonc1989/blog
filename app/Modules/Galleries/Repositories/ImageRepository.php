<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Images;
use App\Http\Repositories\Repository;
class ImageRepository extends Repository implements ImageRepositoryInterface
{
    public function __construct(Images $files)
    {
        $this->model = $files;
    }
}
