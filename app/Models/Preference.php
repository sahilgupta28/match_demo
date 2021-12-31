<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $fillable = [
        'occupation',
        'family_type',
        'annual_income',
        'manglik',
        'user_id'
    ];
    
    public function getLoginUserPreference(): array
    {
        $preference = $this->where('user_id', auth()->user()->id)->first();
        return  [
            'annual_income' => !empty($preference) && !empty($preference->annual_income) 
                ? json_decode($preference->annual_income) 
                : null,
            'occupation' => !empty($preference) && !empty($preference->occupation) 
                ? json_decode($preference->occupation) 
                : null ,
            'family_type' => !empty($preference) && !empty($preference->family_type) 
                ? json_decode($preference->family_type) 
                : null ,
            'manglik' => !empty($preference) && !empty($preference->manglik) 
                ? json_decode($preference->manglik) 
                : null 
        ];
    }
}
