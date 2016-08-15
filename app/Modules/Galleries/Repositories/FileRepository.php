<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Files;
use App\Http\Repositories\Repository;
class FileRepository extends Repository implements FileRepositoryInterface
{
    public function __construct(Files $files)
    {
        $this->model = $files;
    }
}
