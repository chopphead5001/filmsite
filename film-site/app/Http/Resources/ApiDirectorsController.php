<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product;
use App\Models\Directors;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage;

class ApiDirectorsController extends JsonResource
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

        $product = Product::all();

        $peliculas = 0;

        foreach ( $product as $p) {

            $director = DB::table('directors')
            ->where('id',  $this->id)
            ->first();

            if ($p->director == $director->name ){
                $peliculas ++;
            }

        }

        return [
            "id" => $this->id,
            "name" => $this->name,
            "films directed" => $peliculas
        ];
    }
}
