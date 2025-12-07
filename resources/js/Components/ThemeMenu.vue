<template>
    <div class="theme-menu-container">
        <!-- Botón desplegable -->
        <button
            @click="isOpen = !isOpen"
            class="theme-menu-btn"
            :title="'Tema actual: ' + getCurrentThemeLabel()"
            aria-label="Menú de temas y accesibilidad"
        >
            <span class="theme-menu-icon">⚙️</span>
            <span class="theme-menu-label">{{ getCurrentThemeLabel() }}</span>
            <svg class="theme-menu-arrow" :class="{ 'rotate': isOpen }" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </button>

        <!-- Menú desplegable -->
        <div v-if="isOpen" class="theme-menu-dropdown">
            <!-- Sección: Temas -->
            <div class="menu-section">
                <h3 class="menu-section-title">🎨 Temas</h3>
                <div class="menu-items">
                    <button
                        v-for="t in themes"
                        :key="t.value"
                        @click="selectTheme(t.value)"
                        class="menu-item"
                        :class="{ 'active': theme === t.value }"
                    >
                        <span class="item-icon">{{ t.icon }}</span>
                        <div class="item-content">
                            <span class="item-label">{{ t.label }}</span>
                            <span class="item-description">{{ t.description }}</span>
                        </div>
                        <span v-if="theme === t.value" class="item-check">✓</span>
                    </button>
                </div>
            </div>

            <div class="menu-divider"></div>

            <!-- Sección: Modo Día/Noche -->
            <div class="menu-section">
                <h3 class="menu-section-title">🌓 Modo</h3>
                <div class="mode-buttons">
                    <button
                        @click="setMode('day')"
                        class="mode-btn"
                        :class="{ 'active': mode === 'day' }"
                        title="Modo día"
                    >
                        ☀️
                    </button>
                    <button
                        @click="setMode('night')"
                        class="mode-btn"
                        :class="{ 'active': mode === 'night' }"
                        title="Modo noche"
                    >
                        🌙
                    </button>
                    <button
                        @click="setMode('auto')"
                        class="mode-btn"
                        :class="{ 'active': mode === 'auto' }"
                        title="Automático"
                    >
                        🔄
                    </button>
                </div>
            </div>

            <div class="menu-divider"></div>

            <!-- Sección: Tamaño de Fuente -->
            <div class="menu-section">
                <h3 class="menu-section-title">📏 Tamaño de Texto</h3>
                <div class="font-controls">
                    <button
                        @click="decreaseFontSize"
                        class="font-btn"
                        :disabled="fontSize === 'small'"
                        title="Disminuir tamaño"
                    >
                        A−
                    </button>
                    <span class="font-indicator">{{ fontSizes.find(f => f.value === fontSize)?.label }}</span>
                    <button
                        @click="increaseFontSize"
                        class="font-btn"
                        :disabled="fontSize === 'xlarge'"
                        title="Aumentar tamaño"
                    >
                        A+
                    </button>
                </div>
            </div>

            <div class="menu-divider"></div>

            <!-- Sección: Contraste -->
            <div class="menu-section">
                <h3 class="menu-section-title">🔆 Contraste</h3>
                <button
                    @click="toggleContrast"
                    class="contrast-toggle"
                    :class="{ 'active': contrast === 'high' }"
                >
                    <span v-if="contrast === 'normal'">Normal</span>
                    <span v-else>Alto Contraste</span>
                </button>
            </div>

            <div class="menu-divider"></div>

            <!-- Botón Reset -->
            <button @click="handleReset" class="reset-btn">
                🔄 Restablecer Todo
            </button>
        </div>

        <!-- Overlay para cerrar el menú -->
        <div v-if="isOpen" @click="isOpen = false" class="theme-menu-overlay"></div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useTheme } from '@/Composables/useTheme';

const isOpen = ref(false);

const {
    theme,
    mode,
    fontSize,
    contrast,
    themes,
    fontSizes,
    setTheme,
    setMode,
    setFontSize,
    setContrast,
    increaseFontSize,
    decreaseFontSize,
    toggleContrast,
    resetSettings
} = useTheme();

const selectTheme = (newTheme) => {
    setTheme(newTheme);
};

const getCurrentThemeLabel = () => {
    const t = themes.find(th => th.value === theme.value);
    return t?.label || 'Temas';
};

const handleReset = () => {
    resetSettings();
    isOpen.value = false;
};
</script>

<style scoped>
.theme-menu-container {
    position: relative;
}

