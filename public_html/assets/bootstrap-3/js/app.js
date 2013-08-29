$(document).ready(function () {
        
	/* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
	$('.datepicker').datepicker({
		format: "dd/mm/yyyy"
	});

	//Set up Nickname to cha ge when first name is changed.
	$('#first_name').change(function() {
	    $('#nickname').val(this.value);
   	});

	//Delete Confirmation
	function deletechecked()
	{
	    var answer = confirm("Really delete this record? (There is no undo!)")
	    if (answer){
	        document.messages.submit();
	    }
	    
	    return false;
	}





});