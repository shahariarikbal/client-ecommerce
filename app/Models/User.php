<?php

namespace App\Models;

use App\Models\Account;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    protected $guarded = [];

    public function role(){
    	return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
    public function student()
    {
        return $this->hasOne(Student::class)->with('department');
    }
    public function accounts()
    {
        return $this->hasMany(Account::class, 'student_id');
    }
}
