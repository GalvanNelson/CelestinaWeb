import { ref, watch, onMounted } from 'vue';

export function useTheme() {
    // Estados reactivos
    const theme = ref(localStorage.getItem('theme') || 'young');
    const mode = ref(localStorage.getItem('mode') || 'auto');
    const fontSize = ref(localStorage.getItem('fontSize') || 'medium');
    const contrast = ref(localStorage.getItem('contrast') || 'normal');

    // Opciones disponibles
    const themes = [
        { value: 'kids', label: 'Niños', icon: '🧸', description: 'Colorido y divertido' },
        { value: 'young', label: 'Jóvenes', icon: '🎮', description: 'Moderno y dinámico' },
        { value: 'adults', label: 'Adultos', icon: '💼', description: 'Profesional y elegante' }
    ];

    const fontSizes = [
        { value: 'small', label: 'Pequeño', icon: 'A-' },
        { value: 'medium', label: 'Medio', icon: 'A' },
        { value: 'large', label: 'Grande', icon: 'A+' },
        { value: 'xlarge', label: 'Muy Grande', icon: 'A++' }
    ];

    const contrastLevels = [
        { value: 'normal', label: 'Normal' },
        { value: 'high', label: 'Alto Contraste' }
    ];

    // Detectar si es de día o de noche basado en la hora local
    const isDayTime = () => {
        const hour = new Date().getHours();
        // Día: 6:00 AM a 6:59 PM
        return hour >= 6 && hour < 19;
    };

    // Determinar el modo actual (día/noche)
    const getCurrentMode = () => {
        if (mode.value === 'auto') {
            return isDayTime() ? 'day' : 'night';
        }
        return mode.value;
    };

    // Aplicar el tema al documento
    const applyTheme = () => {
        const root = document.documentElement;
        
        // Aplicar tema
        root.setAttribute('data-theme', theme.value);
        
        // Aplicar modo (día/noche)
        const currentMode = getCurrentMode();
        root.setAttribute('data-mode', currentMode);
        
        // Aplicar tamaño de fuente
        root.setAttribute('data-font-size', fontSize.value);
        
        // Aplicar contraste
        root.setAttribute('data-contrast', contrast.value);

        // Guardar en localStorage
        localStorage.setItem('theme', theme.value);
        localStorage.setItem('mode', mode.value);
        localStorage.setItem('fontSize', fontSize.value);
        localStorage.setItem('contrast', contrast.value);
    };

    // Cambiar tema
    const setTheme = (newTheme) => {
        theme.value = newTheme;
        applyTheme();
    };

    // Cambiar modo (day/night/auto)
    const setMode = (newMode) => {
        mode.value = newMode;
        applyTheme();
    };

    // Cambiar tamaño de fuente
    const setFontSize = (newSize) => {
        fontSize.value = newSize;
        applyTheme();
    };

    // Cambiar contraste
    const setContrast = (newContrast) => {
        contrast.value = newContrast;
        applyTheme();
    };

    // Incrementar tamaño de fuente
    const increaseFontSize = () => {
        const sizes = ['small', 'medium', 'large', 'xlarge'];
        const currentIndex = sizes.indexOf(fontSize.value);
        if (currentIndex < sizes.length - 1) {
            setFontSize(sizes[currentIndex + 1]);
        }
    };

    // Decrementar tamaño de fuente
    const decreaseFontSize = () => {
        const sizes = ['small', 'medium', 'large', 'xlarge'];
        const currentIndex = sizes.indexOf(fontSize.value);
        if (currentIndex > 0) {
            setFontSize(sizes[currentIndex - 1]);
        }
    };

    // Alternar contraste
    const toggleContrast = () => {
        setContrast(contrast.value === 'normal' ? 'high' : 'normal');
    };

    // Alternar modo día/noche manual
    const toggleMode = () => {
        if (mode.value === 'auto') {
            setMode('day');
        } else if (mode.value === 'day') {
            setMode('night');
        } else {
            setMode('auto');
        }
    };

    // Restablecer a valores por defecto
    const resetSettings = () => {
        setTheme('young');
        setMode('auto');
        setFontSize('medium');
        setContrast('normal');
    };

    // Verificar cada minuto si cambió de día a noche (solo en modo auto)
    let intervalId = null;

    const startAutoModeCheck = () => {
        intervalId = setInterval(() => {
            if (mode.value === 'auto') {
                applyTheme();
            }
        }, 60000); // Cada 60 segundos
    };

    const stopAutoModeCheck = () => {
        if (intervalId) {
            clearInterval(intervalId);
            intervalId = null;
        }
    };

    // Inicializar
    onMounted(() => {
        applyTheme();
        startAutoModeCheck();
    });

    // Limpiar intervalo cuando se desmonte
    const cleanup = () => {
        stopAutoModeCheck();
    };

    // Watch para aplicar cambios automáticamente
    watch([theme, mode, fontSize, contrast], () => {
        applyTheme();
    });

    return {
        // Estados
        theme,
        mode,
        fontSize,
        contrast,
        
        // Opciones
        themes,
        fontSizes,
        contrastLevels,
        
        // Métodos
        setTheme,
        setMode,
        setFontSize,
        setContrast,
        increaseFontSize,
        decreaseFontSize,
        toggleContrast,
        toggleMode,
        resetSettings,
        applyTheme,
        getCurrentMode,
        isDayTime,
        cleanup
    };
}
