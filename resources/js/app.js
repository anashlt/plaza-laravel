import Popper from "popper.js";
import * as $ from "jquery";
import * as bootstrap from "bootstrap";
window.$ = window.jQuery = $;
window.bootstrap = bootstrap;

import 'jquery-ui/ui/widgets/autocomplete.js';
import 'bootstrap-fileinput';


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

$("#avatar").fileinput({
   uploadUrl: "/image-upload",
   uploadExtraData: function() {
      return {
          _token: $("input[name='_token']").val(),
      };
   },
   uploadAsync: true,
   deleteUrl: "/image-delete",
   showUpload:false, 
   overwriteInitial: false, // append files to initial preview
   allowedFileTypes: ['image'],
   minFileCount: 1,
   maxFileCount: 4,
   browseOnZoneClick: true,
   fileActionSettings: {
      showRotate: false,
   },
}).on("filebatchselected", function(event, files) {
   $("#avatar").fileinput("upload");
}).on('fileuploaded', function(event, data, previewId, index, fileId) {
   var form = data.form, files = data.files, extra = data.extra,
   response = data.response, reader = data.reader;
   $('form#createPostForm').append('<input type="hidden" name="pictures[]" value="'+response.uploaded+'" />');
});