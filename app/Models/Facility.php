<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facility extends Model
{
    protected $fillable = ['code', 'name', 'location_id'];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function damageReports(): HasMany
    {
        return $this->hasMany(DamageReport::class);
    }
}
?>
