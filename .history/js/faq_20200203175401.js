const items1 = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items1.forEach(item => item.addEventListener('click', toggleAccordion));