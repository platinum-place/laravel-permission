<?php

namespace App\Repositories\shared;

use App\Models\shared\BaseModel;
use Illuminate\Support\Facades\Gate;

abstract class BaseRepository
{
    protected BaseModel $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        Gate::authorize('viewAny', $this->model);

        return $this->model->paginate();
    }

    protected function newQuery(?array $with = [])
    {
        return $this->model
            ->newQuery()
            ->with($with);
    }

    public function getBy(string $field, mixed $value, ?array $with = [], ?array $appends = [])
    {
        Gate::authorize('view', $this->model);

        return $this->newQuery($with)
            ->where($field, $value)
            ->firstOrFail()
            ->setAppends($appends);
    }

    public function save(array $data): BaseModel
    {
        Gate::authorize('create', $this->model);

        $this->model->fill($data);
        $this->model->save();

        return $this->model;
    }

    public function update(int|string $id, array $data)
    {
        Gate::authorize('update', $this->model);

        $this->model = $this->getBy('id', $id);

        $this->model->update($data);
        $this->model->fresh();

        return $this->model;
    }

    public function destroy(int|string $id): void
    {
        Gate::authorize('delete', $this->model);

        $this->model = $this->getBy('id', $id);

        $this->model->delete();
    }

    public function restore(int|string $id)
    {
        Gate::authorize('restore', $this->model);

        $this->model = $this->model
            ->onlyTrashed()
            ->findOrFail('id', $id);

        $this->model->restore();

        return $this->model;
    }
}
