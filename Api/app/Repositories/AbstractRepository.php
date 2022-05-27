<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository{

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function relationships($relation){
        $relation = explode(';', $relation);

        foreach($relation as $key => $r){
            $this->model = $this->model->with($r);
        }
    }

    public function filter($filters){
        $filters = explode(';', $filters);

        foreach($filters as $key => $condition){
            $c = explode(':', $condition);
            $this->model = $this->model->where($c[0], $c[1], $c[2]);
        }
    }

    public function collumns($collum){
        $this->model = $this->model->selectRaw($collum);
    }

    public function order($obj, $dir){
        $this->model = $this->model->orderBy($obj,$dir);
    }

    public function getResult(){
        return $this->model->get();
    }

    public function getPaginate($num){
        return $this->model->paginate($num);
    }

    public function findOrFail($id){
        return $this->model->findOrFail($id);
    }


}




?>
