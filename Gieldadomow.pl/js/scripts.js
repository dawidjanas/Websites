function checkform(form) {
    var inputs = form.getElementsByTagName('input');
	
    for (var i = 0; i < inputs.length; i++) {
		
        if(inputs[i].hasAttribute("required")){
			
            if(inputs[i].value == ""){
             
                alert("Please fill all required fields");
                return false;
            }
        }
    }
    return true;
}