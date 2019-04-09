//Copyright 2015 Pareto Software, LLC, released under an MIT license: http://opensource.org/licenses/MIT
$( document ).ready(function() {
    //var testimonial_ok=false;
    //Inputs that determine what fields to show
    var rating = $('#createincident input[name="category-email"]:checked');
    //var testimonial=$('#createincident input:checkbox[name=category-hospedagem]');				
    
    //Wrappers for all fields
    var category_email_imap = $('#createincident input[name="category-email-imap"]').parent();
    var category_email_pop = $('#createincident input[name="category-email-pop"]').parent();
    //var great = $('#live_form textarea[name="feedback_great"]').parent();
    //var testimonial_parent = $('#live_form #div_testimonial');
    //var thanks_anyway  = $('#live_form #thanks_anyway');
    //var all=bad.add(ok).add(great).add(testimonial_parent).add(thanks_anyway);
    var all=category_email_imap.add(category_email_pop);
    
    rating.change(function(){
        var value=this.value;						
        all.addClass('hidden'); //hide everything and reveal as needed
        
       if (value == 'category-email'){
            category_email_imap.removeClass('hidden');
            category_email_pop.removeClass('hidden');								
       }
        //else if (value == 'hospedagem'){
            ok.removeClass('hidden');
       // }
        /*		
        else if (value == 'Excellent'){
            testimonial_parent.removeClass('hidden');
            if (testimonial_ok == 'yes'){great.removeClass('hidden');}
            else if (testimonial_ok == 'no'){thanks_anyway.removeClass('hidden');}
        }*/
    });	

    
    testimonial.change(function(){
        all.addClass('hidden'); 
        testimonial_parent.removeClass('hidden');
    
        testimonial_ok=this.value;
        
        if (testimonial_ok == 'yes'){
            great.removeClass('hidden');
        }
        else{
            thanks_anyway.removeClass('hidden');
        }
        
    });
});
