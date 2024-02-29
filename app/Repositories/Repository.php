<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

use function call_user_func_array;

abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all($columns = ['*'])
    {
        return $this->model->select($columns)->get();
    }

    /**
     * @param $id
     * @param array $columns
     * @return Collection|Model
     */
    public function find($id, $columns = ['*'])
    {
        return $this->model->select($columns)->findOrFail($id);
    }

    /**
     * @param array $where
     * @param array $columns
     * @param array $order
     * @return Model[]|Collection
     */
    public function findBy($where = [], $columns = ['*'], $order = [])
    {
        /** @var Builder $query */
        $query = $this->model->select(empty($columns) ? ['*'] : $columns);

        $query = $this->addFilterCriteria($query, $where);

        if (!empty($order)) {
            foreach ($order as $field => $direction) {
                $query = $query->orderBy($field, $direction);
            }
        }

        return $query->get();
    }

    /**
     * @param array $data
     * @return $this|bool|Model
     */
    public function store(array $data)
    {
        $record = $this->model::create($data);
        if ($record) {
            return $record;
        }
        return false;
    }

    /**
     * @param Model|int $record
     * @param array $data
     * @return bool|Model
     */
    public function update($record, array $data)
    {
        if (!($record instanceof $this->model)) {
            $record = $this->find($record);
        }

        $record = $record->fill($data);
        if ($record->save()) {
            return $record;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        if ($this->model::destroy($id)) {
            return true;
        }
        return false;
    }

    /**
     * @param Builder $query
     * @param array $criteria
     * @return Builder
     */
    protected function addFilterCriteria($query, $criteria): Builder
    {
        foreach ($criteria as $field => $value) {
            if (!is_array($value)) {
                $query = $query->where($field, $value);
                continue;
            }

            if (array_is_list($value)) {
                $query = $query->whereIn($field, $value);
                continue;
            }

            $fromClause = Arr::get($value, 'from');
            $toClause   = Arr::get($value, 'to');
            $likeClause = Arr::get($value, 'like');
            $notClause  = Arr::get($value, 'not');
            $notInClause  = Arr::get($value, 'notin');

            if ($fromClause !== null) {
                $query = $query->where($field, '>=', $fromClause);
            }
            if ($toClause !== null) {
                $query = $query->where($field, '<=', $toClause);
            }
            if ($likeClause !== null) {
                $query = $query->where($field, 'like', '%' . $likeClause . '%');
            }
            if ($notClause !== null) {
                $query = $query->where($field, '!=', $notClause);
            }
            if ($notInClause !== null && is_array($notInClause)) {
                $query = $query->whereNotIn($field, $notInClause);
            }
        }

        return $query;
    }
}
