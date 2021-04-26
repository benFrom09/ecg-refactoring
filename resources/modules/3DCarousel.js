export class Carousel3D
{
    constructor(container,width) {
        this.isMobile = false;
            this.container = container;
            this.width = width;
            this.cells = [].slice.call(this.container.children) ;
            this.cellsCount = this.cells.length;
            this.prevBtn = document.querySelector(".previous-button");
            this.nextBtn = document.querySelector(".next-button");
            this.selectedIndex = 0;
            this.prev = this.prev.bind(this);
            this.next = this.next.bind(this);    
            this.changeCarousel();
            this.onResize();
      
            this.addListener();
        window.addEventListener('resize',this.onResize.bind(this));
    }
    onResize() {
        let mobile = window.innerWidth < 1024;
        if(mobile !== this.isMobile) {
            this.isMobile = mobile;
            this.changeCarousel();
            this.addListener();
        }
    }

    addListener() {
        if(!this.isMobile) {
            this.prevBtn.addEventListener('click',this.prev);
            this.nextBtn.addEventListener('click',this.next)
        } else {
            this.prevBtn.removeEventListener('click',this.prev);
            this.nextBtn.removeEventListener('click',this.next)
        }
    }

    prev() {
        console.log("click");
        this.selectedIndex--;
        this.rotateCarousel();
    }

    next() {
        this.selectedIndex++;
        this.rotateCarousel();
    }


    changeCarousel() {
        if(!this.isMobile) {
            this.theta = 360 / this.cellsCount;
            this.radius = Math.round((this.width / 2) / Math.tan(Math.PI/this.cellsCount));
            this.cells.forEach((cell,i) => {
                if(i < this.cellsCount) {
                    cell.style.opacity = 1;
                    let angle = this.theta * i;
                    console.log(angle);
                    cell.style.transform = `rotateY(${angle}deg) translateZ(${this.radius}px)`;
                } else {
                    cell.style.opacity = 0;
                    cell.style.transform ='none';
                }
            });
            this.rotateCarousel();
        } else {
            this.cells.forEach(cell => {
                cell.style.transform ='none';
            });
        }
        
       
    }
    rotateCarousel() {
        console.log(this);
        var angle = this.theta * this.selectedIndex * -1;
        console.log(angle);
        this.container.style.transform = `translateZ(${-this.radius}px) rotateY(${angle}deg)`;
    }
} 
