import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import "@protonemedia/laravel-splade/dist/jodit.css";
import RepeaterComponent from './components/RepeaterComponent.vue';
import ToggleComponent from './components/ToggleComponent.vue';

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

const el = document.getElementById("app");

const app = createApp({
    render: renderSpladeApp({ el })
});

app.component('repeater-component', RepeaterComponent);
app.component('toggle-component', ToggleComponent);

app.use(SpladePlugin, {
    "max_keep_alive": 10,
    "transform_anchors": false,
    "progress_bar": true
});

app.mount(el);
