<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <title>Sign in</title>
</head>
<style type="text/css">  
    body {
        background-color: #F3EBF6;
        font-family: 'Ubuntu', sans-serif;
    }
    div.error {
        margin-bottom: 15px;
        margin-top: -6px;
        margin-left: 58px;
        color: red;
    }
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    .sign {
        padding-top: 40px;
        color: #8C55AA;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
     
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
     
    form.form1 {
        padding-top: 40px;
    }
     
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
     
    
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
         
    }
     
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #9C27B0, #E040FB);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
     
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        padding-top: 15px;
    }
     
    button {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #E1BEE7;
        text-decoration: none
    }
     
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }        
</style>
<body>
  <div class="main">
    <p class="sign" align="center">Sign in</p>
	<div id="error-login"></div>
    <form  method="post" accept-charset="utf-8">
      <input class="un " type="text" align="center" id="email" name="email" placeholder="email">
      <input class="pass" type="password" align="center" name="password" id="password" placeholder="Password">
      <button type="submit" align="center" id="submit" class="submit">Sign in</button>    
     </form>     
<a class="submit" align="center" href="<?= base_url('auth/post_register'); ?>" > Register </a>	 
    </div> 
</body>
</html>
<script>
        $("#submit").click(function() {
            var username = $("#email").val();
            var gpassword = $("#password").val();
			if (username == '') {
                $("#error-login").html('<div class="alert alert-danger"> Please Enter Your UserName.</div>').show().delay(5000).fadeOut("slow");
                return false;
            } else if (gpassword == '') {
                $("#error-login").html('<div class="alert alert-danger"> Please Enter Your Password.</div>').show().delay(5000).fadeOut("slow");
                return false; 
            }else  {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('auth/post_login') ?>",
                    data: "email=" + username + "&password=" + gpassword,
                    success: function(response) {
                        $("#error-login").html('');
                        if (response == 1) {
                           window.location = "<?= base_url('auth/dashboard') ?>";
                        } else {
                            $("#error-login").html(response).show().delay(5000).fadeOut("slow");
                        }
                    }
                });
                return false;
            }
        });
    </script>