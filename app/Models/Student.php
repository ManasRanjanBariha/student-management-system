<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =['name','email','phone','address','department','regnno','photo'];

    public function setPhoneAttribute($value)
    {
        // Remove any non-numeric characters from the phone number
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
    }
}
