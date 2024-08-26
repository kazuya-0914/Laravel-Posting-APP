import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createI18n } from 'vue-i18n';

// メッセージのインポート
import ja from '../lang/ja.json';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const i18n = createI18n({
    legacy: false, // Composition APIを使用するための設定
    locale: 'ja', // デフォルトの言語
    fallbackLocale: 'en', // フォールバック言語
    messages: {
        ja,
    }
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app =  createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n)
            
        app.config.errorHandler = (err) => {
            console.error('Error during setup:', err);
        };
        app.mount(el)
    },
    progress: {
        color: '#4B5563',
    },
});
