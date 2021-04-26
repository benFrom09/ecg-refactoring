import './app.css';
import './modules/Carousel/Carousel.css';
import {createHTML} from "./modules/createHTML";
import Carousel from './modules/Carousel/Carousel';
import {Carousel3D} from "./modules/3DCarousel.js";

let filesExtention = [
    "jpg","png","jpeg"
]
function imagePreview(){
        let fileInput = document.querySelector("#article_image");
       let preview = document.querySelector("#preview");
       fileInput.addEventListener('click',(e)=>{
            preview.innerHTML = "";
       });
       fileInput.addEventListener("change",(e) => {
            let files = null;
            let image =null;
            let figure = document.createElement("figure");
            figure.classList.add("image");
            image = new Image();
            files = e.target.files;
            if(files && files[0]){
                if(!files[0].name.substr(-4).match(/.jpg|.JPG|jpeg|.png|.PNG/)) return new Error("File extention must be jpg or png");
                let reader = new FileReader();
                reader.addEventListener("load",(e) =>{
                    image.src = e.target.result;
                });
                reader.readAsDataURL(files[0]);
                figure.appendChild(image);
                preview.appendChild(figure);
            }
       });
}
function setCourseInfos(course) {
    
    if(course.name !== "Voiturettes" && course.name !== "Chariots") {
        return course.status == 1 ? "Ouvert" : "Fermé";
    } else {
        return course.status == 1 ? "Autorisé(e)s" : "Interdit(e)s";
    }
}
function toggleClassName(element, className) {
    if (element.classList.contains(className)) {
        element.classList.remove(className);
    }
    else {
        element.classList.add(className);
    }
}

function toggleNavbar(e) {
    toggleClassName(App.nav, 'nav-opened');
}

function onResize(e) {
    let mobile = window.innerWidth < 1261
    if(mobile !== App.isMobile) {
        App.isMobile = mobile;
    }
    if(App.isMobile){
        App.hamburgerBtn.addEventListener("click",toggleNavbar);
    } else {
        App.hamburgerBtn.removeEventListener("click",toggleNavbar);
    }
}


function closeModal() {
    const modalBtns = document.querySelectorAll('.modal-close');
    const modal = document.querySelector('.modal');
    modalBtns.forEach(btn => {
        btn.addEventListener('click',(e) => {
            e.preventDefault();
            toggleClassName(modal,'is-active');
        });
    });

}


    

const App = {
    nav:document.querySelector('nav'),
    hamburgerBtn:document.querySelector("#hamburger"),
};
/*********************************************************************
 *                         SWITCH URL                                 * 
 *********************************************************************/
document.addEventListener('DOMContentLoaded',() =>{
    onResize();
    closeModal();
    if(window.location.pathname === "/") {
        new Carousel(document.querySelector("#home-carousel"),{
            slidesToShow:4,
            slidesToScroll:2,
            navigation:true,
            infinite:true,     
        });
    }
    //end location.pathname = /

    if(window.location.pathname === '/grand-prix' || window.location.pathname === '/wininone') {
        const affiche = document.querySelector('.click_img');
        const modal = document.querySelector('.modal');
        affiche.addEventListener('click',(e) => {
            toggleClassName(modal,'is-active');
        });
    }

   if(window.location.pathname === "/about") {
        new Carousel3D(document.querySelector(".carousel3d"),700);
   }
   

    if(window.location.pathname === "/ecg-login") {
        const loginBtn = document.querySelector("#loginBtn");
        let form = document.querySelector("#loginForm");
        let loginInputs = document.querySelectorAll("#loginForm input");
        if(document.querySelector(".message")) {
            document.querySelector(".delete").addEventListener("click",(e) => {
                document.querySelector(".message").style.display = "none";
            });
        }
        form.addEventListener("submit",(e)=> {
            e.preventDefault();
            let errors= [];
            loginInputs.forEach(input => {               
               if(input.name !=="_csrf") {                   
                    if(input.value === "" || input.value === null || input.value === undefined) {
                        let message = "Le champ ne doit pas être vide!"
                       errors.push(message);
                       let helpSpan = input.nextElementSibling.nextElementSibling;
                       helpSpan.style.color = "#ff0202";
                       helpSpan.textContent = message ;
                    }
               }
               input.addEventListener("focus",(e) => {
                    input.nextElementSibling.nextElementSibling.textContent = "" ;
               });
            });
            if(errors.length > 0) {
                console.log(errors);
            } else {
                form.submit();
            }
        });  
    }
    
    if(window.location.pathname === '/admin/index') {
        let offerInputs = document.querySelectorAll(".special-offer-input");
        let courseInputs = document.querySelectorAll(".course-check");
        let courseInfos = document.querySelector(".course-infos");
        let courses = [];
        courseInputs.forEach((el,i)=>{
            let course = {};
            let infos = null;
            course.id = i;
            course.status = el.nextElementSibling.value;
            course.name = el.nextElementSibling.nextElementSibling.textContent;
            course.textColor = el.nextElementSibling.value == "1" ? "#48c774" :"#f14668";
            infos = setCourseInfos(course);
            courses.push(course);
            // create pannel info 
            let div = createHTML({
                el:"div",
                attributes:{
                    className:["content"],
                },
                innerHTML:`${course.name}: <span data-id=${course.id} class="course-infos">${infos}</span>`
            });
            div.childNodes[1].style.color = course.textColor;
            courseInfos.appendChild(div);
            el.addEventListener('change',(e)=> {
                let hiddenInput = e.target.nextElementSibling;
                hiddenInput.value = hiddenInput.value == "1" ? "0" : "1";
                //hiddenInput.value == "1" ? hiddenInput.setAttribute("checked",true) : hiddenInput.removeAttribute("checked");
                let iconClass = hiddenInput.value == 1 ? "far fa-grin-beam" : "far fa-frown";
                let icon = hiddenInput.nextElementSibling.nextElementSibling.childNodes[1];
                icon.className = iconClass;
                course.status = hiddenInput.value;
                course.name = hiddenInput.nextElementSibling.textContent;
                course.textColor = hiddenInput.value == "1" ? "#48c774" :"#f14668";
                infos = setCourseInfos(course);
                let elements = document.querySelectorAll(".course-infos");
                elements.forEach(el => {
                    if(el.dataset.id == course.id) {
                        el.textContent = infos;
                        el.style.color = course.textColor;
                    }
                });
                
            });
        });
        offerInputs.forEach((el,i) => {
            el.addEventListener('change',(e)=>{
                e.preventDefault();
                console.log(e.target);
                e.target.value = e.target.value == "1" ? "0" : "1";
                e.stopPropagation();
            });
        });

            
    }
    //end location = admin/index
    if(window.location.pathname === "/admin/article/add"){
        imagePreview();
    
    }
    if(window.location.pathname.match(/^\/admin\/article\/[0-9]+$/g)){
        imagePreview();
    }
    
    window.addEventListener('resize',onResize);
    console.log(App);
});
//end domcontentloaded

