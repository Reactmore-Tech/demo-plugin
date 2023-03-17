<?php

namespace Demo\Models;

use App\Models\BaseModel;

class DemoSettingsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct('demo_settings', 'id', true, 0, 'array', false, true);
        $this->_table = $this->db->prefixTable("demo_settings");
        $this->builder = $this->db->table($this->_table);
    }

    //input values
    public function inputValues()
    {
        return [
            'mode_debug' => inputPost('mode_debug', true)
        ];
    }


    public function getSettings()
    {
        return $this->builder->where('id', 1)->get()->getRow();
    }

    public function editSettings($id)
    {
        $data = $this->inputValues();
        return $this->builder->where('id', $id)->update($data);
    }
}
