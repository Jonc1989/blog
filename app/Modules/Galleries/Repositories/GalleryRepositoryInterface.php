<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Gallery;

interface GalleryRepositoryInterface
{
    public function __construct(Gallery $gallery);

    public function saveName( $name );

    public function galleries( $id );

    public function gallery( $id );

}