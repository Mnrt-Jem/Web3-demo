<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'eth_address',
        'current_team_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function getUser($id)
    {
        return DB::selectOne('SELECT * FROM users WHERE id = '.$id);
    }
    public static function getUserReward($id)
    {
        return DB::selectOne('SELECT * FROM rewards WHERE user_id = '.$id);
    }
    public static function getUserInventory($id)
    {
        return DB::select('SELECT * FROM user_items LEFT JOIN items ON user_items.item_id = items.id WHERE user_id = '.$id);
    }
    public static function setUserItem($userId, $itemId)
    {
        $userItems = DB::selectOne('SELECT * FROM user_items WHERE user_id='.$userId.' and item_id='.$itemId);
        if ($userItems === NULL) {
            $user_item = New UserItems();
            $user_item->user_id = $userId;
            $user_item->item_id = $itemId;
            $user_item->quantity = 1;
            $user_item->save();
        } else {
            $newQuantity = $userItems->quantity + 1;
            DB::update('UPDATE user_items SET quantity = ? WHERE user_id = ? and item_id=?',[$newQuantity,$userId,$itemId]);
        }
    }
}