.theme-menu-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background-color: var(--color-primary);
    color: var(--text-inverse);
    border: none;
    border-radius: var(--border-radius);
    cursor: pointer;
    font-weight: 500;
    transition: all 0.2s ease;
    font-size: var(--font-size-base);
}

.theme-menu-btn:hover {
    background-color: var(--color-primary-dark);
    box-shadow: var(--shadow-lg);
}

.theme-menu-icon {
    font-size: 1.25rem;
}

.theme-menu-label {
    font-weight: 600;
}

.theme-menu-arrow {
    width: 1rem;
    height: 1rem;
    transition: transform 0.2s ease;
}

.theme-menu-arrow.rotate {
    transform: rotate(180deg);
}

.theme-menu-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 0.5rem;
    background-color: var(--bg-card);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    z-index: 1000;
    min-width: 280px;
    max-width: 320px;
    overflow: hidden;
    animation: slideDown 0.2s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.menu-section {
    padding: 1rem;
}

.menu-section-title {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--text-secondary);
    margin: 0 0 0.75rem 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.menu-items {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    width: 100%;
    padding: 0.75rem;
    background-color: var(--bg-secondary);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    cursor: pointer;
    transition: all 0.2s ease;
    text-align: left;
    font-size: var(--font-size-small);
}

.menu-item:hover {
    background-color: var(--bg-primary);
    border-color: var(--color-primary);
}

.menu-item.active {
    background-color: var(--color-primary);
    color: var(--text-inverse);
    border-color: var(--color-primary);
}

.item-icon {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.item-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.item-label {
    font-weight: 600;
    color: var(--text-primary);
}

.menu-item.active .item-label {
    color: var(--text-inverse);
}

.item-description {
    font-size: 0.75rem;
    color: var(--text-secondary);
    margin-top: 0.25rem;
}

.menu-item.active .item-description {
    color: var(--text-inverse);
    opacity: 0.9;
}

.item-check {
    font-size: 1.25rem;
    color: var(--text-inverse);
}

.menu-divider {
    height: 1px;
    background-color: var(--bg-secondary);
    margin: 0;
}

.mode-buttons {
    display: flex;
    gap: 0.5rem;
    justify-content: space-around;
}

.mode-btn {
    flex: 1;
    padding: 0.75rem;
    background-color: var(--bg-secondary);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    cursor: pointer;
    font-size: 1.25rem;
    transition: all 0.2s ease;
}

.mode-btn:hover {
    border-color: var(--color-primary);
}

.mode-btn.active {
    background-color: var(--color-primary);
    color: var(--text-inverse);
    border-color: var(--color-primary);
}

.font-controls {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    justify-content: center;
}

.font-btn {
    width: 2.5rem;
    height: 2.5rem;
    padding: 0;
    border: 2px solid var(--color-primary);
    border-radius: 50%;
    background-color: var(--bg-secondary);
    color: var(--color-primary);
    cursor: pointer;
    font-weight: bold;
    font-size: 1rem;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.font-btn:hover:not(:disabled) {
    background-color: var(--color-primary);
    color: var(--text-inverse);
    transform: scale(1.05);
}

.font-btn:disabled {
    opacity: 0.3;
    cursor: not-allowed;
}

.font-indicator {
    flex: 1;
    text-align: center;
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--text-primary);
}

.contrast-toggle {
    width: 100%;
    padding: 0.75rem;
    background-color: var(--bg-secondary);
    border: 2px solid transparent;
    border-radius: var(--border-radius);
    cursor: pointer;
    font-weight: 600;
    transition: all 0.2s ease;
    font-size: var(--font-size-small);
}

.contrast-toggle:hover {
    border-color: var(--color-primary);
}

.contrast-toggle.active {
    background-color: var(--color-primary);
    color: var(--text-inverse);
    border-color: var(--color-primary);
}

.reset-btn {
    width: 100%;
    padding: 1rem;
    background-color: var(--bg-secondary);
    border: none;
    cursor: pointer;
    font-weight: 600;
    color: var(--color-accent);
    transition: all 0.2s ease;
    font-size: var(--font-size-base);
}

.reset-btn:hover {
    background-color: var(--color-accent);
    color: var(--text-inverse);
}

.theme-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 999;
}

/* Responsive */
@media (max-width: 640px) {
    .theme-menu-dropdown {
        position: fixed;
        top: 50%;
        left: 50%;
        right: auto;
        max-width: 90vw;
        transform: translate(-50%, -50%);
    }
}
</style>
