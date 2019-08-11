


  function loginAdmin(){
 
   var inemail = document.getElementById('email').value;
   var psw = document.getElementById('pass').value;
  
  
  if( inemail == "" ){
    email.style.border = "1px solid red";
    document.getElementById('msg-email').innerHTML = " *Email is required";
    return false;
  }
  
  if (psw == "" || psw == null){
    document.getElementById('msg-password').innerHTML = "*Password is required";
    return false;
  } 
  
    return (true);
  };
 

// validation create user
function createUser(){
 
  var fname = document.getElementById('firstname').value;
  var lname = document.getElementById('lastname').value;
  var mydate = document.getElementById('bday').value;
  var inputemail = document.getElementById('email').value;
  var genderM = document.getElementById('male');
  var genderF = document.getElementById('female');
  var selectR = document.getElementById('role').value;
  var pass = document.getElementById('password').value;
  var cpass = document.getElementById('cpassword').value;



  var valid_email = "^[a-z0-9](\.?[a-z0-9]){3,}@gmail\.com$";
  var pass_valid = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  startDate = document.getElementById('bday').min = "1980-01-01";
  endDate = document.getElementById('bday').max = "2000-01-01";

 

if( fname == ""  ){
   firstname.style.border = "1px solid red";
   document.getElementById('msg-firstname').innerHTML = " *Please provide your first name";
   return false;
} 

if( lname == "" ){
   lastname.style.border = "1px solid red";
   document.getElementById('msg-lastname').innerHTML = " *Please provide your last name";
   return false;
}

if(  mydate == "" ){
   bday.style.border = "1px solid red";
   document.getElementById('msg-bday').innerHTML = " *Please enter you date of birth" + "<br/>" 
   + "Your age should be 18 or greater than 18 years!!!";
   return false;
}

if( inputemail == "" || !inputemail.match(valid_email)){
   email.style.border = "1px solid red";
   document.getElementById('msg-email').innerHTML = " *Please provide your email!";
   return false;
}

if( genderM.checked == false && genderF.checked == false ){
   document.getElementById('msg-gender').innerHTML = " *You must select male or female";
   return false;
}

if( selectR == "" ){
   document.getElementById('msg-role').innerHTML = " *Please select an option!";
   return false;
}

if (pass == "" ){
   document.getElementById('msg-password').innerHTML = "*Please insert your password";
   return false;
} 
if(!pass_valid.test(pass) ){  
   document.getElementById('msg-password').innerHTML = "*Password must contain at least 6 charecters" + "<br/>" 
   + "*Password should contain at least one number and one special character."
   return false;
}

if (cpass != pass){
   document.getElementById('msg-cpassword').innerHTML = "*Confirm password doesn't match";
   return false;
}  

   return (true);
};




function editUser(){
 
  var selectR = document.getElementById('role').value;
  
  if( selectR == "" ){
     document.getElementById('msg-role').innerHTML = " *Please select an option!";
     return false;
  }
  
  
     return (true);
  };
  


  //validation posts
   function create_edit_Post(){
 
    var title_val = document.getElementById('title').value;
    var desc_val = document.getElementById('description').value;
   
   
   if( title_val == ""  ){
     title.style.border = "1px solid red";
     document.getElementById('msg-title').innerHTML = " *Please enter only alphanumeric values for your advertisement title";
     return false;
   }
   
   if( title_val.length < 5 || title.length > 50 ){
      title.style.border = "1px solid red";
      document.getElementById('msg-title').innerHTML = " *Number of characters must be between 5 and 50";
      return false;
    }
   
   if( desc_val == "" ){
     description.style.border = "1px solid red";
     document.getElementById('msg-description').innerHTML = " *Please enter a valid description";
     return false;
   }

   if( desc_val.length < 20 || desc_val.length > 400 ){
      description.style.border = "1px solid red";
      document.getElementById('msg-description').innerHTML = " *Number of characters must be between 20  and 400";
      return false;
    }
   
     return (true);
   };
  
  
