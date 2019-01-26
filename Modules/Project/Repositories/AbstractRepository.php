<?php

namespace Modules\Project\Http\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

abstract class AbstractRepository extends Model //implements RepositoryInterface
{
    // Get all registers
    public function index($id = null)
    {
        return $this
            ->leftJoin('users', $this->table . '.user_id', '=', 'users.id')
           // ->where('api_token', $api_token)
            ->get();
    }

    // Get all instances of model
    public function getAllWhere($where, $relationship)
    {
        return $this->where($where)->with($relationship)->get();
    }

    // public function getAllRows()
    // {
    //     return $this->get();
    // }

    // Create a new record in the database
    public function store(array $data)
    {
        return $this->create($data);
    }

    // // update record in the database
    public function updateRow(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    //remove record from the database
    public function deleteRow($id)
    {
        return $this->destroy($id);
    }

    // show the record with the given id
    public function show($id)
    {
        return $this->findOrFail($id)->first();
    }
}
