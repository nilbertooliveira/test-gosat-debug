<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }
    /**
     * Lista categorias
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
     * @param StoreCategoryRequest $request
     * @return CategoryResource
     * @response CategoryResource
     */
    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $model = Category::create($request->all());
        return new CategoryResource($model);
    }

    /**
     * Buscar Categoria
     *
     * @param int $id
     * @return CategoryResource
     * @response CategoryResource
     */
    public function show(int $id): CategoryResource
    {
        // A category resource.
        return new CategoryResource(Category::findOrFail($id));
    }

    /**
     * Editar Categoria
     *
     * @param UpdateCategoryRequest $request
     * @param int $id
     * @return CategoryResource
     * @response CategoryResource
     */
    public function update(UpdateCategoryRequest $request, int $id): CategoryResource
    {
        return new CategoryResource(Category::findOrFail($id));
    }

    /**
     * Remover Categoria
     *
     * @param int $id
     * @return CategoryResource
     * @response CategoryResource
     */
    public function destroy(int $id): CategoryResource
    {
        return new CategoryResource(Category::findOrFail($id));
    }
}
