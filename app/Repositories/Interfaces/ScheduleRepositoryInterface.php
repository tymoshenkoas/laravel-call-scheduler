<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Schedule;

interface ScheduleRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(string $id): Schedule;

    public function store(array $data): Schedule;

    public function delete(string $id): void;
}