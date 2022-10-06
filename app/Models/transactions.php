<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'TransactionType',
        'Description',
        'Amount',
        'UserId',
        //'UserId',
    ];

    protected $guarded = [];
    protected function user(){
        return $this->belongsTo(User::class);
    }
}
