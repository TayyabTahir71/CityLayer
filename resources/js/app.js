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
            markers = {};

            let mymap0 = L.map('map').setView([38.6890, 11.14086], 2);
            osmLayer0 = L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    apikey: 'choisirgeoportail',
                    format: 'image/jpeg',
                    style: 'normal'
                }).addTo(mymap0);
            mymap0.addLayer(osmLayer0);
            mymap0.touchZoom.enable();
            mymap0.scrollWheelZoom.disable();

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    mymap0.setView([position.coords.latitude, position.coords.longitude], 17);
                    L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap0);
                });
            }
            
        });


