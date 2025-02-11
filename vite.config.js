import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.css',

                'resources/css/bootstrap.css',
                'resources/css/font-awesome.css',
                'resources/css/pricing.css',
                'resources/css/basic.css',
                'resources/css/custom.css',

                'resources/js/jquery-1.10.2.js',
                'resources/js/bootstrap.js',
                'resources/js/jquery.metisMenu.js',
                'resources/js/custom.js',
            ],
            refresh: true,
        }),
    ],
});
