<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const baseClasses = 'block w-full ps-3 pe-4 py-2 border-l-4 text-start text-base font-medium transition duration-150 ease-in-out';
</script>

<template>
    <div>
        <button v-if="as == 'button'" :class="[baseClasses, active ? 'bg-bg-secondary text-color-primary border-color-primary' : 'text-text-secondary border-transparent']">
            <slot />
        </button>

        <a v-else-if="as == 'a'" :class="[baseClasses, active ? 'bg-bg-secondary text-color-primary border-color-primary' : 'text-text-secondary border-transparent']" :href="href">
            <slot />
        </a>

        <Link v-else :href="href" :class="[baseClasses, active ? 'bg-bg-secondary text-color-primary border-color-primary' : 'text-text-secondary border-transparent']">
            <slot />
        </Link>
    </div>
</template>
