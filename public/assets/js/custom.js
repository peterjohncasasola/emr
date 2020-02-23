/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

$("#long-table").dataTable({
'select': {
	'style': 'single'
},
'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {	
               'selectRow': true
            }
         }
      ],

});