<?php

namespace App\Repositories;

use App\Models\ArchiveCall;
use App\Repositories\Interfaces\ArchiveCallRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ArchiveCallRepository implements ArchiveCallRepositoryInterface
{
    public function getAll(): Collection
    {
        return ArchiveCall::all();
    }
    
    public function getById(string $id): ArchiveCall
    {
        return ArchiveCall::find($id);
    }
    
    public function store(array $data): ArchiveCall
    {
        return ArchiveCall::create($data);
    }
}