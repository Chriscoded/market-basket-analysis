<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['users_id','nama_product','qty','jenis','bv'];
    protected $hidden = ['created_at','updated_at'];

    public function users()
    {
    	return $this->belongsTo(User::class);
	}

    public function detail()
    {
    	return $this->hasMany(ProductDetail::class);
	}
    
    public function payout()
    {
        return $this->belongsTo(Payouts::class);
    }
}
