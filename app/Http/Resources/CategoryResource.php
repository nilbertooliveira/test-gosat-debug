<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @resourceName Categorias
 * @resourceDescription Categorias de produtos
 * @resourceStatus 200
 */
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return  [
            /**
             * @responseParam id integer required ID da categoria. Example: 1
             */
            'id' => $this->id,
            /**
             * @responseParam name string required Nome da categoria. Example: Eletrônicos
             */
            'name' => $this->name,
            /**
             * @responseParam description string required Descrição da categoria. Example: Eletrônicos variados
             */
            'description' => $this->description,
            /**
             * @responseParam created_at string required Data de criação. Example: 2024-08-11 16:09:45
             */
            'created_at' => $this->created_at,
            /**
             * @responseParam updated_at string required Data de atualização. Example: 2024-08-11 16:09:45
             */
            'updated_at' => $this->updated_at,
        ];
    }
}
