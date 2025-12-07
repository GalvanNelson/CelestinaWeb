<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm" style="color: #ef4444;">
            {{ message }}
        </p>
    </div>
</template>
