<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    productos: Array,
});
</script>

<template>
    <AppLayout title="Catálogo">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuestros Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    
                    <div v-for="producto in productos" :key="producto.codigo_producto" class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex flex-col">
                        <img :src="producto.imagen" alt="Producto" class="w-full h-48 object-cover">

                        <div class="p-4 flex-grow">
                            <h3 class="text-lg font-bold text-gray-900">{{ producto.nombre_producto }}</h3>
                            <p class="text-gray-600 mt-1">Categoría: {{ producto.categoria }}</p>
                            
                            <div class="mt-4 flex items-center justify-between">
                                <span class="text-xl font-bold text-gray-900">${{ producto.precio_unitario }}</span>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-50 border-t border-gray-100">
                            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                                Agregar al Carrito
                            </button>
                        </div>
                    </div>

                    <div v-if="productos.length === 0" class="col-span-full text-center text-gray-500 py-10">
                        No hay productos disponibles en este momento.
                    </div>

                </div>

            </div>
        </div>
    </AppLayout>
</template>