'use strict'
const delievery = document.getElementById("delievery");
const modal = document.querySelector(".modal")
const btnCloseModal=document.querySelector(".close-modal")
const overlay=document.querySelector('.overlay')



delievery.addEventListener('click',function(){
    modal.classList.remove("hidden");
    overlay.classList.remove('hidden')


})

btnCloseModal.addEventListener('click',function(){
    modal.classList.add('hidden')
    overlay.classList.add('hidden')


});

overlay.addEventListener('click',function(){
    modal.classList.add('hidden')
    overlay.classList.add('hidden')


})