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
        class="rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 bg-bg-secondary text-text-primary border border-bg-secondary focus:ring-color-primary"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
