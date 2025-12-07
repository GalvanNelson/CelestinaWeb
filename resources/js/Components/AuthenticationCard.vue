<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-color: var(--bg-primary);">
        <div>
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg" style="background-color: var(--bg-card); box-shadow: var(--shadow);">
            <slot />
        </div>
    </div>
</template>
