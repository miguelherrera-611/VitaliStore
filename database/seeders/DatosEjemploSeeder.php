<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Proveedor;
use App\Models\Venta;
use App\Models\VentaDetalle;
use App\Models\User;
use Carbon\Carbon;

class DatosEjemploSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // 1. PRODUCTOS (30 productos variados)
        // ========================================
        $productos = [
            // Electrónica
            ['nombre' => 'Laptop HP 15.6"', 'categoria' => 'Electrónica', 'precio' => 2500000, 'stock' => 15, 'descripcion' => 'Laptop HP con procesador Intel i5, 8GB RAM, 256GB SSD'],
            ['nombre' => 'Mouse Inalámbrico Logitech', 'categoria' => 'Electrónica', 'precio' => 45000, 'stock' => 50, 'descripcion' => 'Mouse inalámbrico ergonómico'],
            ['nombre' => 'Teclado Mecánico RGB', 'categoria' => 'Electrónica', 'precio' => 180000, 'stock' => 25, 'descripcion' => 'Teclado mecánico gaming con luces RGB'],
            ['nombre' => 'Monitor Samsung 24"', 'categoria' => 'Electrónica', 'precio' => 450000, 'stock' => 12, 'descripcion' => 'Monitor Full HD 24 pulgadas'],
            ['nombre' => 'Audífonos Sony WH-1000XM4', 'categoria' => 'Electrónica', 'precio' => 850000, 'stock' => 8, 'descripcion' => 'Audífonos con cancelación de ruido'],
            ['nombre' => 'Webcam Logitech C920', 'categoria' => 'Electrónica', 'precio' => 280000, 'stock' => 20, 'descripcion' => 'Webcam Full HD 1080p'],
            ['nombre' => 'Disco Duro Externo 1TB', 'categoria' => 'Electrónica', 'precio' => 150000, 'stock' => 30, 'descripcion' => 'Disco duro portátil USB 3.0'],
            ['nombre' => 'Cable HDMI 2m', 'categoria' => 'Electrónica', 'precio' => 15000, 'stock' => 100, 'descripcion' => 'Cable HDMI alta velocidad'],

            // Ropa
            ['nombre' => 'Camiseta Nike Dri-FIT', 'categoria' => 'Ropa', 'precio' => 85000, 'stock' => 40, 'descripcion' => 'Camiseta deportiva transpirable'],
            ['nombre' => 'Jeans Levis 501', 'categoria' => 'Ropa', 'precio' => 180000, 'stock' => 25, 'descripcion' => 'Jeans clásicos corte recto'],
            ['nombre' => 'Zapatillas Adidas Ultraboost', 'categoria' => 'Ropa', 'precio' => 420000, 'stock' => 18, 'descripcion' => 'Zapatillas running premium'],
            ['nombre' => 'Chaqueta The North Face', 'categoria' => 'Ropa', 'precio' => 550000, 'stock' => 10, 'descripcion' => 'Chaqueta impermeable outdoor'],
            ['nombre' => 'Gorra New Era', 'categoria' => 'Ropa', 'precio' => 95000, 'stock' => 35, 'descripcion' => 'Gorra ajustable con logo bordado'],

            // Alimentos
            ['nombre' => 'Café Juan Valdez 500g', 'categoria' => 'Alimentos', 'precio' => 28000, 'stock' => 60, 'descripcion' => 'Café colombiano premium molido'],
            ['nombre' => 'Chocolate Jet 250g', 'categoria' => 'Alimentos', 'precio' => 8500, 'stock' => 80, 'descripcion' => 'Chocolate de leche con almendras'],
            ['nombre' => 'Galletas Oreo 432g', 'categoria' => 'Alimentos', 'precio' => 12000, 'stock' => 45, 'descripcion' => 'Galletas de chocolate con crema'],
            ['nombre' => 'Cereal Zucaritas 500g', 'categoria' => 'Alimentos', 'precio' => 15000, 'stock' => 55, 'descripcion' => 'Cereal de maíz azucarado'],
            ['nombre' => 'Pasta Doria 500g', 'categoria' => 'Alimentos', 'precio' => 5500, 'stock' => 90, 'descripcion' => 'Pasta espagueti'],
            ['nombre' => 'Aceite de Oliva 500ml', 'categoria' => 'Alimentos', 'precio' => 35000, 'stock' => 25, 'descripcion' => 'Aceite extra virgen'],

            // Hogar
            ['nombre' => 'Licuadora Oster 3 velocidades', 'categoria' => 'Hogar', 'precio' => 180000, 'stock' => 15, 'descripcion' => 'Licuadora de vaso con 700W'],
            ['nombre' => 'Microondas Samsung 20L', 'categoria' => 'Hogar', 'precio' => 320000, 'stock' => 8, 'descripcion' => 'Microondas digital'],
            ['nombre' => 'Plancha de Vapor Black+Decker', 'categoria' => 'Hogar', 'precio' => 95000, 'stock' => 22, 'descripcion' => 'Plancha de ropa antiadherente'],
            ['nombre' => 'Aspiradora Electrolux', 'categoria' => 'Hogar', 'precio' => 450000, 'stock' => 6, 'descripcion' => 'Aspiradora de bolsa 1600W'],
            ['nombre' => 'Ventilador de Pie Samurai', 'categoria' => 'Hogar', 'precio' => 120000, 'stock' => 12, 'descripcion' => 'Ventilador 3 velocidades'],
            ['nombre' => 'Juego de Ollas 7 piezas', 'categoria' => 'Hogar', 'precio' => 250000, 'stock' => 10, 'descripcion' => 'Ollas antiadherentes'],

            // Oficina
            ['nombre' => 'Cuaderno Norma 100 hojas', 'categoria' => 'Oficina', 'precio' => 8500, 'stock' => 150, 'descripcion' => 'Cuaderno universitario'],
            ['nombre' => 'Bolígrafos Bic x12', 'categoria' => 'Oficina', 'precio' => 12000, 'stock' => 200, 'descripcion' => 'Pack de bolígrafos azules'],
            ['nombre' => 'Resma Papel A4 Reprograf', 'categoria' => 'Oficina', 'precio' => 22000, 'stock' => 75, 'descripcion' => 'Papel bond 500 hojas'],
            ['nombre' => 'Archivador Legajador', 'categoria' => 'Oficina', 'precio' => 6500, 'stock' => 50, 'descripcion' => 'Archivador tamaño oficio'],
            ['nombre' => 'Calculadora Casio', 'categoria' => 'Oficina', 'precio' => 35000, 'stock' => 30, 'descripcion' => 'Calculadora científica'],
        ];

        foreach ($productos as $producto) {
            Producto::create([
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'categoria' => $producto['categoria'],
                'precio' => $producto['precio'],
                'stock' => $producto['stock'],
                'stock_minimo' => 10,
                'codigo_barras' => 'BAR' . rand(100000, 999999),
                'activo' => true,
            ]);
        }

        // ========================================
        // 2. CLIENTES (20 clientes)
        // ========================================
        $clientes = [
            ['nombre' => 'Juan Pérez', 'email' => 'juan.perez@email.com', 'telefono' => '3101234567', 'tipo' => 'VIP'],
            ['nombre' => 'María García', 'email' => 'maria.garcia@email.com', 'telefono' => '3209876543', 'tipo' => 'Regular'],
            ['nombre' => 'Carlos López', 'email' => 'carlos.lopez@email.com', 'telefono' => '3112345678', 'tipo' => 'Mayorista'],
            ['nombre' => 'Ana Martínez', 'email' => 'ana.martinez@email.com', 'telefono' => '3156789012', 'tipo' => 'VIP'],
            ['nombre' => 'Luis Rodríguez', 'email' => 'luis.rodriguez@email.com', 'telefono' => '3187654321', 'tipo' => 'Regular'],
            ['nombre' => 'Laura Sánchez', 'email' => 'laura.sanchez@email.com', 'telefono' => '3223456789', 'tipo' => 'Regular'],
            ['nombre' => 'Pedro Gómez', 'email' => 'pedro.gomez@email.com', 'telefono' => '3134567890', 'tipo' => 'Mayorista'],
            ['nombre' => 'Sandra Torres', 'email' => 'sandra.torres@email.com', 'telefono' => '3198765432', 'tipo' => 'VIP'],
            ['nombre' => 'Diego Ramírez', 'email' => 'diego.ramirez@email.com', 'telefono' => '3245678901', 'tipo' => 'Regular'],
            ['nombre' => 'Carolina Díaz', 'email' => 'carolina.diaz@email.com', 'telefono' => '3167890123', 'tipo' => 'Regular'],
            ['nombre' => 'Ricardo Morales', 'email' => 'ricardo.morales@email.com', 'telefono' => '3108765432', 'tipo' => 'Mayorista'],
            ['nombre' => 'Patricia Vargas', 'email' => 'patricia.vargas@email.com', 'telefono' => '3203456789', 'tipo' => 'Regular'],
            ['nombre' => 'Jorge Castro', 'email' => 'jorge.castro@email.com', 'telefono' => '3119876543', 'tipo' => 'VIP'],
            ['nombre' => 'Liliana Rojas', 'email' => 'liliana.rojas@email.com', 'telefono' => '3154567890', 'tipo' => 'Regular'],
            ['nombre' => 'Fernando Ortiz', 'email' => 'fernando.ortiz@email.com', 'telefono' => '3182345678', 'tipo' => 'Regular'],
            ['nombre' => 'Gloria Medina', 'email' => 'gloria.medina@email.com', 'telefono' => '3226789012', 'tipo' => 'Mayorista'],
            ['nombre' => 'Andrés Silva', 'email' => 'andres.silva@email.com', 'telefono' => '3135678901', 'tipo' => 'Regular'],
            ['nombre' => 'Claudia Reyes', 'email' => 'claudia.reyes@email.com', 'telefono' => '3193456789', 'tipo' => 'VIP'],
            ['nombre' => 'Héctor Muñoz', 'email' => 'hector.munoz@email.com', 'telefono' => '3247890123', 'tipo' => 'Regular'],
            ['nombre' => 'Valentina Cruz', 'email' => 'valentina.cruz@email.com', 'telefono' => '3168901234', 'tipo' => 'Regular'],
        ];

        foreach ($clientes as $cliente) {
            Cliente::create([
                'nombre' => $cliente['nombre'],
                'email' => $cliente['email'],
                'telefono' => $cliente['telefono'],
                'documento' => rand(10000000, 99999999),
                'tipo' => $cliente['tipo'],
                'direccion' => 'Calle ' . rand(1, 100) . ' # ' . rand(1, 50) . '-' . rand(1, 99),
                'activo' => true,
            ]);
        }

        // ========================================
        // 3. PROVEEDORES (10 proveedores)
        // ========================================
        $proveedores = [
            ['nombre' => 'TechSupply Colombia', 'empresa' => 'TechSupply SAS', 'email' => 'ventas@techsupply.com'],
            ['nombre' => 'Distribuidora El Progreso', 'empresa' => 'El Progreso Ltda', 'email' => 'contacto@elprogreso.com'],
            ['nombre' => 'Alimentos del Valle', 'empresa' => 'Alimentos del Valle SA', 'email' => 'pedidos@alimentosvalle.com'],
            ['nombre' => 'Moda y Estilo', 'empresa' => 'Moda y Estilo SAS', 'email' => 'ventas@modaestilo.com'],
            ['nombre' => 'Electrónica Premium', 'empresa' => 'Premium Electronics', 'email' => 'info@premiumelectronics.com'],
            ['nombre' => 'Hogar y Confort', 'empresa' => 'Hogar y Confort Ltda', 'email' => 'contacto@hogaryconfort.com'],
            ['nombre' => 'Papelería Central', 'empresa' => 'Central de Papelería', 'email' => 'ventas@papeleriacentral.com'],
            ['nombre' => 'Importadora Global', 'empresa' => 'Global Imports SAS', 'email' => 'pedidos@globalimports.com'],
            ['nombre' => 'Distribuciones Rápidas', 'empresa' => 'Rápidas Dist. SA', 'email' => 'info@distribucionesrapidas.com'],
            ['nombre' => 'Mayorista Los Andes', 'empresa' => 'Mayorista Los Andes', 'email' => 'ventas@losandes.com'],
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create([
                'nombre' => $proveedor['nombre'],
                'empresa' => $proveedor['empresa'],
                'email' => $proveedor['email'],
                'telefono' => '601' . rand(2000000, 9999999),
                'documento' => '900' . rand(100000, 999999),
                'direccion' => 'Carrera ' . rand(1, 50) . ' # ' . rand(1, 100) . '-' . rand(1, 99),
                'sitio_web' => 'www.' . strtolower(str_replace(' ', '', $proveedor['nombre'])) . '.com',
                'activo' => true,
            ]);
        }

        // ========================================
        // 4. VENTAS (50 ventas con datos realistas)
        // ========================================
        $user = User::first(); // Usuario que hace las ventas
        $clientesIds = Cliente::pluck('id')->toArray();
        $productosDisponibles = Producto::all();

        // Generar ventas de los últimos 30 días
        for ($i = 0; $i < 50; $i++) {
            $fechaVenta = Carbon::now()->subDays(rand(0, 30));
            
            $venta = Venta::create([
                'cliente_id' => $clientesIds[array_rand($clientesIds)],
                'user_id' => $user->id,
                'numero_venta' => 'V-' . str_pad($i + 1, 6, '0', STR_PAD_LEFT),
                'subtotal' => 0,
                'impuesto' => 0,
                'descuento' => 0,
                'total' => 0,
                'estado' => 'Completada',
                'metodo_pago' => ['Efectivo', 'Tarjeta', 'Transferencia'][rand(0, 2)],
                'created_at' => $fechaVenta,
                'updated_at' => $fechaVenta,
            ]);

            // Agregar entre 1 y 5 productos a cada venta
            $numProductos = rand(1, 5);
            $subtotalVenta = 0;

            for ($j = 0; $j < $numProductos; $j++) {
                $producto = $productosDisponibles->random();
                $cantidad = rand(1, 3);
                $precioUnitario = $producto->precio;
                $subtotal = $precioUnitario * $cantidad;

                VentaDetalle::create([
                    'venta_id' => $venta->id,
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precioUnitario,
                    'subtotal' => $subtotal,
                ]);

                $subtotalVenta += $subtotal;
            }

            // Actualizar totales de la venta
            $impuesto = $subtotalVenta * 0.19; // 19% IVA
            $descuento = rand(0, 1) ? ($subtotalVenta * 0.05) : 0; // 5% descuento aleatorio
            $total = $subtotalVenta + $impuesto - $descuento;

            $venta->update([
                'subtotal' => $subtotalVenta,
                'impuesto' => $impuesto,
                'descuento' => $descuento,
                'total' => $total,
            ]);
        }

        $this->command->info('✅ Datos de ejemplo creados exitosamente!');
        $this->command->info('   - 30 Productos');
        $this->command->info('   - 20 Clientes');
        $this->command->info('   - 10 Proveedores');
        $this->command->info('   - 50 Ventas con detalles');
    }
}
