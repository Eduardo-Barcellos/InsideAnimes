let count = 1;
var rolar = true;


document.getElementById("radio1").checked = true;

function nextImage (){
  count++;
  if (count>4){
    count = 1;
  }
  document.getElementById("radio" + count).checked = true;
}


document.querySelector("#radio1").addEventListener('click', () => {
  rolar = false;
  count = 1;
});
document.querySelector("#radio2").addEventListener('click', () => {
  rolar = false;
  count = 2;
});
document.querySelector("#radio3").addEventListener('click', () => {
  rolar = false;
  count = 3;
});
document.querySelector("#radio4").addEventListener('click', () => {
  rolar = false;
  count = 4;
});



setInterval( function(){
  if (rolar) {
        nextImage();
  }  else {
    rolar = true;
  }
}, 4000)


