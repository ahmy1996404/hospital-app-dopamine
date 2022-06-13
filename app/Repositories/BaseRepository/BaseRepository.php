<?php


namespace App\Repositories\BaseRepository;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;

    }

    // fetch all data
    public function all()
    {
        return $this->model->all();
    }

    // store in model
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // show in model
    public function show($id)
    {
        return $this->model->find($id);
    }

    // edit in model
    public function edit($id)
    {
        return $this->model->find($id);
    }

    // update in model
    public function update($id,array $data)
    {
        return $this->model->find($id)
            ->update($data);
    }

    // delete in model
    public function delete($id)
    {
        return $this->model->find($id)
            ->delete();
    }

    // delete in model where conditions
    public function deleteWhere($conditions)
    {
        return $this->model->where($conditions)
            ->delete();
    }

    // delete in model
    public function destroy($collect)
    {
        return $this->model->destroy($collect);
    }

    public function restore($id)
    {
        $model =  $this->model->where('id','=',$id)->withTrashed()->first();
        return $model->restore();
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
    }

    // Eager loaf database relationships
    public function with($relation)
    {
        return $this->model->with($relation);
    }

    // Eager loaf database whereHas
    public function whereHas($relation,$callback)
    {
        return $this->model->whereHas($relation,$callback);
    }
}
