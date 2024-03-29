<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'member_type',
    ];

    /**
     * Get the transactions for the blog post.
     */
    public function transactions(): HasMany {
        return $this->hasMany( Transaction::class );
    }
}
