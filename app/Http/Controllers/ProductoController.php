<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductoController extends Controller
{
    /**
     * Muestra la lista de productos.
     */
    public function index()
    {
        // Traemos todos los productos
        $productos = Producto::all();

        return Inertia::render('Productos/Index', [
            'productos' => $productos
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     */
    public function create()
    {
        // Renderizamos la vista del formulario vacío
        // Debes crear el archivo: resources/js/Pages/Productos/Create.vue
        return Inertia::render('Productos/Create');
    }

    /**
     * Guarda el nuevo recurso en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validamos los datos
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        // 2. Creamos el producto. 
        // Nota: Laravel llenará 'codigo_producto' solo porque es autoincremental.
        Producto::create($request->all());

        // 3. Redirigimos al índice
        return redirect()->route('productos.index'); 
    }

    /**
     * Muestra un producto específico.
     */
    public function show(Producto $producto)
    {
        // Laravel usa 'codigo_producto' automáticamente para encontrarlo
        return Inertia::render('Productos/Show', [
            'producto' => $producto
        ]);
    }

    /**
     * Muestra el formulario para editar un producto existente.
     */
    public function edit(Producto $producto)
    {
        // Renderizamos la vista de edición enviando los datos del producto actual
        // Debes crear el archivo: resources/js/Pages/Productos/Edit.vue
        return Inertia::render('Productos/Edit', [
            'producto' => $producto
        ]);
    }

    /**
     * Actualiza el recurso especificado en la base de datos.
     */
    public function update(Request $request, Producto $producto)
    {
        // 1. Validamos (igual que en store, pero para actualizar)
        $validated = $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
        ]);

        // 2. Actualizamos el registro
        $producto->update($validated);

        // 3. Redirigimos
        return redirect()->route('productos.index');
    }

    /**
     * Elimina el recurso especificado de la base de datos.
     */
    public function destroy(Producto $producto)
    {
        // Eliminamos el producto
        $producto->delete();

        // Redirigimos
        return redirect()->route('productos.index');
    }
}