<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReview extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'product_id', 'user_id', 'rating', 'review'
    ];
}
