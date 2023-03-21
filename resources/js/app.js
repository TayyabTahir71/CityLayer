import './bootstrap';
import Alpine from 'alpinejs'
import barba from '@barba/core';


 
window.Alpine = Alpine
 
Alpine.start()

barba.init(
    {
        prevent: ({ el }) => el.classList && el.classList.contains('prevent')
    }
);
       



