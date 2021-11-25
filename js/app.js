const lista_items = document.querySelectorAll('.lista-item');
const listas=document.querySelectorAll('.lista');

let draggedItem= null;

for (let i = 0; i < lista_items.length; i++) {
  const item = lista_items[i];

  item.addEventListener('dragstart', function(){
    draggedItem = item;
    setTimeout(function(){
      item.style.display='none';
    },0)
    
  });

  item.addEventListener('dragend', function(){
    setTimeout (function(){//Tiempo de espera
      draggedItem.style.display='block';
      draggedItem= null;
    },0);
    
  });

  for (let j = 0; j < listas.length; j++) {
    const lista=listas[j];

    lista.addEventListener('dragover', function(e){//detecta
      e.preventDefault();    
    });

    lista.addEventListener('dragenter', function(e){//ingresa
      e.preventDefault();
      this.style.backgroundColor='rgba(241, 196, 15,0.7)';

    });

    lista.addEventListener('dragleave', function(e){
      this.style.backgroundColor='rgba(241, 196, 15,0.8)';
    });

    lista.addEventListener('drop', function(e){//encapsula
      console.log('drop');
      this.append(draggedItem);
       this.style.backgroundColor='rgba(241, 196, 15,0.8)';
    });
    
  }
}