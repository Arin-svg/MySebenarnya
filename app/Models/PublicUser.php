<?php

// app/Models/PublicUser.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class PublicUser extends Authenticatable
{
    protected $table = 'publicuser';
    protected $primaryKey = 'PU_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'PU_ID', 'PU_Name', 'PU_IC', 'PU_Age', 'PU_Address',
        'PU_Email', 'PU_PhoneNum', 'PU_Gender',
        'PU_Password', 'PU_ProfilePicture'
    ];

    protected $hidden = ['PU_Password'];

    public function setPUPasswordAttribute($value)
    {
        $this->attributes['PU_Password'] = Hash::make($value);
    }
}


