function fonction2()
{
   
  document.getElementById("rechercheC").selectedIndex=0; 
  document.getElementById("rechercheF").selectedIndex=0;   
  var val=document.getElementById("rechercheN").value;
  var Table = document.getElementById ("table");
  z=Table.rows.length-1;
  while(z>0){
  Table.deleteRow(1);
  z--; }

  
  



              httpRequest1 = new XMLHttpRequest();	
              httpRequest1.onreadystatechange = function() {
              var list= httpRequest1.responseText.split("|");
              var i=list.length-1;
              var z=0;
              var j=1;
                           
              while(i>0){	
                        
                                                  
                        // Insère une ligne dans la table à l'indice de ligne 0
                        var Ligne = Table.insertRow(j);
    
                        // Insère une cellule dans la ligne à l'indice 0
                        var Cellule0 = Ligne.insertCell(0);
                        // Ajoute un texte à la cellule
                        Cellule0.innerHTML=list[z+1];
	
	                      var Cellule1 = Ligne.insertCell(1);
                        Cellule1.innerHTML=list[z+2];
    
                        var Cellule2 = Ligne.insertCell(2);
                        Cellule2.innerHTML=list[z+3]+list[z+4];
                                        
    
                        var Cellule3 = Ligne.insertCell(3);
                        Cellule3.innerHTML=list[z+5];
    
                        var Cellule4 = Ligne.insertCell(4);
                        Cellule4.innerHTML=list[z+6];
    
                        var Cellule5 = Ligne.insertCell(5);
                        if(list[z+7]=="Oui")
                        {
                         couleur='color:#008000';
                        } 
                        else
                        {
                         couleur='color:#FFA500';
                        } 
                        Cellule5.innerHTML=list[z+7];
                        Cellule5.setAttribute("style",couleur);

                        var Cellule6 = Ligne.insertCell(6);
                        if(list[z+8]=="Oui")
                        {
                         couleur='color:#008000';
                         Cellule6.innerHTML="DISPONIBLE";
                        } 
                        else
                        {
                         couleur='color:#FFA500';
                         Cellule6.innerHTML="N'EST PAS DISPONIBLE";
                        } 
                        Cellule6.setAttribute("style",couleur);
         
                        j=j+1; 
                        i=i-9; 
                        z=z+9; }

                                                          };  
             
             httpRequest1.open("GET", "/rechercheParNom/'"+val+"' ", false);	 
             httpRequest1.send();

  
  
 }  