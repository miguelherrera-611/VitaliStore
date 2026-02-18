<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductoController extends Controller
{
    public function index(): Response
    {
        $productos = Producto::orderBy('nombre')->get();

        return Inertia::render('Productos/Index', [
            'productos' => $productos,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Productos/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'codigo_barras' => 'nullable|string|unique:productos',
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function show(string $id): Response
    {
        $producto = Producto::findOrFail($id);

        return Inertia::render('Productos/Show', [
            'producto' => $producto,
        ]);
    }

    public function edit(string $id): Response
    {
        $producto = Producto::findOrFail($id);

        return Inertia::render('Productos/Edit', [
            'producto' => $producto,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|string',
            'codigo_barras' => 'nullable|string|unique:productos,codigo_barras,' . $id,
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        Producto::findOrFail($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}
