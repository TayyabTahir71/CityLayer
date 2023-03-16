import './bootstrap';
import Alpine from 'alpinejs'
import barba from '@barba/core';
import { Collapse } from 'flowbite';

 
window.Alpine = Alpine
 
Alpine.start()

barba.init(
    {
        prevent: ({ el }) => el.classList && el.classList.contains('prevent')
    }
);
        barba.hooks.afterEnter((data) => {
            $(window).scrollTop(0);
        });

        const $targetEl = document.getElementById('targetEl');

// optionally set a trigger element (eg. a button, hamburger icon)
const $triggerEl = document.getElementById('triggerEl');

// optional options with default values and callback functions
const options = {
  onCollapse: () => {
      console.log('element has been collapsed')
  },
  onExpand: () => {
      console.log('element has been expanded')
  },
  onToggle: () => {
      console.log('element has been toggled')
  }
};
