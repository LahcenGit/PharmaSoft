function fonction12(idMedic)
          {
            
          var lien =document.getElementById ("lien"); 
          lien.setAttribute("href","/medicament/delete/'"+idMedic+"' " );
          $('#supprimerMedicament').modal('show');
          }