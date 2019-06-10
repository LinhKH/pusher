

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('message', require('./components/message.vue').default);

const app = new Vue({
  el: '#app',
  data: {
    message: '',
    typing: '',
    numberOfUser: 0,
    chat: {
      message: [],
      user: [],
      color: [],
      time: [],
    }
  },
  watch: {
    message() {
      Echo.private('chat')
        .whisper('typing', {
          name: this.message
        });
    }
  },
  methods: {
    send() {
      if (this.message.length > 0) {
        this.chat.message.push(this.message);
        this.chat.color.push('success');
        this.chat.user.push('you');
        this.chat.time.push(this.getTime());
        axios.post('/send', {
          message: this.message
        })
          .then(response => {
            console.log(response);
            this.message = '';
          })
          .catch(error => {
            console.log(error);
          });
      }
    },
    getTime() {
      let time = new Date();
      return time.getHours() + ":" + time.getMinutes();
    }
  },
  mounted() {
    Echo.private('chat')
      .listen('ChatEvent', (e) => {
        this.chat.message.push(e.message);
        this.chat.color.push('warning');
        this.chat.user.push(e.user);
        this.chat.time.push(e.time);
        // console.log(e);
      })
      .listenForWhisper('typing', (e) => {
        if (e.name != '') {
          this.typing = 'typing';
          console.log('typing');
        } else {
          this.typing = '';
        }
      });
    Echo.join(`chat`)
      .here((users) => {
        // console.log(users);
        this.numberOfUser = users.length;

      })
      .joining((user) => {
        console.log(user.name);
        this.numberOfUser += 1;
        this.$toaster.info( user.name + 'joined....')
      })
      .leaving((user) => {
        this.$toaster.info( user.name + 'leaved....')
        this.numberOfUser -= 1;
        // console.log(user.name);
      });
  },
});

