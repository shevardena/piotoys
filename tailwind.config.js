import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        // "./app/Forms/*.php",
        // "./app/Tables/*.php",
    ],

    theme: {
        extend: {
            colors: {
                'pio-blue': '#48637f',
                'pio-orange': '#dfa848',
                'pio-green': '#5a8a4a',
                'pio-lightgreen': '#9fc22f',
            },
        },
    },

    plugins: [forms, typography],
};
