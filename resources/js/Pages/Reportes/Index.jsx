import AppLayout from '@/Layouts/AppLayout';
import { Link } from '@inertiajs/react';

export default function ReportesIndex() {
    return (
        <AppLayout>
            <div className="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
                {/* Header */}
                <div className="bg-white border-b border-gray-200">
                    <div className="max-w-7xl mx-auto px-6 py-8">
                        <div>
                            <h1 className="text-3xl font-light text-gray-900">Reportes y Analíticas</h1>
                            <p className="mt-1 text-sm text-gray-500">
                                Visualiza estadísticas y genera reportes del negocio
                            </p>
                        </div>
                    </div>
                </div>

                {/* Content */}
                <div className="max-w-7xl mx-auto px-6 py-12">
                    {/* Quick Stats */}
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                        <div className="bg-white rounded-2xl p-6 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <div className="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center">
                                    <svg className="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <p className="text-2xl font-semibold text-gray-900">$0</p>
                            <p className="text-sm text-gray-500 mt-1">Ventas del mes</p>
                        </div>

                        <div className="bg-white rounded-2xl p-6 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <div className="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
                                    <svg className="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                </div>
                            </div>
                            <p className="text-2xl font-semibold text-gray-900">0</p>
                            <p className="text-sm text-gray-500 mt-1">Productos vendidos</p>
                        </div>

                        <div className="bg-white rounded-2xl p-6 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <div className="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
                                    <svg className="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                            <p className="text-2xl font-semibold text-gray-900">0</p>
                            <p className="text-sm text-gray-500 mt-1">Clientes nuevos</p>
                        </div>

                        <div className="bg-white rounded-2xl p-6 shadow-sm">
                            <div className="flex items-center justify-between mb-4">
                                <div className="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center">
                                    <svg className="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                            </div>
                            <p className="text-2xl font-semibold text-gray-900">0%</p>
                            <p className="text-sm text-gray-500 mt-1">Crecimiento</p>
                        </div>
                    </div>

                    {/* Report Categories */}
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <ReportCard
                            title="Reporte de Ventas"
                            description="Analiza tus ventas por período, productos más vendidos y tendencias"
                            icon="sales"
                            color="green"
                            href="/reportes/ventas"
                        />
                        
                        <ReportCard
                            title="Reporte de Inventario"
                            description="Stock actual, movimientos y productos con bajo stock"
                            icon="inventory"
                            color="orange"
                            href="/reportes/inventario"
                        />
                        
                        <ReportCard
                            title="Reporte Financiero"
                            description="Ingresos, egresos y análisis de rentabilidad"
                            icon="financial"
                            color="purple"
                            href="/reportes/financiero"
                        />
                        
                        <ReportCard
                            title="Reporte de Clientes"
                            description="Análisis de clientes frecuentes y comportamiento de compra"
                            icon="customers"
                            color="pink"
                            href="/reportes/clientes"
                        />
                        
                        <ReportCard
                            title="Reporte de Proveedores"
                            description="Pedidos realizados y evaluación de proveedores"
                            icon="suppliers"
                            color="indigo"
                            href="/reportes/proveedores"
                        />
                        
                        <ReportCard
                            title="Dashboard Ejecutivo"
                            description="Vista general del negocio con KPIs principales"
                            icon="dashboard"
                            color="blue"
                            href="/reportes/ejecutivo"
                        />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}

function ReportCard({ title, description, icon, color, href }) {
    const gradients = {
        green: 'from-green-500 to-green-600',
        orange: 'from-orange-500 to-orange-600',
        purple: 'from-purple-500 to-purple-600',
        pink: 'from-pink-500 to-pink-600',
        indigo: 'from-indigo-500 to-indigo-600',
        blue: 'from-blue-500 to-blue-600',
    };

    const icons = {
        sales: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />,
        inventory: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />,
        financial: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />,
        customers: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />,
        suppliers: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />,
        dashboard: <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />,
    };

    return (
        <div className="bg-white rounded-2xl p-8 shadow-sm hover:shadow-lg transition duration-200 border border-gray-100">
            <div className={`w-14 h-14 bg-gradient-to-br ${gradients[color]} rounded-2xl flex items-center justify-center mb-6 shadow-md`}>
                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    {icons[icon]}
                </svg>
            </div>
            <h3 className="text-xl font-semibold text-gray-900 mb-2">{title}</h3>
            <p className="text-gray-500 text-sm mb-6">{description}</p>
            
            <Link
                href={href}
                className="block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-4 rounded-xl font-medium transition duration-200 text-center"
            >
                Ver Reporte
            </Link>
        </div>
    );
}
