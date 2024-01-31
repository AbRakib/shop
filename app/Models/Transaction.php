<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model {
    use HasFactory;
    protected $fillable = [
        'member_id',
        'amount',
        'payment_type',
        'notes',
    ];

    /**
     * Get the member that owns the comment.
     */
    public function member(): BelongsTo {
        return $this->belongsTo( Member::class );
    }
}
