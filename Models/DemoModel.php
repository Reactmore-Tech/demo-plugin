<?php

namespace Demo\Models;

use App\Models\BaseModel;

class DemoModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct('demo', 'id', true, 0, 'array', false, true);
        $this->_table = $this->db->prefixTable("demo");
        $this->builder = $this->db->table($this->_table);
    }

    //get paginated users count
    public function getDebugCount()
    {
        $this->filterDebug();
        return $this->builder->countAllResults();
    }

    //get paginated users
    public function getDebugPaginated($perPage, $offset)
    {
        $this->filterDebug();
        return $this->builder->orderBy('created_at DESC')->limit($perPage, $offset)->get()->getResult();
    }

    //users filter
    public function filterDebug()
    {
        $q = inputGet('q');
        if (!empty($q)) {
            $this->builder->groupStart()->like('event', cleanStr($q))->groupEnd();
        }
       
    }

    public function createdDebug($data, $event)
    {
        $update = [
            'user_id' => user()->id,
            'event' => $event,
            'data' => serialize($data['data']),
        ];

        $this->builder->insert($update);
    }
}
