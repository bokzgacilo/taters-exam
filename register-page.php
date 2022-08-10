<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Exam</title>
  <link rel="stylesheet" href="style.css">
  <script
    src="jquery.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    
    <div class="signup-containter">
      <h2>Sign Up / Register</h2>
      <h5>First, let me know about you?</h5>

      <div name='Signup-Form'>
        <input name='Lastname' type="text" placeholder='Lastname' maxlength='20'>
        <input name='Firstname' type="text" placeholder='Firstname' maxlength='20'>
        <input name='Age' type="number" placeholder='Age' maxlength='3' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        <select name="Gender">
          <option value="" default>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <a>Next</a>
        
      </div>
      <div style='display: flex; flex-direction: column; width:100%;'>
        <h5>Already have an account?</h5>
        <a name='BackToSignIn' href='login.php'>Sign In</a>
      </div>
    </div>

    <div class="personalInformation-containter">
      <h2>Contact Details</h2>
      <h5>How can I reach you?</h5>

      <div name='Signup-Form'>
        <input name='Email' type="email" placeholder='Email' maxlength='20'>
        <input name='Contact' type="number" placeholder='Contact (XXX XXX XXXX)' maxlength='11' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
        
        <select name="Municipality" id="selectMunicipality">
          <option value="" selected>Select Municipality</option>
          <option value="Taguig">Taguig</option>
          <option value="Makati">Makati</option>
          <option value="Pasig">Pasig</option>
        </select>

        <select name="Barangay" id="selectBarangay" disabled>
          <option value="" selected>Select Barangay</option>
          <option value="Lower Bicutan" data-tag='Taguig'>Lower Bicutan</option>
          <option value="Pinagsama" data-tag='Taguig'>Pinagsama</option>
          <option value="Fort Bonifacio" data-tag='Taguig'>Fort Bonifacio</option>

          <option value="Cembo" data-tag='Makati'>Cembo</option>
          <option value="Rizal" data-tag='Makati'>Rizal</option>
          <option value="Pembo" data-tag='Makati'>Pembo</option>

          <option value="Bagong Ilog" data-tag='Pasig'>Bagong Ilog</option>
          <option value="Bagong Katipunan"  data-tag='Pasig'>Bagong Katipunan</option>
          <option value="Bambang" data-tag='Pasig'>Bambang</option>
        </select>
        <input name='Street' type="text" placeholder='Street or House No.' maxlength='20'>
        
      </div>

      <a name='SetupAccount'>Almost Done</a>
    </div>
    <div class="Credential-containter">
        <h2>Setting up your account</h2>
        <h5>Complete the form below. Make sure you didn't give your password to anyone.</h5>

        <div name='Signup-Form'>
          <input name='RegisterUsername' type="text" placeholder='Username' maxlength='20'>
          <input name='RegisterPassword' type="password" placeholder='Password' maxlength='20';>
        </div>

        <button name='Register'>Sign Up</button>
    </div>
  </div>
  <script>
    $('document').ready(function(){
      $('#selectMunicipality').on('change', function() {

        $("#selectBarangay").prop("disabled", false);

        var selected = $(this).val();

        $("#selectBarangay option").each(function(item){
          console.log(selected) ;  
          var element =  $(this) ; 
          console.log(element.data("tag")) ; 
          if (element.data("tag") != selected){
            element.hide() ; 
          }else{
            element.show();
          } 
        })
      })

      $("button[name='Register']").click(function() {
        $.ajax({
          type: "POST",
          url: "register.php",
          data: {
            Lastname: $("input[name='Lastname']").val(),
            Firstname: $("input[name='Firstname']").val(),
            Age: $("input[name='Age']").val(),
            Gender: $("select[name='Gender']").val(),
            Email: $("input[name='Email']").val(),
            Contact: $("input[name='Contact']").val(),
            Street: $("input[name='Street']").val(),
            Barangay: $("select[name='Barangay']").val(),
            Municipality: $("select[name='Municipality']").val(),
            Username: $("input[name='RegisterUsername']").val(),
            Password: $("input[name='RegisterPassword']").val()
          },
          success: function(res){
            alert(res);
            window.location.href = "signin-page.php";
          },
          error: function(res){
            alert(res);
          }
        })
      })
    })
  </script>
</body>
</html>

