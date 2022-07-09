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

function previewFile()
{
	var preview = document.querySelector('img');
	var file = document.querySelector('input[type=file]').files[0];
	var reader = new FileReader();
	
	reader.onloadend = function()
	{
		preview.src = reader.result;
	}
	
	if(file)
	{
		reader.readAsDataURL(file);
	}
	else
	{
		preview.src = "";
	}
	
}