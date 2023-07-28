<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use App\Models\ArchiveCall;

interface ArchiveCallRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(string $id): ArchiveCall;

    public function store(array $data): ArchiveCall;
}