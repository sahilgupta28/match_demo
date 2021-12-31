<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'dob',
        'gender',
        'occupation',
        'family_type',
        'annual_income',
        'manglik'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'gender' => 'integer'
    ];

    public function findAllMatch(): ?array
    {
        list('annual_income' => $annual_income,
            'occupation' => $occupation,
            'family_type' => $family_type,
            'manglik' => $manglik
            ) = (new Preference())->getLoginUserPreference();
        $gender = !auth()->user()->gender;
        
        return $this->where('gender', '!=', $gender)
            ->when($occupation, function($query, $occupation){
                return $query->whereIn('occupation', $occupation);
            })
            ->when($family_type, function($query, $family_type){
                return $query->whereIn('family_type', $family_type);
            })
            ->when($manglik, function($query, $manglik){
                return $query->whereIn('manglik', $manglik);
            })
            ->when($annual_income, function($query, $annual_income){
                return $query->whereBetween('annual_income', $annual_income);
            })
            ->get()
            ->toArray();
    }
}
