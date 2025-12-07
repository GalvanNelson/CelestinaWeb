<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});
</script>

<template>
    <Link :href="href" :class="['inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out hover:opacity-70', active ? 'text-color-primary border-color-primary' : 'text-text-secondary border-transparent']">
        <slot />
    </Link>
</template>
