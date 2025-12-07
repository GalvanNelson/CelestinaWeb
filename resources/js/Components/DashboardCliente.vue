<template>
    <div class="bg-bg-primary text-text-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Título -->
            <h1 class="text-3xl font-bold mb-8">Mi Panel de Cliente</h1>

            <!-- Cards principales -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Mis Pedidos -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Mis Pedidos</p>
                            <p class="text-4xl font-bold mt-2 text-color-primary">5</p>
                        </div>
                        <div class="text-5xl">🛒</div>
                    </div>
                </div>

                <!-- Pedidos Pendientes -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Pendientes</p>
                            <p class="text-4xl font-bold mt-2 text-color-primary">2</p>
                        </div>
                        <div class="text-5xl">⏳</div>
                    </div>
                </div>

                <!-- Gasto Total -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Gasto Total</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">$450</p>
                        </div>
                        <div class="text-5xl">💰</div>
                    </div>
                </div>
            </div>

            <!-- Acciones rápidas -->
            <div class="rounded-lg p-6 mb-8 bg-bg-card shadow-base">
                <h2 class="text-xl font-bold mb-4">Acciones Rápidas</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button 
                        class="py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition bg-color-primary text-text-inverse"
                    >
                        🛍️ Comprar Ahora
                    </button>
                    <button 
                        class="py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition border-2 border-color-primary text-color-primary"
                    >
                        📦 Ver Mis Pedidos
                    </button>
                </div>
            </div>

            <!-- Historial de pedidos recientes -->
            <div class="rounded-lg p-6 bg-bg-card shadow-base">
                <h2 class="text-xl font-bold mb-4">Pedidos Recientes</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-bg-secondary">
                                <th class="pb-3 font-semibold">Número</th>
                                <th class="pb-3 font-semibold">Fecha</th>
                                <th class="pb-3 font-semibold">Estado</th>
                                <th class="pb-3 font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-bg-secondary">
                                <td class="py-3">#1001</td>
                                <td class="py-3">2024-12-05</td>
                                <td class="py-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-color-primary text-text-inverse">Entregado</span>
                                </td>
                                <td class="py-3">$120</td>
                            </tr>
                            <tr class="border-b border-bg-secondary">
                                <td class="py-3">#1002</td>
                                <td class="py-3">2024-12-04</td>
                                <td class="py-3">
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold bg-yellow-400 text-black">En camino</span>
                                </td>
                                <td class="py-3">$85</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
