d=document;w=window;c=console;


w.onload=()=>{
  // LAZY LOAD FUNCTIONS
  var lBs=[].slice.call(d.querySelectorAll(".lazy-background")),lIs=[].slice.call(d.querySelectorAll(".lazy")),opt={threshold:.01};
  if("IntersectionObserver" in window){
    let lBO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.add("visible");lBO.unobserve(l)}})},opt),
        lIO=new IntersectionObserver(es=>{es.forEach(e=>{if(e.isIntersecting){let l=e.target;l.classList.remove("lazy");lIO.unobserve(l);l.srcset=l.dataset.url}})},opt);
    lIs.forEach(lI=>{lIO.observe(lI)});lBs.forEach(lB=>{lBO.observe(lB)});
  }
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
if(x.length>0){showDivs(j);carousel()}


// Mobile behavior

const alternateMobileMenu=()=> {
  const navBar=d.querySelector("#mobileNav");
  if(navBar.classList.contains("menuActive")){
    navBar.classList.remove("menuActive")
  }else{
    navBar.classList.add("menuActive")
  }
}
