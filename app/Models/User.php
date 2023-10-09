<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\UserAddress;
use DB;
use App\Notifications\ResetPassword as ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'ip_address',
        'is_email_verified',
        'login_with',
        'signup_via',
        'is_job_alert_enabled',
        'is_premium',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @overide
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
            'is_email_verified' => 1,
        ])->save();
    }

    /**
     * Get the social logins for the user.
     */
    public function socialLogins()
    {
        return $this->hasMany(UserSocialLogin::class);
    }


    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    
    /**
     * Job seacrh history for a perticular user.
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function userAddress(){
        return $this->hasOne(UserAddress::class)->whereDeletedAt(null);
    }

    public function getBlockStatus($user_id)
    {
        $user = User::find($user_id);

        if(!is_null($user)){
            if($user->is_block == 1){
                return "Block";
            }else{
                return "Unblock";
            }
        }
    }
}
