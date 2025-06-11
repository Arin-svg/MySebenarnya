<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicUser extends Model
{
    use HasFactory;

    protected $table = 'public_users'; // Optional if Laravel naming convention is followed

    protected $primaryKey = 'PU_ID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'PU_ID', 'PU_Name', 'PU_IC', 'PU_Age', 'PU_Address',
        'PU_Email', 'PU_PhoneNum', 'PU_Gender', 'PU_Password'
    ];
}
