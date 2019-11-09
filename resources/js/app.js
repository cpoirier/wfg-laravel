global.$ = global.jQuery = require('jquery');

require('./wfgMain');
require('./bootstrap-util');
require('./bootstrap-carousel');

window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('voting-component', require('./components/voting.vue').default);
Vue.component('carousel-component', require('./components/carousel.vue').default);

window.onload = function() {
  const app = new Vue({
      el: '#layout',
  });

}