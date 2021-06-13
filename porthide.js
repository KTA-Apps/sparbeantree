setInterval (function hidePort(){
    var shop = document.getElementById('city').value;
         if (shop=='ferndale'){
         document.getElementById("hidePTAtown").style.display = "block";
     }
 }, 1000);
hidePort();
