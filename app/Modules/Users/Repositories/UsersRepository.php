<?php namespace App\Modules\Users\Repositories;

use App\Http\Repositories\Repository;
use App\Modules\Users\Models\User;

class UsersRepository extends Repository implements UsersRepositoryInterface   
{
    /**
     * UsersRepository constructor.
     * @param Users $users
     */
    public function __construct( User $user )
    {
        $this->model = $user;
    }
    
    public function getAll()
    {
        //
    }

    public function searchBy( $attribute1, $attribute2, $value ) {
        return $this->model->where( $attribute1, 'like', '%' . $value . '%')
            ->orWhere( $attribute2, 'like', '%' . $value . '%')->get();
    }

    public function updateOnlineStats($id, $online)
    {
        $user = $this->model->find($id);
        $user->online = $online;
        $user->save();
    }
}
