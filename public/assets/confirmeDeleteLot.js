function fonction11(idL)
         {
          var lien =document.getElementById ("lien"); 
          lien.setAttribute("href","/lot/delete/'"+idL+"' " );
          $('#supprimerLot').modal('show')
         }