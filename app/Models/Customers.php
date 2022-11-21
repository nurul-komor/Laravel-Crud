<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customers extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = "customers";
    protected $id = "id";
    public function setUsernameAttribute($username){
        $this->attributes['username'] = strtolower(str_replace(' ','',$username));
        
    }
    public function setBirthdayAttribute($date){
        date_default_timezone_set('Asia/Dhaka');
        $this->attributes['birthday'] = date('Y-m-d',strtotime($date));
        
    }
    public function getBirthdayAttribute($date){
        return date('d-m-Y',strtotime($date));
    }
}