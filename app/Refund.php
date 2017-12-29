<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $dates = [
        'accepted_at',
        'amounts_updated_at',
    ];

    /**
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Limits results to only unprocessed refunds
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnlyUnprocessed(Builder $query)
    {
        return $query->whereNull('amounts_updated_at');
    }
}
