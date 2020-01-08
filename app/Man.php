<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mont4\Filter\Filterable;

class Man extends Model
{
    use Filterable;

    const STATUS_ACTIVE   = 'active';
    const STATUS_INACTIVE = 'inactive';

    const STATUSES = [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];

    public function ScopeActive($query)
    {
        return $query->where('status' ,'active')->get();
    }
}
