/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.php',
    './assets/js/**/*.js'
  ],
  safelist: ['material-symbols-outlined', 'no-scrollbar'],
  ...{
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-fixed": "#001b3d",
                        "primary-fixed": "#d6e3ff",
                        "outline": "#74777f",
                        "inverse-surface": "#2f3131",
                        "background": "#f9f9f9",
                        "tertiary-container": "#232422",
                        "on-background": "#1a1c1c",
                        "on-secondary-fixed": "#261900",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#1a1c1c",
                        "error": "#ba1a1a",
                        "on-primary": "#ffffff",
                        "inverse-primary": "#adc7f8",
                        "on-tertiary-fixed-variant": "#474745",
                        "on-error-container": "#93000a",
                        "on-tertiary": "#ffffff",
                        "on-error": "#ffffff",
                        "secondary-container": "#fed488",
                        "inverse-on-surface": "#f0f1f1",
                        "tertiary": "#0e0e0d",
                        "on-secondary-container": "#785a1a",
                        "on-tertiary-fixed": "#1b1c1a",
                        "error-container": "#ffdad6",
                        "secondary": "#775a19",
                        "on-primary-container": "#718bb9",
                        "on-secondary-fixed-variant": "#5d4201",
                        "surface-variant": "#e2e2e2",
                        "surface-bright": "#f9f9f9",
                        "on-primary-fixed-variant": "#2c4771",
                        "tertiary-fixed": "#e4e2df",
                        "primary-container": "#00234b",
                        "tertiary-fixed-dim": "#c8c6c3",
                        "primary": "#000e24",
                        "on-surface-variant": "#43474e",
                        "primary-fixed-dim": "#adc7f8",
                        "surface-dim": "#dadada",
                        "secondary-fixed": "#ffdea5",
                        "outline-variant": "#c4c6d0",
                        "on-secondary": "#ffffff",
                        "surface": "#f9f9f9",
                        "secondary-fixed-dim": "#e9c176",
                        "surface-container-highest": "#e2e2e2",
                        "surface-container": "#eeeeee",
                        "on-tertiary-container": "#8b8b88",
                        "surface-container-high": "#e8e8e8",
                        "surface-container-low": "#f3f3f4",
                        "surface-tint": "#455f8a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "unit": "8px",
                        "margin": "64px",
                        "gutter": "32px",
                        "section-padding": "120px",
                        "container-max-width": "1440px"
                    },
                    "fontFamily": {
                        "body-lg": ["Manrope"],
                        "display": ["Noto Serif"],
                        "cta": ["Manrope"],
                        "label-caps": ["Manrope"],
                        "headline-h2": ["Noto Serif"],
                        "headline-h1": ["Noto Serif"],
                        "body-md": ["Manrope"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", {"lineHeight": "1.6", "letterSpacing": "0.01em", "fontWeight": "400"}],
                        "display": ["64px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "400"}],
                        "cta": ["14px", {"lineHeight": "1.0", "letterSpacing": "0.05em", "fontWeight": "500"}],
                        "label-caps": ["12px", {"lineHeight": "1.0", "letterSpacing": "0.15em", "fontWeight": "600"}],
                        "headline-h2": ["32px", {"lineHeight": "1.3", "fontWeight": "400"}],
                        "headline-h1": ["48px", {"lineHeight": "1.2", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "letterSpacing": "0.01em", "fontWeight": "400"}]
                    }
                },
            },
        },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/container-queries'),
    require('@tailwindcss/line-clamp')
  ]
};
