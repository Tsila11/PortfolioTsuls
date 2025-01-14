const menus = document.querySelector('#menu-icon');
let navbar = document.querySelector('#navbar');
let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');


window.onscroll = ()=>{
    sections.forEach(section=>{
            let top = window.scrollY;
            let offset = section.offsetTop - 150;
            let height = section.offsetHeight;
            let id=section.getAttribute('id');

            if(top >= offset && top < offset + height){
                navLinks.forEach(links =>{
                    links.classList.remove('active');
                    document.querySelector('header nav a[href*=' +id + ']').classList.add('active');
                })
            }
    });
}
menus.addEventListener('click',()=>{
    navbar.classList.toggle('affiche')
    navbar.classList.toggle('active');
})

