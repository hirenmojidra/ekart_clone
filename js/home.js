let darkmode = document.getElementById('dark-mode');

let changeMode = ()=>{
      let body = document.getElementById('body');
      let items = document.getElementById('items');
      let product = document.getElementById('product');
      let product_item2 = document.getElementById('product-item2');
      let otheritems = document.getElementById('otheritems');

      body.classList.toggle('changemode');
      items.classList.toggle('changemode');
      product.classList.toggle('changemode');
      product_item2.classList.toggle('changemode');
      otheritems.classList.toggle('changemode');
}

darkmode.addEventListener('click', changeMode);