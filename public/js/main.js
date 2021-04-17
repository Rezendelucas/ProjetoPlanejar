import Vue from 'vue'
import mask from 'path_to_component.vue'

var app = new Vue({
    el: "#app", //root element name
    components: {'x-mask': mask},

    data:{
        title: 'Hello World!'
    }
});
