<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Upload the image avatar */
    public static function uploadAvatar($image)
    {
        $avatarName = $image->getClientOriginalName(); // get the original name of the image uploaded
        (new self())->deleteOldAvatar();
        $image->storeAs("images", $avatarName, "public"); // save the image uploaded
        auth()->user()->update(['avatar' => $avatarName]); // save the original name in current User Table
    }

    /* Delete the old avatar if exists */
    protected function deleteOldAvatar()
    {
        if ($this->avatar) {
            Storage::delete("public/images/" . $this->avatar);
        }
    }

    // todos relationship
    public function todos()
    {
        // default foreign key is 'user_id' in our case
        return $this->hasMany(Todo::class);
    }

}
