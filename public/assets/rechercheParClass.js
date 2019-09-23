
function fonction()
{
	
  document.getElementById("rechercheN").value = "";  
  var val=document.getElementById("rechercheC").value;
  var Table = document.getElementById ("table");
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
                        Cellule5.setAttribute("id",j);
    
                        var btnE = document.createElement("button");
                        btnE.innerHTML='Editer';
                        btnE.setAttribute("class","btn btn-outline-success espace ");
                        btnE.setAttribute("onclick",'location.href= "/medicament/edite/'+list[z]+' " ');
                        document.getElementById(j).appendChild(btnE);
                        
                        
                        var btnS = document.createElement("BUTTON");
                        btnS.innerHTML='Supprimer'; 
                        btnS.setAttribute("class","btn btn-outline-danger espace");
                        btnS.setAttribute("onclick",'fonction12("'+list[z]+'")');
                        document.getElementById(j).appendChild(btnS);
                        
    
                        var btnD = document.createElement("BUTTON");
                        btnD.innerHTML='Detail';
                        btnD.setAttribute("class","btn btn-outline-primary espace ");
                        btnD.setAttribute("onclick",'location.href= "/medicament/details/'+list[z]+' " ');
                        document.getElementById(j).appendChild(btnD);
    
                 
                        var btnG = document.createElement("BUTTON");
                        btnG.innerHTML='Gerer Lots'; 
                        btnG.setAttribute("class","btn btn-outline-warning espace");
                        btnG.setAttribute("onclick",'location.href= "/lots/gerer/'+list[z]+' " ');
                        document.getElementById(j).appendChild(btnG);
                        
                       
	                    i=i-7; 
                        z=z+7; }
                                                         };  
             
                 httpRequest.open("GET", "/rechercheParClass/'"+val+"' ", false);
	               httpRequest.send();


  /*var tfoot = document.createElement("tfoot");
  Table.appendChild(tfoot);

  var tr = document.createElement("tr");
  tfoot.appendChild(tr);

  var th1 = document.createElement("th");
  th1.innerHTML="Nom Chimique";
  tr.appendChild(th1);

  var th2 = document.createElement("th");
  th2.innerHTML="Forme";
  tr.appendChild(th2);

  var th3 = document.createElement("th");
  th3.innerHTML="Dosage";
  tr.appendChild(th3);

  var th4 = document.createElement("th");
  th4.innerHTML="Quantité";
  tr.appendChild(th4);

  var th5 = document.createElement("th");
  th5.innerHTML="Nombre Lots";
  tr.appendChild(th5);

  var th6 = document.createElement("th");
  th6.innerHTML="Actions";
  tr.appendChild(th6);   */              
    
}

    
