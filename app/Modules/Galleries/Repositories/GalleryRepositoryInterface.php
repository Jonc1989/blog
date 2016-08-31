<?php namespace App\Modules\Galleries\Repositories;

use App\Modules\Galleries\Models\Gallery;
use App\Modules\Friends\Repositories\FriendsRepositoryInterface;
interface GalleryRepositoryInterface
{
    public function __construct( Gallery $gallery, FriendsRepositoryInterface $friends );

    public function saveName( $name );

    public function galleries( $auth );

    public function gallery( $id );

}