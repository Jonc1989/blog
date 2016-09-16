<?php namespace App\Modules\Users\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Users\Models\Visitors;

class VisitorRepository extends Repository implements VisitorRepositoryInterface   
{
    /**
     * UsersRepository constructor.
     * @param Visitors $visitors
     */
    public function __construct( Visitors $visitors )
    {
        $this->model = $visitors;
    }

    public function allGuests( $id )
    {
        return $this->model->where( 'user_id', $id )->with( 'visitor' )->paginate();
    }

    public function makeVisitor( $id )
    {
        $data = $this->model->firstOrNew( [
            'user_id'       => $id,
            'visitor_id'    => \Auth::id()
        ]);

        $data->save();
        $data->touch();

        return true;
    }
   
}
