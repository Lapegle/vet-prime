/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.{html,js,vue}"],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    "primary": "#c47fe2",
                    "secondary": "#661ac9",
                    "accent": "#4ed891",
                    "neutral": "#272830",
                    "base-100": "#f1f1f9",
                    "info": "#5a79dd",
                    "success": "#28a45a",
                    "warning": "#ee902b",
                    "error": "#fb5157",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
}

