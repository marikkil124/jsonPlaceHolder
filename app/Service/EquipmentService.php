<?php

namespace App\Service;

use App\Http\Resources\Equipment\EquipmentResource;
use App\Models\Equipment;
use http\Env\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentService
{


    public function store($request)
   {
        $data = [];
       $validator = Validator::make($request->all(), [
           'equipment_type'=>'required|integer|exists:equipment_types,id',
           'serial_number'=>'required|string|size:2|',
           'desc'=>'required|string',
       ]);

       if ($validator->fails()) {
           $data['errors'] = $validator->errors();
       }

       $validated = $validator->validated();

       //return response($data);
       return new EquipmentResource(Equipment::create($data));


    }

}
