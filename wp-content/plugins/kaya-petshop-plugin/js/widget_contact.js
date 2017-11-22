jQuery(function() {
//----------------------------------------------------
// Contact Form 
//----------------------------------------------------
 jQuery('#main input#contact_submit').live("click",function(e) { 
		    e.preventDefault();
		var name = jQuery('input#name').val();
		var email = jQuery('input#email').val();
		var message = jQuery('textarea#message').val();
		var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
		var subject = jQuery('input#subject').val();
		var siteemail = jQuery('input#siteemail').val();
		var hasError = false;
		 if(name=='')
		 {
			 jQuery('[name="name"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="name"]').removeClass('vaidate_error');
			 }
			 
		if(email=='')
		 {
			 jQuery('[name="email"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			if (!pattern.test(email)) {
				jQuery('[name="email"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="email"]').removeClass('vaidate_error');
				 }
			 }

		if(message=="")
			 {
				 jQuery('[name="message"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="message"]').removeClass('vaidate_error');
			}
		if(subject=="")
			 {
				 jQuery('[name="subject"]').addClass('vaidate_error');
				 hasError = true;
			 }else{
				 jQuery('[name="subject"]').removeClass('vaidate_error');
				 }
        if(hasError) { return; }
		else {	
				jQuery('.contact_submit').attr('disable','disabled');
				jQuery('.contact_loader').css('visibility','visible');
				jQuery.ajax({
		            type: 'post',
		           	url: cpath.plugin_dir + '/inc/sendEmail.php',
		            data: 'name=' + name + '&email=' + email +'&subject='+ subject +'&message=' + message +'&siteemail='+ siteemail,
		            success: function(results) {
		            	jQuery('.contact_loader').css('visibility','hidden');
		            	//jQuery('.contact_submit').removeattr('disable','disabled');
		                jQuery('div#contact_response').html(results).css('display', 'block');
		                jQuery('#contact-form').get(0).reset();	
		   
		         }
		     }); // end ajax
		}
    });
});
//----------------------------------------------------
// Reservation Form 
//----------------------------------------------------
jQuery('#application-form').each(function(){
    jQuery(this).find('#main input.application_form_submit').live("click",function(e) { 
		e.preventDefault();
		var owner_email_id = jQuery('input#owner_email_id').val();
		var first_name = jQuery('input#fname').val();
		var last_name = jQuery('input#lname').val();
		var email = jQuery('input#email_id').val();
		var pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
		var number_validate =  new RegExp( /^[0-9-+]+$/ );
		var website = jQuery('input#website').val();
		var expectedsalary = jQuery('input#expectedsalary').val();
		var startdate = jQuery('input#startdate').val();
		var experience = jQuery('input#experience').val();
		var application = jQuery('input#application').val();
		
		var hasError = false;
		if(first_name=='')
		{
			jQuery('[name="fname"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="fname"]').removeClass('vaidate_error');
		}
		if(last_name=='')
		{
			jQuery('[name="lname"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="lname"]').removeClass('vaidate_error');
		}


		if(email=='')
		{
			jQuery('[name="email_id"]').addClass('vaidate_error');
			hasError = true;
		}else{
		if (!pattern.test(email)) {
			jQuery('[name="email_id"]').addClass('vaidate_error');
			hasError = true;
		}else{
			jQuery('[name="email_id"]').removeClass('vaidate_error');
		}
		}
		if(expectedsalary=="")
		 {
			 jQuery('[name="expectedsalary"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="expectedsalary"]').removeClass('vaidate_error');
			 }
		if(startdate=="")
		 {
			 jQuery('[name="startdate"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="startdate"]').removeClass('vaidate_error');
		}				 
		if(experience=="")
		 {
			 jQuery('[name="experience"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="experience"]').removeClass('vaidate_error');
			 }
		if(application=="")
		 {
			 jQuery('[name="application"]').addClass('vaidate_error');
			 hasError = true;
		 }else{
			 jQuery('[name="application"]').removeClass('vaidate_error');
		}	 		 
		if(hasError) { return; }
		else {	
			jQuery.ajax({
				type: 'post',
				url: cpath.plugin_dir + '/inc/career_form.php',
				data: 'owner_email_id='+ owner_email_id +'&first_name='+first_name +'&last_name=' + last_name + '&email=' + email  +'&website=' + website + '&expectedsalary=' + expectedsalary +'&startdate='+ startdate +'&experience=' + experience + '&application=' + application,

				success: function(results) {	
					jQuery('div#career_form_response').html(results).css('display', 'block');		
				}
			}); // end ajax
		}
		});
});
jQuery('#application-form').each(function(){
   jQuery(this).find('#startdate').datepicker({
       dateFormat : 'dd-mm-yy'
    });
});