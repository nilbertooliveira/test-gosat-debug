<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Categorias
 */
class CategoryController extends Controller
{
    /**
     * Lista categorias
     *
     * Obtem a lista de todas as categorias
     * @authenticated
     * @response {
     *      "status": 200,
     *      "success": true,
     *      "data":
     *          [
     *        {
     *           "id" : 1,
     *           "name": "Eletrônicos",
     *           "description" : "Categoria tecnologica"
     *       },
     * {
     *            "id" : 2,
     *            "name": "Limpeza",
     *            "description" : "sabonete"
     *        }
     *          ]
     *  }
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Cria categoria
     *
     * [Descrição opcional]
     *
     * @bodyParam name string required Nome da categoria.  Example: Eletrônicos
     * @bodyParam description string Descrição da categoria.  Example: Categoria tecnologica
     *
     * @authenticated
     * @response {
     *     "status": 200,
     *     "success": true,
     *     "data": {
     *         "id" : 1,
     *         "name": "Eletrônicos",
     *         "description" : "Categoria tecnologica"
     *     }
     * }
     * @responseResource 201 App\Http\Resources\CategoryResource
     *
     * @param StoreCategoryRequest $request
     * @return CategoryResource
     */
    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $this->authorize('create', Category::class);

        $model = Category::create($request->all());
        return new CategoryResource($model);
    }

    /**
     * Buscar Categoria
     *
     * [Descrição opcional]
     *
     * @pathParam category required Id da categoria. Example: 1
     *
     * @authenticated
     * @response {
     *      "status": 200,
     *      "success": true,
     *      "data": {
     *          "id" : 1,
     *          "name": "Eletrônicos",
     *          "description" : "Categoria tecnologica"
     *      }
     *  }
     * @response 404 {
     *  "message": "Busca não retornou resultados!"
     * }
     *
     * @param int $id
     * @return CategoryResource
     */
    public function show(int $id): CategoryResource
    {
        // A category resource.
        return new CategoryResource(Category::findOrFail($id));
    }

    /**
     * Editar Categoria
     *
     * @pathParam category required Id da categoria. Example: 1
     * @bodyParam name string required Nome da categoria.  Example: Eletrônicos
     * @bodyParam description string Descrição da categoria.  Example: Categoria tecnologica
     *
     * @responseResource App\Http\Resources\CategoryResource
     *
     * @param UpdateCategoryRequest $request
     * @param int $id
     * @return CategoryResource
     */
    public function update(UpdateCategoryRequest $request, int $id): CategoryResource
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    /**
     * Remover Categoria
     *
     * [Descrição opcional]
     *
     * @pathParam category required Id da categoria. Example: 1
     *
     * @authenticated
     * @response {
     *      "status": 200,
     *      "success": true,
     *      "data": {}
     *  }
     * @response 404 {
     * "message": "Busca não retornou resultados!"
     * }
     *
     * @param int $id
     * @return CategoryResource
     */
    public function destroy(int $id): CategoryResource
    {
        return new CategoryResource(Category::findOrFail($id));
    }
}
