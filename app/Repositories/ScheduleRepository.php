<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function getAll(): Collection
    {
        return Schedule::all();
    }
    
    public function getById(int $id): Schedule
    {
        return Schedule::find($id);
    }
    
    public function store(array $data): Schedule
    {
        return Schedule::create($data);
    }
}