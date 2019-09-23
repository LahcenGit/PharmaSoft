	function fonction4(idM)
{
  var idMedic=idM;
   
  var valM=document.getElementById("rechercheM").value;
  var valA=document.getElementById("rechercheA").value;    
  var Table = document.getElementById ("table1");
  z=Table.rows.length-1;
  while(z>0){
  Table.deleteRow(1);
  z--; }
              httpRequest = new XMLHttpRequest();	
              httpRequest.onreadystatechange = function() {
              var list= httpRequest.responseText.split("|");
              var i=list.length-1;
              var z=0;
              var j=0;
              while(i>0){
                        
                        j=j+1; 
                        // Insère une ligne dans la table à l'indice de ligne 0
                        var Ligne = Table.insertRow(j);
                        
                        // Insère une cellule dans la ligne à l'indice 0
                        var Cellule0 = Ligne.insertCell(0);
                        // Ajoute un texte à la cellule
                        Cellule0.innerHTML=list[z];
                     
                        var Cellule1 = Ligne.insertCell(1);
                        // Ajoute un texte à la cellule
                        Cellule1.innerHTML=list[z+1];
                  
                        var Cellule2 = Ligne.insertCell(2);
                        // Ajoute un texte à la cellule
                        Cellule2.innerHTML=list[z+2];
                  
                        var Cellule3 = Ligne.insertCell(3);
                        // Ajoute un texte à la cellule
                        Cellule3.innerHTML=list[z+3];
                  
                        var Cellule4 = Ligne.insertCell(4);
                        // Ajoute un texte à la cellule
                        Cellule4.innerHTML=list[z+4];
                  
                        var Cellule5 = Ligne.insertCell(5);
                        // Ajoute un texte à la cellule
                        Cellule5.innerHTML=list[z+5];
		                    
                        var Cellule5 = Ligne.insertCell(6);
                        Cellule5.setAttribute("id",j);
    
                        var btnE = document.createElement("button");
                        btnE.innerHTML='Editer';
                        btnE.setAttribute("class","btn btn-outline-success espace ");
                        btnE.setAttribute("onclick",'location.href= "/lot/edite/'+list[z+6]+' " ');
                        document.getElementById(j).appendChild(btnE);
                        
                        
                        var btnS = document.createElement("BUTTON");
                        btnS.innerHTML='Supprimer'; 
                        btnS.setAttribute("class","btn btn-outline-danger espace");
                        btnS.setAttribute("onclick",'fonction11("'+list[z+6]+'")');
                        document.getElementById(j).appendChild(btnS);
                        
                       
                        var btnD = document.createElement("BUTTON");
                        btnD.innerHTML='Etat';
                        btnD.setAttribute("class","btn btn-outline-primary espace ");
                        btnD.setAttribute("onclick",'fonction10("'+list[z+6]+'")');
                        document.getElementById(j).appendChild(btnD);
    
                        i=i-7; 
                        z=z+7; }
                                                         };  
             
                 httpRequest.open("GET", "/rechercheParDate/'"+valM+"'/'"+valA+"'/'"+idMedic+"' ", false);
	               httpRequest.send();

  /*var tfoot = document.createElement("tfoot");
  Table.appendChild(tfoot);

  var tr = document.createElement("tr");
  tfoot.appendChild(tr);

  var th1 = document.createElement("th");
  th1.innerHTML="Numero";
  tr.appendChild(th1);

  var th2 = document.createElement("th");
  th2.innerHTML="Quantité";
  tr.appendChild(th2);

  var th3 = document.createElement("th");
  th3.innerHTML="Date De Fabriction";
  tr.appendChild(th3);

  var th4 = document.createElement("th");
  th4.innerHTML="Date De Péremption";
  tr.appendChild(th4);

  var th5 = document.createElement("th");
  th5.innerHTML="Prix d'Achat";
  tr.appendChild(th5);

  var th6 = document.createElement("th");
  th6.innerHTML="Prix de Vente";
  tr.appendChild(th6);

  var th7 = document.createElement("th");
  th7.innerHTML="Actions";
  tr.appendChild(th7);   */              
}

    
 