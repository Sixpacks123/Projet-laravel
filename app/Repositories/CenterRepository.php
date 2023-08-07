<?php

namespace App\Repositories;

use App\Interfaces\CenterInterface;
use App\Models\Center;
use Illuminate\Database\Eloquent\Collection;

class CenterRepository implements CenterInterface
{
    protected Center $center;

    public function __construct(Center $center)
    {
        $this->center = $center;
    }

    public function getCenters(): Collection
    {
        return $this->center->all();
    }

}
