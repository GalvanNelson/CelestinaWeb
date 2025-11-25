import { ref, computed, watch } from 'vue';

// Estado global del carrito
const cartItems = ref([]);
const isCartOpen = ref(false);

// Cargar carrito desde localStorage al iniciar
const loadCart = () => {
    try {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            cartItems.value = JSON.parse(savedCart);
        }
    } catch (error) {
        console.error('Error cargando el carrito:', error);
        cartItems.value = [];
    }
};

// Guardar carrito en localStorage
const saveCart = () => {
    try {
        localStorage.setItem('cart', JSON.stringify(cartItems.value));
    } catch (error) {
        console.error('Error guardando el carrito:', error);
    }
};

// Cargar el carrito al importar el composable
loadCart();

// Observar cambios y guardar automáticamente
watch(cartItems, saveCart, { deep: true });

export function useCart() {
    // Calcular cantidad total de productos
    const totalItems = computed(() => {
        return cartItems.value.reduce((total, item) => total + item.cantidad, 0);
    });

    // Calcular precio total
    const totalPrice = computed(() => {
        return cartItems.value.reduce((total, item) => {
            return total + (item.precio_unitario * item.cantidad);
        }, 0);
    });

    // Agregar producto al carrito
    const addToCart = (producto) => {
        const existingItem = cartItems.value.find(
            item => item.codigo_producto === producto.codigo_producto
        );

        if (existingItem) {
            existingItem.cantidad++;
        } else {
            cartItems.value.push({
                ...producto,
                cantidad: 1
            });
        }
    };

    // Eliminar producto del carrito
    const removeFromCart = (codigoProducto) => {
        const index = cartItems.value.findIndex(
            item => item.codigo_producto === codigoProducto
        );
        
        if (index !== -1) {
            cartItems.value.splice(index, 1);
        }
    };

    // Actualizar cantidad de un producto
    const updateQuantity = (codigoProducto, cantidad) => {
        const item = cartItems.value.find(
            item => item.codigo_producto === codigoProducto
        );

        if (item) {
            if (cantidad <= 0) {
                removeFromCart(codigoProducto);
            } else {
                item.cantidad = cantidad;
            }
        }
    };

    // Limpiar todo el carrito
    const clearCart = () => {
        cartItems.value = [];
    };

    // Alternar visibilidad del carrito
    const toggleCart = () => {
        isCartOpen.value = !isCartOpen.value;
    };

    // Abrir carrito
    const openCart = () => {
        isCartOpen.value = true;
    };

    // Cerrar carrito
    const closeCart = () => {
        isCartOpen.value = false;
    };

    return {
        cartItems,
        isCartOpen,
        totalItems,
        totalPrice,
        addToCart,
        removeFromCart,
        updateQuantity,
        clearCart,
        toggleCart,
        openCart,
        closeCart
    };
}
