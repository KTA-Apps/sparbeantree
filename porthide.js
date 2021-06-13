setInterval (function hidePort(){
    var City = document.getElementById('city').value;
         if (City=='Tshwane/Pretoria'){
         document.getElementById("hidePTAtown").style.display = "block";
                 document.getElementById("townsJHB").removeAttribute("required");
     }else{
         document.getElementById("hidePTAtown").style.display = "none";
     }
 }, 1000);

hidePort();
