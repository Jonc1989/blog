<?php namespace App\Modules\Galleries\Helpers;

use Symfony\Component\HttpFoundation\Response;
class FileHelper
{

    public static function read( $full_path )
    {
        return Response::make( $full_path, 200 );
    }

}