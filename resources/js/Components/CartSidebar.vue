<script setup>
import { useCart } from '@/Composables/useCart';
import { Transition } from 'vue';

const { 
    cartItems, 
    isCartOpen, 
    totalItems, 
    totalPrice, 
    removeFromCart, 
    updateQuantity, 
    clearCart,
    closeCart 
} = useCart();

const increaseQuantity = (producto) => {
    updateQuantity(producto.codigo_producto, producto.cantidad + 1);
};

const decreaseQuantity = (producto) => {
    updateQuantity(producto.codigo_producto, producto.cantidad - 1);
};

const handleCheckout = () => {
    // Aquí puedes implementar la lógica para procesar la compra
    alert('Funcionalidad de checkout por implementar');
};
</script>

<template>
    <!-- Overlay -->
    <Transition name="fade">
        <div 
            v-if="isCartOpen" 
            class="fixed inset-0 bg-black bg-opacity-50 z-40"
            @click="closeCart"
        ></div>
    </Transition>

    <!-- Sidebar del Carrito -->
    <Transition name="slide">
        <div 
            v-if="isCartOpen"
            class="fixed right-0 top-0 h-full w-full md:w-96 bg-white shadow-2xl z-50 flex flex-col"
        >
            <!-- Header -->
            <div class="bg-indigo-600 text-white p-4 flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h2 class="text-xl font-bold">Mi Carrito</h2>
                </div>
                <button 
                    @click="closeCart"
                    class="hover:bg-indigo-700 p-2 rounded-full transition"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Items del Carrito -->
            <div class="flex-grow overflow-y-auto p-4">
                <div v-if="cartItems.length === 0" class="text-center py-10">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-gray-500 text-lg">Tu carrito está vacío</p>
                    <p class="text-gray-400 text-sm mt-2">Agrega productos para comenzar</p>
                </div>

                <div v-else class="space-y-4">
                    <div 
                        v-for="item in cartItems" 
                        :key="item.codigo_producto"
                        class="bg-gray-50 rounded-lg p-3 flex gap-3"
                    >
                        <img 
                            :src="item.imagen" 
                            :alt="item.nombre_producto"
                            class="w-20 h-20 object-cover rounded"
                        >
                        
                        <div class="flex-grow">
                            <h3 class="font-semibold text-gray-900">{{ item.nombre_producto }}</h3>
                            <p class="text-sm text-gray-600">{{ item.categoria }}</p>
                            <p class="text-indigo-600 font-bold mt-1">Bs. {{ item.precio_unitario }}</p>
                            
                            <!-- Controles de Cantidad -->
                            <div class="flex items-center gap-2 mt-2">
                                <button 
                                    @click="decreaseQuantity(item)"
                                    class="bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded flex items-center justify-center transition"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                    </svg>
                                </button>
                                
                                <span class="w-8 text-center font-semibold">{{ item.cantidad }}</span>
                                
                                <button 
                                    @click="increaseQuantity(item)"
                                    class="bg-gray-200 hover:bg-gray-300 w-7 h-7 rounded flex items-center justify-center transition"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>

                                <button 
                                    @click="removeFromCart(item.codigo_producto)"
                                    class="ml-auto text-red-500 hover:text-red-700 transition"
                                    title="Eliminar"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer con Total y Acciones -->
            <div v-if="cartItems.length > 0" class="border-t border-gray-200 p-4 bg-gray-50">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-700 font-semibold">Total de productos:</span>
                    <span class="text-gray-900 font-bold">{{ totalItems }}</span>
                </div>
                
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-700">Total:</span>
                    <span class="text-2xl font-bold text-indigo-600">Bs. {{ totalPrice.toFixed(2) }}</span>
                </div>

                <button 
                    @click="handleCheckout"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg transition mb-2"
                >
                    Proceder al Pago
                </button>

                <button 
                    @click="clearCart"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition"
                >
                    Vaciar Carrito
                </button>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
.fade-enter-active, .fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from, .fade-leave-to {
    opacity: 0;
}

.slide-enter-active, .slide-leave-active {
    transition: transform 0.3s ease;
}

.slide-enter-from, .slide-leave-to {
    transform: translateX(100%);
}
</style>
