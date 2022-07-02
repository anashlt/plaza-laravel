import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/autocomplete.js';


$( "#search" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: "/title-auto",
        type: 'GET',
        dataType: "json",
        data: {
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },

    select: function (event, ui) {
       $('#search').val(ui.item.label);
       console.log(ui.item); 
       return false;
    }
});

$( "#scity" ).autocomplete({
   source: function( request, response ) {
     $.ajax({
       url: "/city-auto",
       type: 'GET',
       dataType: "json",
       data: {
          search: request.term
       },
       success: function( data ) {
          response( data );
       }
     });
   },

   select: function (event, ui) {
      $('#scity').val(ui.item.label);
      console.log(ui.item); 
      return false;
   }
});