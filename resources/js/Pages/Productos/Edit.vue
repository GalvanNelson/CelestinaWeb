<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

// Recibimos el objeto producto a editar
const props = defineProps({
    producto: Object,
});

// Inicializamos el form con los datos existentes
const form = useForm({
    nombre_producto: props.producto.nombre_producto,
    precio: props.producto.precio,
});

const submit = () => {
    // IMPORTANTE: Usamos put y pasamos el ID correcto (codigo_producto)
    form.put(route('productos.update', props.producto.codigo_producto));
};
</script>

<template>
    <AppLayout title="Editar Producto">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Producto
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <InputLabel for="nombre_producto" value="Nombre del Producto" />
                            <TextInput 
                                id="nombre_producto" 
                                v-model="form.nombre_producto" 
                                type="text" 
                                class="mt-1 block w-full" 
                                required 
                            />
                            <InputError class="mt-2" :message="form.errors.nombre_producto" />
                        </div>

                        <div class="mb-4">
                            <InputLabel for="precio" value="Precio" />
                            <TextInput 
                                id="precio" 
                                v-model="form.precio" 
                                type="number" 
                                step="0.01"
                                class="mt-1 block w-full" 
                                required 
                            />
                            <InputError class="mt-2" :message="form.errors.precio" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link :href="route('productos.index')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                                Cancelar
                            </Link>

                            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Actualizar
                            </PrimaryButton>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AppLayout>
</template>