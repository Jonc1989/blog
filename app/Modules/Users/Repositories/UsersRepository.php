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

    public function searchBy( $attribute1, $attribute2, $value )
    {
        $package = explode( ' ', $value );
        $count = count($package);
        foreach ( $package as $key ){
            return $this->model
                ->where( $attribute1, 'like', '%' . $key . '%')
                ->orWhere( $attribute2, 'like', '%' . $key . '%')->get();
        }
//        if( $count == 1 ){
//            return $this->model
//                ->where( $attribute1, 'like', '%' . $value . '%')
//                ->orWhere( $attribute2, 'like', '%' . $value . '%')->get();
//        }else if( $count == 2 ){
//            return $this->model
//                ->where( $attribute1, 'like', '%' . $package[0] . '%')
//                ->orWhere( $attribute2, 'like', '%' . $package[0] . '%')
//                ->orWhere( $attribute1, 'like', '%' . $package[1] . '%')
//                ->orWhere( $attribute2, 'like', '%' . $package[1] . '%')->get();
//        }else{
//            
//        }






    }

    public function updateOnlineStats($id, $online)
    {
        $user = $this->model->find($id);
        $user->online = $online;
        $user->save();
    }
    
    public function onlineUsers( $details )
    {
        return $this->model->where( 'id', '!=', \Auth::user()->id )->where( 'online', 1 )->get( $details );
    }
}
