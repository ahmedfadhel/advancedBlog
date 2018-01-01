require('./bootstrap');

window.Vue = require('vue');
import Buefy from 'buefy'

Vue.use(Buefy);

$(document).ready(function(){
  $('button.dropdown').hover(function(){
    $(this).toggleClass('is-open');
  })
});
require('./manage');