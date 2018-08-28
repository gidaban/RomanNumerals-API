<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Convert extends Resource
{
    public $created_at;
    public $converted;
    public $integer;
    public $id;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'integer' => $this->integer,
            'converted' => $this->converted,
            'created_at'=>$this->created_at
        ];
    }
}
