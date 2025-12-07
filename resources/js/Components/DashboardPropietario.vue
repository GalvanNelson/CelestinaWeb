<template>
    <div class="bg-bg-primary text-text-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Título -->
            <h1 class="text-3xl font-bold mb-8">Panel de Propietario</h1>

            <!-- Cards principales - Métricas generales -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Ventas Totales</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">$12,450</p>
                        </div>
                        <div class="text-5xl">💵</div>
                    </div>
                </div>
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Órdenes</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">156</p>
                        </div>
                        <div class="text-5xl">📦</div>
                    </div>
                </div>
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Clientes</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">342</p>
                        </div>
                        <div class="text-5xl">👥</div>
                    </div>
                </div>
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-text-secondary">Productos</p>
                            <p class="text-3xl font-bold mt-2 text-color-primary">847</p>
                        </div>
                        <div class="text-5xl">📊</div>
                    </div>
                </div>
            </div>

            <!-- Grid de gestión -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Acciones de administración -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <h2 class="text-xl font-bold mb-4">Gestión General</h2>
                    <div class="space-y-3">
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition text-left bg-color-primary text-text-inverse">
                            👥 Gestionar Usuarios
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition text-left bg-color-primary text-text-inverse">
                            📦 Gestionar Productos
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition text-left bg-color-primary text-text-inverse">
                            📋 Órdenes y Pedidos
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition text-left bg-color-primary text-text-inverse">
                            💼 Gestionar Vendedores
                        </button>
                    </div>
                </div>

                <!-- Reportes y análisis -->
                <div class="rounded-lg p-6 bg-bg-card shadow-base">
                    <h2 class="text-xl font-bold mb-4">Reportes</h2>
                    <div class="space-y-3">
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition text-left border-2 border-color-primary text-color-primary">
                            📊 Ventas Mensuales
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition text-left border-2 border-color-primary text-color-primary">
                            📈 Análisis de Clientes
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition text-left border-2 border-color-primary text-color-primary">
                            💹 Productos Populares
                        </button>
                        <button class="w-full py-3 px-4 rounded-lg font-semibold hover:opacity-70 transition text-left border-2 border-color-primary text-color-primary">
                            🎯 Desempeño Vendedores
                        </button>
                    </div>
                </div>
            </div>

            <!-- Resumen de actividad reciente -->
            <div class="rounded-lg p-6 bg-bg-card shadow-base">
                <h2 class="text-xl font-bold mb-4">Actividad Reciente</h2>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 rounded bg-bg-secondary">
                        <div>
                            <p class="font-semibold">Nueva orden recibida</p>
                            <p class="text-sm text-text-secondary">Cliente: Juan Pérez</p>
                        </div>
                        <span class="font-bold text-color-primary">hace 5 min</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded bg-bg-secondary">
                        <div>
                            <p class="font-semibold">Usuario registrado</p>
                            <p class="text-sm text-text-secondary">Nuevo cliente: María García</p>
                        </div>
                        <span class="font-bold text-color-primary">hace 1 hora</span>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded bg-bg-secondary">
                        <div>
                            <p class="font-semibold">Stock actualizado</p>
                            <p class="text-sm text-text-secondary">Producto: Tomates frescos</p>
                        </div>
                        <span class="font-bold text-color-primary">hace 2 horas</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
