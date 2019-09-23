function fonction10(idl){
    
   
     var div=document.getElementById("contenue");
     var idL=idl;
              httpRequest = new XMLHttpRequest();
                
              httpRequest.onreadystatechange = function() {
                   
                     var list= httpRequest.responseText.split("|");
                     var annee=list[0];
                     var mois=list[1];
                     var jour=list[2];
                     var heur=list[3];
                     var minute=list[4];
                     var etat=list[5];
                     var result;
                     var couleurText;
                     if(etat==''){
                         couleurText='#008000';
                         if(annee==0 && mois==0 && jour==0){
                                                         result='ce lot va expirer aujourdhui il reste '+heur+'h-'+minute+'min';
                                                         couleurText='#FFA500';}
                         if(annee==0 && mois==0 && jour!=0){
                                                         result='il reste '+jour+' jour(s) pour la péremption du lot';}
                         if(annee==0 && mois!=0 && jour==0){
                                                         result='il reste '+mois+' mois pour la péremption du lot';}
                         if(annee==0 && mois!=0 && jour!=0){
                                                         result='il reste '+mois+' mois et '+jour+' jour(s) pour la péremption du lot';}
                         if(annee!=0 && mois==0){
                                               result='il reste '+annee+' ans pour la péremption du lot'; }
                         if(annee!=0 && mois!=0){
                                               result='il reste '+annee+' ans et '+mois+' mois pour la péremption du lot';}
                                      
                         document.getElementById('contenue').style.color =couleurText;
                               }
                                  
                    else if(etat=='-'){
                         if(annee==0 && mois==0 && jour==0){
                                                         result='ce lot est périmé depuis '+heur+'h-'+minute+'min';}
                         if(annee==0 && mois==0 && jour!=0){
                                                         result='ce lot est périmé depuis '+jour+' jour(s)';}
                         if(annee==0 && mois!=0 && jour==0){
                                                         result='ce lot est périmé depuis '+mois+' mois';}
                         if(annee==0 && mois!=0 && jour!=0){
                                                         result='ce lot est périmé depuis '+mois+' mois et '+jour+' jour(s)';}
                         if(annee!=0 && mois==0){
                                               result='ce lot est périmé depuis '+annee+' ans'; }
                         if(annee!=0 && mois!=0){
                                               result='ce lot est périmé depuis '+annee+' ans et '+mois+' mois';}
                            
                        document.getElementById('contenue').style.color = '#f00';
                                   }
                  
                   
                  
                div.innerHTML=result;   
                }  

     httpRequest.open("GET", "/lot/etat/'"+idL+"' ", false);	 
     httpRequest.send();
    
   $('#exampleModal').modal('show')


}