<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DashboardCliente from '@/Components/DashboardCliente.vue';
import DashboardVendedor from '@/Components/DashboardVendedor.vue';
import DashboardPropietario from '@/Components/DashboardPropietario.vue';
import { computed } from 'vue';

const props = defineProps({
    user: Object,
});

const userRole = computed(() => {
    // Obtener el rol del usuario desde la relación team_users
    if (!props.user?.team_users || props.user.team_users.length === 0) {
        return 'cliente';
    }
    return props.user.team_users[0]?.role || 'cliente';
});

const isCliente = computed(() => userRole.value === 'cliente');
const isVendedor = computed(() => userRole.value === 'vendedor');
const isPropietario = computed(() => userRole.value === 'propietario');

const dashboardTitle = computed(() => {
    switch(userRole.value) {
        case 'propietario':
            return 'Dashboard del Propietario';
        case 'vendedor':
            return 'Dashboard del Vendedor';
        default:
            return 'Mi Dashboard';
    }
});
</script>

<template>
    <AppLayout :title="dashboardTitle">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight text-text-primary">
                {{ dashboardTitle }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Dashboard Cliente -->
                <DashboardCliente v-if="isCliente" />
                
                <!-- Dashboard Vendedor -->
                <DashboardVendedor v-if="isVendedor" />
                
                <!-- Dashboard Propietario -->
                <DashboardPropietario v-if="isPropietario" />
            </div>
        </div>
    </AppLayout>
</template>

