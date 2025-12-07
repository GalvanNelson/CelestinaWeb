<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ThemeMenu from '@/Components/ThemeMenu.vue';
import { useTheme } from '@/Composables/useTheme';
import { onMounted, onUnmounted } from 'vue';

const { applyTheme } = useTheme();

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

onMounted(() => {
    applyTheme();
});

onUnmounted(() => {
    applyTheme();
});
</script>

<template>
    <Head title="Bienvenido" />
    
    <div class="min-h-screen flex flex-col" style="background-color: var(--bg-primary); color: var(--text-primary);">
        <!-- Header simple -->
        <header class="py-6 px-4 md:px-8" style="background-color: var(--bg-card); box-shadow: var(--shadow);">
            <div class="flex items-center justify-between max-w-6xl mx-auto">
                <div class="flex items-center gap-3">
                    <div class="text-white p-2 rounded-lg" style="background-color: var(--color-primary);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold" style="color: var(--color-primary);">Tienda Celestina</span>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-sm hidden md:block" style="color: var(--text-secondary);">
                        Tu tienda de confianza
                    </div>
                    <ThemeMenu />
                </div>
            </div>
        </header>

        <!-- Contenido principal centrado -->
        <main class="flex-1 flex items-center justify-center px-4">
            <div class="max-w-md w-full">
                <!-- Tarjeta de bienvenida -->
                <div class="rounded-2xl p-8 md:p-10" style="background-color: var(--bg-card); box-shadow: var(--shadow);">
                    <!-- Logo grande -->
                    <div class="flex justify-center mb-8">
                        <div class="text-white p-4 rounded-full" style="background-color: var(--color-primary);">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Mensaje de bienvenida -->
                    <div class="text-center mb-10">
                        <h1 class="text-3xl font-bold mb-3" style="color: var(--text-primary);">
                            Bienvenido a Tienda Celestina
                        </h1>
                        <p style="color: var(--text-secondary);">
                            Accede a tu cuenta para comenzar a comprar
                        </p>
                    </div>

                    <!-- Botones de acción -->
                    <div class="space-y-4">
                        <!-- Botón de Iniciar Sesión -->
                        <Link
                            v-if="canLogin"
                            :href="route('login')"
                            class="block w-full text-white font-semibold py-4 px-6 rounded-xl transition duration-300 shadow-md hover:shadow-lg text-center hover:opacity-90" 
                            style="background-color: var(--color-primary);"
                        >
                            <div class="flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                                <span>Iniciar Sesión</span>
                            </div>
                        </Link>

                        <!-- Botón de Registro -->
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="block w-full font-semibold py-4 px-6 rounded-xl transition duration-300 border-2 shadow-sm hover:shadow-md text-center hover:opacity-90" 
                            style="background-color: var(--bg-card); color: var(--color-primary); border-color: var(--color-primary);"
                        >
                            <div class="flex items-center justify-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                <span>Crear Cuenta</span>
                            </div>
                        </Link>

                        <!-- Acceso para usuarios ya autenticados -->
                        <div v-if="$page.props.auth.user" class="text-center pt-6 border-t" style="border-color: var(--bg-secondary);">
                            <p class="mb-4" style="color: var(--text-secondary);">Ya has iniciado sesión</p>
                            <Link
                                :href="route('dashboard')"
                                class="inline-block text-white font-semibold py-3 px-6 rounded-lg transition duration-300 hover:opacity-90" 
                                style="background-color: var(--color-primary);"
                            >
                                Ir al Panel Principal
                            </Link>
                        </div>
                    </div>

                    <!-- Texto informativo -->
                    <div class="mt-10 pt-6 border-t" style="border-color: var(--bg-secondary);">
                        <div class="text-center text-sm space-y-2" style="color: var(--text-secondary);">
                            <p>✨ Productos de calidad</p>
                            <p>🚚 Envíos rápidos</p>
                            <p>💰 Precios competitivos</p>
                        </div>
                    </div>
                </div>

                <!-- Información adicional pequeña -->
                <div class="text-center mt-6 text-sm" style="color: var(--text-secondary);">
                    <p>© 2024 Tienda Celestina. Todos los derechos reservados.</p>
                </div>
            </div>
        </main>

        <!-- Footer minimalista -->
        <footer class="py-6 px-4 text-center text-sm border-t" style="background-color: var(--bg-card); color: var(--text-secondary); border-color: var(--bg-secondary);">
            <div class="max-w-6xl mx-auto">
                <p>¿Necesitas ayuda? <a href="#" class="font-medium hover:opacity-70" style="color: var(--color-primary);">Contáctanos</a></p>
            </div>
        </footer>
    </div>
</template>