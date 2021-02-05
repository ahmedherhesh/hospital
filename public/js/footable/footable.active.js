(function ($) {
    "use strict";
    
    /*Basic*/
    if( $('.footable').length ) {
        $('.footable').footable();
    }
    
    /*Ajax Data Load*/
    if( $('.footable-ajax').length ) {
        $('.footable-ajax').footable({
            "columns": $.get('js/footable/footable-data/columns.json'),
            "rows": $.get('js/footable/footable-data/rows.json')
        });
    }
    
    /*Edit Rows*/
    if( $('.footable-editing').length ) {
        var $modal = $('#footable-editor-modal'),
            $editor = $('#footable-editor'),
            $editorTitle = $('#footable-editor-title'),
            ft = FooTable.init('.footable-editing', {
                editing: {
					
                    enabled: true,
                    addRow: function(){
                        $modal.removeData('Outlay');
                        $editor[0].reset();
                        $editorTitle.text('Add Outlay');
                        $modal.modal('show');
						$('body').getNiceScroll().resize();
						$('.modal').getNiceScroll().resize();
                    },
					
                    editRow: function(row){
                        var values = row.val();
                        $editor.find('#outlayType').val(values.outlayType);
                        $editor.find('#cost').val(values.cost);
                        $editor.find('#Date').val(values.Date);
                        $editor.find('#notes').val(values.notes);
                       

                        $modal.data('Outlay', row);
                        $editorTitle.text('Edit - ' + values.outlayType + ' Data');
                        $modal.modal('show');
                    },
                    deleteRow: function(row){
                        if (confirm('Are you sure you want to delete the Outlay?')){
                            row.delete();
                        }
                    }
                }
            }),
            uid = 10;

        $editor.on('submit', function(e){
            if (this.checkValidity && !this.checkValidity()) return;
            e.preventDefault();
            var row = $modal.data('Outlay'),
                values = {
                    outlayType: $editor.find('#outlayType').val(),
                    cost: $editor.find('#cost').val(),
                    Date: moment($editor.find('#Date').val(), 'YYYY-MM-DD'),
                    notes: $editor.find('#notes').val()
                };

            if (row instanceof FooTable.Row){
                row.val(values);
            } else {
                values.id = uid++;
                ft.rows.add(values);
            }
            $modal.modal('hide');
			$('body').getNiceScroll().resize();
        });
		
    }
    
})(jQuery);