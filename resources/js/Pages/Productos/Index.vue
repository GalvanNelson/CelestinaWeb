<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

// Recibimos la variable 'productos' desde el controlador
defineProps({
    productos: Array,
});

const deleteProducto = (id) => {
    if (confirm('¿Estás seguro de eliminar este producto?')) {
        router.delete(route('productos.destroy', id));
    }
};
</script>

<template>
    <AppLayout title="Productos">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lista de Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    
                    <div class="mb-4 flex justify-end">
                        <Link :href="route('productos.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + Nuevo Producto
                        </Link>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="producto in productos" :key="producto.codigo_producto">
                                <td class="px-6 py-4 whitespace-nowrap">{{ producto.codigo_producto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ producto.nombre_producto }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Bs. {{ producto.precio_unitario }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <Link :href="route('productos.edit', producto.codigo_producto)" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                        Editar
                                    </Link>
                                    
                                    <button @click="deleteProducto(producto.codigo_producto)" class="text-red-600 hover:text-red-900">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr v-if="productos.length === 0">
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay productos registrados.</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </AppLayout>
</template>