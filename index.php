<?php
if(isset($_COOKIE['usid']))
{
    ?>

    <script>
        location.href="/mainMenu.php";
    </script>
    <?php

}

?>

<!DOCTYPE html> 
<head>
    <title>Login || ABS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="login.css" >    
</head>
<body>
    <header>
            
            <img src="Logo.png" alt="logo">
    
            <div class="title">
                <h1>Smart Business Software</h1>
                <p>By Shaban Khan</p>
      </div>
       
    </header>
    <div class="container">
    
        <div class="contents">
            <div class="error">
                    <p>hello</p>
            </div>
            <div class="data" >
                
                <form method="POST" class="login">
                    <h1>ENTER CREDENTIALS</h1>
                    
                    <div class="inputs">
                        <i class="fas fa-user"></i>
                        <input type="text" name="loginid" placeholder="ENTER ID">
                    </div>
                    <div class="inputs">
                        <i class="fas fa-key">
                        </i><input type="password" name="password" placeholder="ENTER PASSWORD">
                    </div>
                    <div class="inputs">
                        <input type="submit" id="loginBtn"  value="LOGIN">
            
                    </div>
                    
                </form>
                
            </div>
            <!-- <p>Are You New ? <a href="signup.html">Signup Here</a></p>
            <div class="forget">
                        <p>Didn't remebered your password? <br> <a href="#">Forget Password</a></p>
            </div>
            -->
        </div>
    </div>
    <script>

$('.login').on("submit",function(e)
        {

            console.log("Sending");
            
                $.ajax({

                    type: "post",
                    url: "logincred.php",
                    data: $('.login').serialize(),
                    dataType : "text",
                    success: function (result) {
                        if(result === "success"){
                            location.href = "mainMenu.php";
                        }else{
                            $('.error').show();
                            $('.error').html(result);
                            console.log(result);
                            setTimeout(() => {
                                $('.error').hide();
                                $('.error').html("");
                                }, 5000);
                        }
                        }

                });
            
        


        e.preventDefault();
    });




    </script>
</body>