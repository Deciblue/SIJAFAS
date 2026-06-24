<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = ['building', 'room', 'floor'];

    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class);
    }
}
?>
