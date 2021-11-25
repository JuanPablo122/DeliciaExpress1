addEventListener('DOMContentLoaded',()=>{
  const imagenes=['imagenes/imagen.jpg','imagenes/hamburguesa.jpg','imagenes/salchipapa.jpg','imagenes/perro.jpg','imagenes/general.jpeg'];
  let i=1;
  const img1=document.querySelector('#imagen');
  const img2=document.querySelector('#imagen1');
  const barra=document.querySelector('#barra');

  let porcentaje_base=100/imagenes.length;
  let porcentaje_actual= porcentaje_base;

  for (let index = 0; index< imagenes.length; index++) {
    const div= document.createElement('div');
    div.id= index;
  }
  barra.style.width= `${porcentaje_base}%`;
  img1.src=imagenes[0];

  const slideshow=() => {
    img2.src=imagenes[i];
    img2.classList.add('active');
    i++;
    porcentaje_actual+= porcentaje_base;
    barra.style.width= `${porcentaje_actual}%`;
    if (i == imagenes.length) {
      i=0;
      porcentaje_actual=porcentaje_base- porcentaje_base;
    }

    setTimeout(() =>{
      img1.src= img2.src;
      img2.classList.remove('active');
    },500);
  }

  setInterval(slideshow,3000);

});