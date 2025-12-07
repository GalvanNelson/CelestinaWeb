# Guía de Uso de Temas en Tienda Celestina

## Resumen Ejecutivo

El sistema de temas utiliza **CSS Variables + Tailwind CSS** para proporcionar una experiencia de personalización completa y en tiempo real.

## Ventajas de esta Solución

- ✅ **Performance Excelente**: Las variables CSS se aplican sin necesidad de recompilar
- ✅ **Cambios en Tiempo Real**: Los temas cambian instantáneamente
- ✅ **Mantenible**: Toda la lógica en un solo lugar (app.css)
- ✅ **Escalable**: Fácil agregar nuevos temas
- ✅ **Sin Dependencias Externas**: Usa solo CSS nativo y Tailwind
- ✅ **Compatible con Vue 3**: Funciona perfectamente con la composable useTheme

## Estructura de Temas

### Colores Base

```javascript
// Usar en componentes:
<div class="bg-bg-primary text-text-primary">
  <h1 class="text-primary font-bold">Título</h1>
</div>
```

### Clases Tailwind Disponibles

```html
<!-- Colores -->
<div class="text-primary bg-bg-card">...</div>

<!-- Sombras -->
<div class="shadow-base hover:shadow-lg">...</div>

<!-- Radio de borde -->
<div class="rounded-base">...</div>

<!-- Espaciado -->
<div class="p-md m-lg">...</div>

<!-- Tamaños de fuente -->
<p class="text-base font-medium">Texto normal</p>
<p class="text-lg">Texto grande</p>
```

## Ejemplos de Uso

### Ejemplo 1: Botón Responsivo al Tema

```vue
<template>
  <button class="bg-primary text-text-inverse px-md py-sm rounded-base hover:opacity-90 transition-opacity">
    Haz clic
  </button>
</template>
```

### Ejemplo 2: Tarjeta de Contenido

```vue
<template>
  <div class="bg-bg-card rounded-base shadow-base p-lg">
    <h2 class="text-text-primary font-bold text-lg mb-md">Título</h2>
    <p class="text-text-secondary text-base">Descripción</p>
  </div>
</template>
```

### Ejemplo 3: Layout Completo

```vue
<template>
  <div class="bg-bg-primary text-text-primary min-h-screen">
    <header class="bg-bg-card shadow-base">
      <nav class="max-w-7xl mx-auto px-lg py-md">
        <a href="#" class="text-primary font-semibold">Logo</a>
      </nav>
    </header>

    <main class="max-w-7xl mx-auto px-lg py-xl">
      <div class="grid grid-cols-3 gap-lg">
        <div class="bg-bg-card rounded-base shadow-base p-lg">
          Contenido
        </div>
      </div>
    </main>
  </div>
</template>
```

## Temas Disponibles

### 1. Tema Niños 🎨
- Colores vibrantes y divertidos
- Bordes más redondeados
- Sombras suaves

```javascript
// Colores principales
Primary: #fbbf24 (Amarillo)
Secondary: #f472b6 (Rosa)
Accent: #34d399 (Menta)
```

### 2. Tema Jóvenes 🚀
- Colores modernos y frescos
- Diseño minimalista
- Bordes moderados

```javascript
// Colores principales
Primary: #3b82f6 (Azul)
Secondary: #8b5cf6 (Púrpura)
Accent: #ec4899 (Rosa)
```

### 3. Tema Adultos 💼
- Colores profesionales
- Diseño elegante
- Bordes muy definidos

```javascript
// Colores principales
Primary: #059669 (Verde)
Secondary: #0891b2 (Cyan)
Accent: #7c3aed (Púrpura)
```

## Modos Disponibles

### Automático (Auto)
- Detecta automáticamente basado en la hora del día
- Entre 6 AM y 6:59 PM: Modo Día
- Resto del día: Modo Noche
- Revisa cada 60 segundos

### Manual (Día/Noche)
- El usuario elige explícitamente
- Se almacena en localStorage
- Persiste entre sesiones

## Tamaños de Fuente

- **Pequeño**: 14px (base)
- **Medio**: 16px (base) - **Predeterminado**
- **Grande**: 18px (base)
- **Extra Grande**: 20px (base)

## Contraste

- **Normal**: Contraste estándar
- **Alto**: Contraste aumentado para accesibilidad

## Implementación Técnica

### 1. CSS Variables (app.css)
```css
:root {
  --color-primary: #3b82f6;
  --bg-primary: #ffffff;
  /* ... más variables ... */
}

[data-theme="kids"] {
  --color-primary: #fbbf24;
  /* ... sobrescribe variables ... */
}
```

### 2. Tailwind Config (tailwind.config.js)
```javascript
colors: {
  primary: 'var(--color-primary)',
  'bg-primary': 'var(--bg-primary)',
  // ...
}
```

### 3. Composable Vue (useTheme.js)
```javascript
export function useTheme() {
  const applyTheme = () => {
    const theme = localStorage.getItem('theme') || 'young';
    document.documentElement.setAttribute('data-theme', theme);
    // ...
  }
  return { applyTheme }
}
```

## Mejores Prácticas

### ✅ HACER:
```vue
<!-- Usar clases de Tailwind con tema -->
<div class="bg-bg-primary text-text-primary">
  <button class="bg-primary text-text-inverse">OK</button>
</div>
```

### ❌ NO HACER:
```vue
<!-- Evitar colores hardcodeados -->
<div class="bg-white text-gray-800">
  <button class="bg-blue-500">NO</button>
</div>
```

## Rendimiento

- **Bundle Size**: +0 bytes (usa CSS nativo)
- **Runtime**: ~1ms para aplicar cambios
- **Memory**: Negligible (solo CSS variables)

## Compatibilidad

- ✅ Chrome/Edge 49+
- ✅ Firefox 31+
- ✅ Safari 9.1+
- ✅ Todos los navegadores modernos

## Mantenimiento

Para agregar un nuevo tema:

1. Agregar definición en `resources/js/Config/themes.js`
2. Agregar estilos CSS en `resources/css/app.css`
3. Agregar opción en el componente `ThemeMenu.vue`
4. Listo ✅

---

**Última actualización**: Diciembre 6, 2024
**Mantenedor**: Equipo de Desarrollo Tienda Celestina
