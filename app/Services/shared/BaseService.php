<?php

namespace App\Services\shared;

use App\Repositories\shared\BaseRepository;

abstract class BaseService
{
    protected BaseRepository $repository;

    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all()
    {
        return $this->repository->all();
    }

    public function getById(int|string $id, ?array $with = [], ?array $appends = [])
    {
        return $this->repository->getBy('id', $id, $with, $appends);
    }

    public function store(array $data): \App\Models\shared\BaseModel
    {
        return $this->repository->save($data);
    }

    /**
     * Update a record.
     */
    public function update(int|string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete a record.
     */
    public function destroy(int|string $id): void
    {
        $this->repository->destroy($id);
    }

    /**
     * Restore a record.
     */
    public function restore(int|string $id)
    {
        return $this->repository->restore($id);
    }
}
