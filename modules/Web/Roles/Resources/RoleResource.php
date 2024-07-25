<?php

namespace BasicDashboard\Web\Roles\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request):array
    {
         return [
            "id" => $this->id,
            "name"=>$this->name,
            "description"=>$this->description,
        ];
    }
}
