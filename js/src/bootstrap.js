import Alpine from 'alpinejs';
import TomSelect from 'tom-select';
import Pristine from 'pristinejs';
import {tns} from 'tiny-slider';
import SimpleLightbox from "simplelightbox";

window.Alpine = Alpine;
window.TomSelect = TomSelect;
window.Pristine = Pristine;
window.tns = tns;
window.SimpleLightbox = SimpleLightbox;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';