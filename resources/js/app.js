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
       



