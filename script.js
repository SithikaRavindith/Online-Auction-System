function checkPassword(){
	if(document.getElementById("pwd").value != document.getElementById("cmfpwd").value){
		alert("Password Mismatch!");
		return false;	
	}else{
		alert("Success!");
		return true;
	}
}

function enableButton(){
	if(document.getElementById("checkBox").checked == true){
        document.getElementById("sbtn1").disabled = false;
        document.getElementById("sbtn2").disabled = false;
    }
	else{
        document.getElementById("sbtn1").disabled = true;
        document.getElementById("sbtn2").disabled = true;
    }
}

function isvalid(){
    var username = document.form.Username.value;
    var pass = document.form.password.value;
    if(username.length == "" && pass.length == ""){
        alert("Username and password fields are empty!!");
        return false
    }
    else{
        if(username.length == ""){
            alert("Username field is empty!!");
            return false
        }
        if(pass.length == ""){
            alert("Password field is empty!!");
            return false
        }
          
    }
}



              