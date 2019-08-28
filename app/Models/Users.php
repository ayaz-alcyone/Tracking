<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * The table associated with model
     * @var string
     */
    protected $table = 'users';



    /**
     * Updates specified resource in storage
     * @param Id, Options
     * @return mixed
     */
   /* public function updateUser($id, $options){
        $user   =   $this->where('id', $id)->first();
        $user->firstname         =   $options['firstname'];
        $user->lastname         =   $options['lastname'];
        $user->email        =   $options['email'];
		if(!empty($options['privilege_parent_master_id'])){
			$user->user_permission_id = implode(',',$options['privilege_parent_master_id']);
		}
		//$user->user_permission_id        =   $options['user_permission_id'];
      //  $user->group_id     =   $options['groups'];
        ($options['password'] != "") ? $user->password  =   bcrypt($options['password']) : $user->password  =   $user->password ;
        $user->save();

        return $user;
    }

    public function group(){
        return $this->belongsTo('App\Models\Groups', 'group_id', 'id');
    }*/
}
