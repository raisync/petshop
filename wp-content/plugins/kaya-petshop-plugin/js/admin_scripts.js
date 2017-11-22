(function( $ ) {
    "use strict";
    /* Start here */
    $.noConflict();
    // Fields Hide & Show
    $('.add_options_fields').each(function(){
    	$(this).find('.options_fields_group .input-type-select').change(function(){
    		//$(this).parent().parent().find('.select_field_select_options').removeClass('tested').hide();
    		var option_type = $(this).find('option:selected').val();
            $(this).parent().next().find('.select_field_select_options').removeClass('show_options_data');
            $(this).parent().next().find('.input-type-select-date-format').removeClass('show_options_data');
    		if((  option_type == 'select' ) || (  option_type == 'checkbox' ) ){
    			$(this).parent().next().find('.select_field_select_options').addClass('show_options_data');
    		}else if( option_type == 'date' ){
                $(this).parent().next().find('.input-type-select-date-format').addClass('show_options_data');
            }else{

            }
    	}).change();
    })
    $('.add_options_fields').each(function(){
    		$(this).find('#create_option').click(function(){
    			$(this).parent().parent().find('.table tbody tr:first').clone(true).appendTo('.table tbody').addClass('testd').removeAttr('style').find("input, textarea").val("");
                //find('tr:first').addClass('pf_options_clone').clone(true).appendTo('ul.options_fields_group').find("input").val("");
                //alert('your portfolio will be activate with in 24 hours');
    			return false;
    		})
    	})
    //Delete Options
    $('.fields_options_delete').each(function(){
		$(this).on("click", ".delete", function(){
        var label_name = $(this).parents('.options_fields_group').find('td input.input_field_label_name').val();
        var $option_delete = confirm('are you sure to delete '+  label_name);
        if($option_delete == false) return false;   
            $(this).parent().parent().remove();
        });
    })
    //Generate Unique ID
    $('.add_options_fields').on('blur', '.input_field_label_name', function(e){
        e.stopPropagation();
        var target = $(this).nextAll('.input_field_uid_name');
        if(target.val()==''){
            target.val(kaya_string_to_key($(this).val()));
        }
    });
    
    /*** Format string to be a good uid ***/
    function kaya_string_to_key(string){
        string = string+'';
        string = string.toLowerCase();
        string = string.replace(/[^a-z0-9]+/g, '_').replace(/[_]+$/g, '');/*** Replace non alphanumeric with underscores. Remove last underscore ***/
        return string;
    }
    /* Options Sorting */
     $( "#pf_options_sortable" ).sortable();
})(jQuery);