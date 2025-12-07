<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 hover:opacity-90" :style="{ 'background-color': 'var(--color-primary)', 'color': 'var(--text-inverse)' }">
        <slot />
    </button>
</template>
