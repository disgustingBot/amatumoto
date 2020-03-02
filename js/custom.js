d=document;w=window;c=console;


w.onload=()=>{
  // LAZY LOAD FUNCTIONS
  var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
  if("IntersectionObserver" in window){
    let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
        lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
    lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
  }

  if(detectWidth() < 768 && d.querySelector('#filterBar')){altClassFromSelector('alt','#filterBar')}

  d.getElementById("load").style.top="-100vh";
}


// SLIDER:
var j=1,x=d.getElementsByClassName("carouselItem");
const showDivs=n=>{
  if(n>x.length){j=1}
  if(n<1){j=x.length}
  for(i=0;i<x.length;i++){x[i].classList.add("inactive")}
  x[j-1].classList.remove("inactive");
}
const carousel=()=>{j++;
  for(i=0;i<x.length;i++){x[i].classList.add("inactive")}
  if(j>x.length){j=1}
  x[j-1].classList.remove("inactive");
  setTimeout(carousel, 8000); // Change image every N/1000 seconds
}
const plusDivs=n=>{showDivs(j+=n)}
if(x.length>0){showDivs(j);setTimeout(carousel, 8000);}


// SLIDER TESTIMONIALS
var t=1,e=d.getElementsByClassName("testimonialCarusel");
const showTesti=n=>{
  if(n>e.length){t=1}
  if(n<1){t=e.length}
  for(i=0;i<e.length;i++){e[i].classList.add("inactive");}
  e[t-1].classList.remove("inactive");
}
const testi=()=>{t++;
  for(i=0;i<e.length;i++){e[i].classList.add("inactive");}
  if(t>e.length){t=1}
  e[t-1].classList.remove("inactive");
  setTimeout(testi, 10000); // Change image every N/1000 seconds
}
const plusTesti=n=>{showTesti(t+=n)}
if(e.length>0){showTesti(t);setTimeout(testi, 10000);}




// Gallery SLIDER:
var k=1,y=d.getElementsByClassName("galleryCarousel");
// c.log(y)
const showImgs=(n,plus)=>{
  if(n>=y.length){k=0}
  if(n<0){k=y.length-1}
  for(i=0;i<y.length;i++){y[i].classList.add("inactive")}
  if(plus){y[k].classList.remove("inactive")}
  else{k=n;y[n].classList.remove("inactive")}
  d.querySelector('#gallery').classList.remove('video');
}
const plusImgs=n=>{showImgs(k+=n,true)}
const selectImgs=n=>{showImgs(n,false)}
if(y.length>0){showImgs(0)}










// alternates a class from a selector of choice, example:
// <div class="someButton" onclick="altClassFromSelector('activ', '#navBar')"></div>
const altClassFromSelector = ( clase, selector, mainClass = false )=> {
  const x = d.querySelector(selector);
  // if there is a main class removes all other classes
  if (mainClass) {
    x.classList.forEach((item, i) => {
      if(item!=mainClass){
        // c.log(item);
        x.classList.remove(item);
      }
    });
  }

  if(x.classList.contains(clase)){
    x.classList.remove(clase)
  }else{
    x.classList.add(clase)
  }
}


var arr = Array.prototype.slice.call( d.getElementsByClassName("auctionInfoBtn") )
arr.forEach( (item, i) => { c.log(i);
  item.addEventListener("click", ()=>{
    altClassFromSelector('auctionFaq'+i,'#auctionsInformationPage','auctionsInformationPage')
  });
});

// for (i = 0; i < acc.length; i++) {
//   c.log(i);
//   acc[i].addEventListener("click", ()=>{
//     altClassFromSelector('cosa'+i,'#auctionsInformationPage','auctionsInformationPage')
//   });
// }









// SELECT BOX CONTROLER
const selectBoxControler=(a, selectBoxId, current)=>{c.log(a)
  if(!!a){d.querySelector(selectBoxId).classList.add('alt')}
  else   {d.querySelector(selectBoxId).classList.remove('alt')}

  d.querySelector(current).innerHTML=a;
  d.activeElement.blur();
}


// GO BACK BUTTONS
function goBack(){w.history.back()}











// mateput controller
const updateRequired=e=>{if(e.value==''){e.classList.remove('alt')}else{e.classList.add('alt')}}
if(d.querySelectorAll('.mateputInput')){
  mateput=d.querySelectorAll('.mateputInput');
  mateput.forEach(e=>{
    updateRequired(e);
    e.addEventListener('input',()=>{updateRequired(e)});
  });
}



function detectWidth() {
  return window.innerWidth || window.document.documentElement.clientWidth || Math.min(window.innerWidth, window.document.documentElement.clientWidth) || window.innerWidth || window.document.documentElement.clientWidth || window.document.getElementsByTagName('body')[0].clientWidth;
}


//Accordion //Desplegable

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
      panel.style.padding = "0";
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      panel.style.padding = "20px";
    }
  });
}
