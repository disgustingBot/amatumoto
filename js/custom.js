d=document;w=window;c=console;
const id = x => d.getElementById(x);

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
  // x.forEach( y => {
    if (mainClass) {
      x.classList.forEach(item => {
        if(item!=mainClass && item!=clase){
          x.classList.remove(item);
        }
      });
    }

    x.classList.toggle(clase)

  // });

}





var loginFormState = 0;
const loginHandler = (a) => {
  altClassFromSelector('alt','#logFormFields');

  // function addRequired() {
      const requiredElement = d.querySelectorAll('.variableRequired');
      requiredElement.forEach( element => {
        if(element.hasAttribute('required')) {
          element.removeAttribute('required');
        }else {
            element.setAttribute('required', 'true');
        }
      });

      if (d.querySelector('#logInterAction').value=='login'){
        d.querySelector('#logInterAction').value='register'
      } else {
        d.querySelector('#logInterAction').value='login'
      }
    // }
}










var arr = Array.prototype.slice.call( d.getElementsByClassName("auctionInfoBtn") )
arr.forEach( (item, i) => {
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
const selectBoxControler=(a, selectBoxId, current)=>{ // c.log(a)
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


// Segment dinamic selector (filterbar)
if(!!d.querySelector('#filterBar')){
  var raceBike = d.getElementById('selectBox43');
  var roadBike = d.getElementById('selectBox44');
  var filterBarBotttom = d.getElementById('filterBarBotttom');
  raceBike.querySelector('.selectBoxPlaceholder').innerText = 'Segment';
  roadBike.querySelector('.selectBoxPlaceholder').innerText = 'Segment';
  // c.clear();
  var arrFilter = Array.prototype.slice.call( d.getElementById('selectBox32').querySelectorAll('input') )
  arrFilter.forEach( (item, i) => { //  c.log(item);
    item.addEventListener("change", ()=>{
      altClassFromSelector(item.value,'#filterBarBotttom','filterBarBotttom')
      c.log(item.value);

      if(raceBike.classList.contains('alt')){raceBike.classList.remove('alt')}
      if(roadBike.classList.contains('alt')){roadBike.classList.remove('alt')}
      id('nul43').checked=true;
      id('nul44').checked=true;
      selectBoxControler('','#selectBox43','#selectBoxCurrent43')
      selectBoxControler('','#selectBox44','#selectBoxCurrent44')
      setUrlVar('race-bike','')
      setUrlVar('road-bike','')
    });
  });
}








// URL HANDLING
const setUrlVar = ( variable, value = '' ) => {
  var filterQueries = new Array();
	// urlVirg es la url sin variables
  var urlVirg = w.location.href.split('?')[0];
	// urlVars será el vector de variables en la url
  // var urlVars = w.location.href.split('?');
  // urlVars.shift();
  // urlVars = !urlVars[0] ? [] : urlVars.join().split('&');

  var urlVars = getUrlVars();

	var variables = urlVars.map( x => x.split('=')[0] );
  var values  = urlVars.map( x => x.split('=')[1] );

  // c.log(page)


	if(variable){
		if(variables.includes(variable)){
			let j=0;
			urlVars.forEach((item, i) => {
				if ( variables[i] == variable ) {
					// si la categoria es 0 quita el filtro
					if (value != '') { filterQueries[j] = variable + '=' + value; j+=1; }
				} else { filterQueries[j] = item; j+=1; }
			});
		} else if (value != '') {
			urlVars.forEach((item, i) => {
				filterQueries[i] = item;
			});
			filterQueries.push(variable + '=' + value);
		}
	}
  let conector = filterQueries.length != 0 ? '?' : '';
  w.history.replaceState('', 'Title', urlVirg + conector + filterQueries.join('&'));
  c.log(filterQueries)
  return filterQueries;
}

const getUrlVars = () => {
  var urlVars = w.location.href.split('?');
  urlVars.shift();
  urlVars = !urlVars[0] ? [] : urlVars.join().split('&');

  return urlVars;
}
// END OF URL HANDLING
// setUrlVar('pepe', 1);
// setUrlVar('camilo', 1);
// setUrlVar('claudio', 1);
// setUrlVar('papa', 1);
// setUrlVar('pipi', 1);
// setUrlVar('popo', 1);
// setUrlVar('pupu', 1);







  var correctCaptcha = function(response) {
    alert(response);
    var url='https://www.google.com/recaptcha/api/siteverify';
    var dataNames=['secret','response'];
    var dataValues=['6LcRuNAUAAAAADtamJW75fYf8YtNHceSngjKsf-B',response];
    postAjaxCall(url, dataNames, dataValues).then(v=>{
      try{ c.log(v)
        // d.getElementById(id).innerHTML=JSON.parse(v).length;
        respuesta=JSON.parse(v);
        c.log(respuesta);
      }catch(err){
        c.log(err);c.log(v)
      }
    })
  };

  function captchaVerified(){
    var boton = d.querySelectorAll('.butttonSend');
    boton.forEach( x => {x.removeAttribute('disabled')});

    // boton.removeAttribute('disabled');

    // correctCaptcha('6LcRuNAUAAAAALBu7Ymh0yxmTXTJmP0rsnkjGyj0');
  }
