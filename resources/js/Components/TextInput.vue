<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
        :style="{ 
            'background-color': 'var(--bg-secondary)',
            'color': 'var(--text-primary)',
            'border-color': 'var(--bg-secondary)',
            'border': '1px solid var(--bg-secondary)',
            'focus-ring-color': 'var(--color-primary)'
        }"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
