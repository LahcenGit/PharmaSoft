function fonction3()
{        
         var val=document.getElementById("forme").value;
         document.getElementById("dosage").disabled = false;
         if(val=='Sirop' || val=='Patch')
         {
         document.getElementById("dosage").disabled = true;
         }
             
         var select=document.getElementById("dosageUnit");
           
         select.options.length=0;
        
         httpRequest = new XMLHttpRequest();
          
         httpRequest.onreadystatechange = function() {
             
         var list= httpRequest.responseText.split("|");
         for(i=0;i<list.length-1;i++)
	     {
	     <!--creation un champ option--> 	
         var option = document.createElement('option');
    	 <!--associer au champ option une valeur de la list--> 	
         option.innerHTML=list[i];
		 <!--associer au champ select le champ option-->
         select.appendChild(option);

	     }
         };  
   
                 httpRequest.open("GET", "/rechercheDosageUnit/'"+val+"' ", false);
	             httpRequest.send();
    
}  