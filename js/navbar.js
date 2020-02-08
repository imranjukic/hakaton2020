(function(){window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}
document.querySelector('#dropDown-nav').style.display = 'none';
document.querySelector('.dropDown').addEventListener('click',() => {
  const el = document.querySelector('#dropDown-nav');
  if(el.style.display != 'none')el.style.display = 'none';
  else if(el.style.display != 'block')el.style.display = 'block';
})
})();