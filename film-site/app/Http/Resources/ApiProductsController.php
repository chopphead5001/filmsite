<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiProductsController extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        if(!($this->photopath == "images/default.png")){

            return [
                "id" => $this->id,
                "title" => $this->title,
                "director" => $this->director,
                'synopsis' => $this->synopsis,
                'year' => $this->year,
            ];

        }

    }
}
