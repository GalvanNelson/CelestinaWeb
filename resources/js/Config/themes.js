/**
 * Configuración de Temas para Tienda Celestina
 * 
 * Este archivo contiene la definición de todos los temas disponibles
 * para la aplicación. Los valores aquí deben coincidir con los definidos
 * en resources/css/app.css
 */

export const THEMES = {
  kids: {
    name: 'Niños',
    description: 'Tema colorido y divertido para niños',
    colors: {
      primary: '#fbbf24',
      primaryDark: '#f59e0b',
      secondary: '#f472b6',
      accent: '#34d399',
    },
    backgrounds: {
      primary: '#fef3c7',
      secondary: '#fde68a',
      card: '#fffbeb',
    },
    text: {
      primary: '#78350f',
      secondary: '#92400e',
      inverse: '#ffffff',
    },
    radius: '1rem',
    shadows: {
      base: '0 4px 6px rgba(251, 191, 36, 0.3)',
      lg: '0 20px 25px rgba(251, 191, 36, 0.3)',
    },
  },

  young: {
    name: 'Jóvenes',
    description: 'Tema moderno y vibrante para jóvenes',
    colors: {
      primary: '#3b82f6',
      primaryDark: '#2563eb',
      secondary: '#8b5cf6',
      accent: '#ec4899',
    },
    backgrounds: {
      primary: '#ffffff',
      secondary: '#f3f4f6',
      card: '#ffffff',
    },
    text: {
      primary: '#1f2937',
      secondary: '#6b7280',
      inverse: '#ffffff',
    },
    radius: '0.5rem',
    shadows: {
      base: '0 1px 3px rgba(0, 0, 0, 0.1)',
      lg: '0 10px 15px rgba(0, 0, 0, 0.1)',
    },
  },

  adults: {
    name: 'Adultos',
    description: 'Tema profesional y elegante para adultos',
    colors: {
      primary: '#059669',
      primaryDark: '#047857',
      secondary: '#0891b2',
      accent: '#7c3aed',
    },
    backgrounds: {
      primary: '#f9fafb',
      secondary: '#e5e7eb',
      card: '#ffffff',
    },
    text: {
      primary: '#111827',
      secondary: '#4b5563',
      inverse: '#ffffff',
    },
    radius: '0.25rem',
    shadows: {
      base: '0 1px 2px rgba(0, 0, 0, 0.05)',
      lg: '0 10px 15px rgba(0, 0, 0, 0.1)',
    },
  },
};

/**
 * Modos disponibles
 */
export const MODES = {
  day: {
    name: 'Día',
    value: 'day',
  },
  night: {
    name: 'Noche',
    value: 'night',
  },
  auto: {
    name: 'Automático',
    value: 'auto',
  },
};

/**
 * Tamaños de fuente disponibles
 */
export const FONT_SIZES = {
  small: {
    name: 'Pequeño',
    value: 'small',
    base: '14px',
    small: '12px',
    large: '16px',
    xlarge: '18px',
  },
  medium: {
    name: 'Medio',
    value: 'medium',
    base: '16px',
    small: '14px',
    large: '18px',
    xlarge: '20px',
  },
  large: {
    name: 'Grande',
    value: 'large',
    base: '18px',
    small: '16px',
    large: '20px',
    xlarge: '24px',
  },
  xlarge: {
    name: 'Extra Grande',
    value: 'xlarge',
    base: '20px',
    small: '18px',
    large: '24px',
    xlarge: '28px',
  },
};

/**
 * Niveles de contraste disponibles
 */
export const CONTRAST_LEVELS = {
  normal: {
    name: 'Normal',
    value: 'normal',
  },
  high: {
    name: 'Alto',
    value: 'high',
  },
};

/**
 * Obtener todas las variables CSS de un tema
 * @param {string} themeName - Nombre del tema (kids, young, adults)
 * @param {string} mode - Modo (day, night, auto)
 * @returns {object} Objeto con todas las variables CSS
 */
export function getThemeVariables(themeName = 'young', mode = 'day') {
  const theme = THEMES[themeName] || THEMES.young;
  
  return {
    '--color-primary': theme.colors.primary,
    '--color-primary-dark': theme.colors.primaryDark,
    '--color-secondary': theme.colors.secondary,
    '--color-accent': theme.colors.accent,
    '--bg-primary': theme.backgrounds.primary,
    '--bg-secondary': theme.backgrounds.secondary,
    '--bg-card': theme.backgrounds.card,
    '--text-primary': theme.text.primary,
    '--text-secondary': theme.text.secondary,
    '--text-inverse': theme.text.inverse,
    '--border-radius': theme.radius,
    '--shadow': theme.shadows.base,
    '--shadow-lg': theme.shadows.lg,
  };
}
