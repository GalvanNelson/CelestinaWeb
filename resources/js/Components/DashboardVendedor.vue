<template>
    <div class="bg-bg-primary text-text-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Título -->
            <h1 class="text-3xl font-bold mb-8">Panel de Vendedor</h1>

            <!-- Cards principales -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Ventas del Día -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Ventas Hoy</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">$850</p>
                        </div>
                        <div class="text-5xl">📈</div>
                    </div>
                </div>

                <!-- Pedidos Pendientes -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Pendientes</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">8</p>
                        </div>
                        <div class="text-5xl">⏳</div>
                    </div>
                </div>

                <!-- Productos Bajos Stock -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Stock Bajo</p>
                            <p class="text-3xl font-bold mt-2 text-red-500">3</p>
                        </div>
                        <div class="text-5xl">⚠️</div>
                    </div>
                </div>

                <!-- Clientes Activos -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Clientes</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">24</p>
                        </div>
                        <div class="text-5xl">👥</div>
                    </div>
                </div>
            </div>

            <!-- Acciones rápidas -->
            <div class="rounded-lg p-6 mb-8 bg-bg-card shadow-base">
                <h2 class="text-xl font-bold mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <button 
                        class="py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition bg-color-primary text-text-inverse"
                    >
                        ✅ Procesar Pedidos
                    </button>
                    <button 
                        class="py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition border-2 border-color-primary text-color-primary"
                    >
                        📊 Ver Reportes
                    </button>
                    <button 
                        class="py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition border-2 border-color-primary text-color-primary"
                    >
                        📦 Gestionar Stock
                    </button>
                </div>
            </div>

            <!-- Últimos pedidos -->
            <div class="rounded-lg p-6 bg-bg-card shadow-base">
                <h2 class="text-xl font-bold mb-4">Últimos Pedidos</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-bg-secondary">
                                <th class="pb-3 font-semibold">Cliente</th>
                                <th class="pb-3 font-semibold">Fecha</th>
                                <th class="pb-3 font-semibold">Estado</th>
                                <th class="pb-3 font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-bg-secondary">
                                <td class="py-3">Juan Pérez</td>
                                <td class="py-3">2024-12-06 10:30</td>
                                <td class="py-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-400 text-black">Preparar</span>
                                </td>
                                <td class="py-3">$245</td>
                            </tr>
                            <tr class="border-b border-bg-secondary">
                                <td class="py-3">María García</td>
                                <td class="py-3">2024-12-06 09:15</td>
                                <td class="py-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-green-500 text-white">Enviado</span>
                                </td>
                                <td class="py-3">$180</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
