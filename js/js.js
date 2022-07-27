
// phần bắt sự kiện scroll
var header =document.querySelector('header');

window.addEventListener("scroll",function(){ 
    if(window.pageYOffset)
    {
        if(window.pageYOffset>=170)
        {
         header.classList.add('ps_fixed');
         
        }
        if(window.pageYOffset<100){
            header.classList.remove('ps_fixed')
        }
    }
 })