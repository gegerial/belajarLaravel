<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 't_login';
    public $primaryKey = 'id_login';

	protected $fillable = [
		'nama_user', 'username', 'password',
	];
	
    protected $hidden = [
        'password', 'remember_token',
    ];
}
