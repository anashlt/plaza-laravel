import 'bootstrap';
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/autocomplete.js';

var path = "/search-auto";

$( "#search" ).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url: path,
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