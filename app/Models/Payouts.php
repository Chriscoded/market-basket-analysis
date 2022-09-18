<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payouts extends Model
{
    use HasFactory;
    protected $table = 'payouts';
    protected $primarykey = 'id';
    protected $fillable = ['no_transaction','nama_product','qty'];

    public function product()
    {
    	return $this->hasMany(Product::class);
    }

    public function transaction()
    {
    	return $this->hasMany(Transactioni::class, 'payout_id');
    }
    
    // public function user()
    // {
    // 	return $this->hasMany('App\Models\User');
    // }
}
