<?php

namespace App\Http\Controllers\Hooks\Elementor;

trait DataTrait {


    protected function detachData()
    {
        $data = json_decode($this->data, true);
        $raw_fields = $data['payload']['fields'];
        $fields = [];
        foreach ($raw_fields as $id => $field) {
            $fields[$id] = $field['value'];
        }
        return $fields;
    }

    
}