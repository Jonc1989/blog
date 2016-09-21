<?php namespace App\Modules\Common\Repositories;

use App\Modules\Common\Models\Ratings;
use App\Http\Repositories\Repository;
class RatingRepository extends Repository implements RatingRepositoryInterface
{
    public function __construct( Ratings $ratings )
    {
        $this->model = $ratings;
    }

    public function rate( $data )
    {
        if( $data[ 'id' ] != '' || $data[ 'id' ] != null || $data[ 'id' ] ){
            $response = $this->model->find($data[ 'id' ])->update( $data );
        }else{
            $response = $this->model->create( $data );
        }
        return $response;
    }

}
