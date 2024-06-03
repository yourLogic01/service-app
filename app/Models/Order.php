<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [ 'user_id', 'teknisi_id', 'item_id', 'status', 'date', 'address', 'description', 'item_picture', 'price'];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
