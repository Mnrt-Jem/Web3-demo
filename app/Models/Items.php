<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property int    $updated_at
 * @property int    $created_at
 * @property string $summary
 * @property string $nft_url
 * @property string $name
 * @property string $quantity
 * @property string $bonus
 * @property string $price
 */
class Items extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'updated_at', 'summary', 'nft_url', 'name', 'quantity', 'bonus', 'price', 'created_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'timestamp', 'summary' => 'string', 'nft_url' => 'string', 'name' => 'string', 'quantity' => 'string', 'bonus' => 'string', 'price' => 'string', 'created_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'updated_at', 'created_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;

    // Scopes...

    // Functions ...
    public static function getItems()
    {
        return DB::select('SELECT * FROM items');
    }
    public static function getItemAvailable($itemId)
    {
        return DB::selectOne('SELECT item_id,(items.quantity - SUM(user_items.quantity)) as available  FROM `user_items` LEFT JOIN items ON user_items.item_id = items.id WHERE user_items.item_id='.$itemId.' GROUP BY item_id ');
    }
    // Relations ...
}
