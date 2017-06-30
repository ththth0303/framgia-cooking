<?php

namespace App\Models\Relations;

trait RateRelations extends Model
{
    public function rateTable()
    {
        return $this->morphTo();
    }
}
