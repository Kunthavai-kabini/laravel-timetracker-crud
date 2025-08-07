<?php
namespace App\Repositories\Eloquent;

use App\Models\Timelog;
use App\Repositories\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Timelog $task)
    {
        $this->model = $task;
    }

    public function getAll()
    {
        
        return $this->model->where('user_id', auth()->id())
        ->orderBy('task_added_on', 'desc')
        ->get()
        ->groupBy('task_added_on');
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $task = $this->model->findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = $this->model->findOrFail($id);
        return $task->delete();
    }
}
