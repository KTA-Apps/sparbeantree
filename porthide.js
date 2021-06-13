setInterval (function hidePort(){
    var shop = document.getElementById('shop').value;
         if (shop=='ferndale'){
         document.getElementById("ferndale").style.display = "block";
     }
 }, 1000);
hidePort();
