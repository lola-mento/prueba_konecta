<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //! OBTIENE TODA LA INFORMACIÓN DE LA BASE DE DATOS
    public function index()
    {
        try
        {
            $categories = Category::all();
            return view('categories.index', compact('categories'));
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //! MUESTRA UNA VISTA PARA RECOLECTAR LOS DATOS DE UNA NUEVA CATEGORIA
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('categories.create',compact('categories'));
    }
    //! GUARDA EN BASE DE DATOS LA CATEGORIA
    public function store(CategoryRequest $request)
    {
        try
        {
            Category::create($request->all());
            Alert::toast('categoria creada de manera correcta','success');
            return redirect()->route('categories.index');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //!MUESTRA UNA VISTA PARA ACTUALIZAR CATEGORIAS
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }
    //!ACTUALIZA CATEGORIAS EN BASE DE DATOS
    public function update(Category $category, CategoryRequest $request)
    {
        try
        {

            $category->update($request->all());
            Alert::toast('categoria actualizada correctamente','success');
            return redirect()->route('categories.index');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
    //!ELIMINA CATEGORIAS DE LA BASE DE DATOS
    public function destroy(Category $category)
    {
        try
        {
            $category->delete();
            Alert::toast('categoria eliminada correctamente','success');
            return redirect()->route('categories.index')->with('eliminar','ok');
        }
        catch(Exception $e)
        {
            return "Ha ocurrido un error. Codigo: ".$e;
        }
    }
}
