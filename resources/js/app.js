import './bootstrap';

import Alpine from 'alpinejs';
import ToggleTheme from "@/toggle-theme.js";

window.Alpine = Alpine;

Alpine.start();

const { theme, setTheme, toggle } = ToggleTheme();

setTheme('system'); // Change by 'light' or 'dark'
