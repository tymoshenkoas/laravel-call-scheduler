<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Schedule;

interface ScheduleRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): Schedule;

    public function store(array $data): Schedule;
}