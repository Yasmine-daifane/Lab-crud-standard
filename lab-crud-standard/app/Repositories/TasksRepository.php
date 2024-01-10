<?php 
namespace App\Repositories ;
use App\Models\Task;
use App\Repositories\BaseRepository;

class TasksRepository extends BaseRepository
{
    
    public function __construct(Task $task){
        $this->model = $task;
    }

    protected $fileldTask = [
        'nom',
        'description',
        'projetId',
    ];
    public function getFieldData():array {
        return $this->fileldTask;
    }
    public function model():string {
        return Task::class;
    }
    public function all()
    {
        return $this->model->all();
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

}