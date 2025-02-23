<?php
date_default_timezone_set('Asia/Kolkata');
$currdate = date('Y-m-d');
$given = 0;
$taken =0;
?>

<!DOCTYPE html>

<head>
  <title>Daily Sales || Alpha Business</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/transaction.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  

</head>

<body>
  <div class="container">
    <header>
      <img src="/Logo.png" alt="Logo HERE" width="80" height="80" />
      <div class="title">
                <h1>Smart Business Software</h1>
                <p>By Shaban Khan</p>
            </div>
      <div class="pagetitle">
        <p><i class="fas fa-align-justify"></i> Daily Sales </p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        <table>

          <tr>
            <td align="center">
              <div class="amounts taken" style="color:green">
                
              </div>
            </td>
            <td align="center" style="color:red">
              <div class="amounts given">
                
              </div>
            </td>
            <td></td>
          </tr>
        </table>
        <div class="actions">
          <button onclick="location.href='/mainMenu.php'"><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="location.href='newbill/addnew.php'"><i class="fas fa-file-medical"></i> Add New</button>
        </div>


      

      </div>
      <form method="post" class="searchbar">
        Search Sells By Date <input type="date" name="date" id="searchinput" value="<?php echo $currdate ?>" placeholder="Enter Name Or Mobile Number" />
      </form>
      <div class="dataTable scrollTable">
        <table>
          <tr>Loading...</tr>
        </table>
      </div>
    </section>
  </div>

  <script>
    var a =0;
    var b =0;

        setInterval(function () {
        if ( searchinput.value!= "") {
            
          
              $.ajax({

              type: "post",
              url: "search.php",
              data: $('.searchbar').serialize(),
              dataType : "text",
              success: function (result) {
                $('.dataTable').html(result);
                      
                      
                }

              });
          
        
          
            
            }
          
          

          },500);
        
          setInterval(() => {
            if($('#taken').val()=="")
            {
              $(".taken").html("₹ <br> Loading<br> Taken ")
              $(".given").html("₹ <br> Loading <br> Given ")
            }
            else{
            a= $('#taken').val();
            b = $('#given').val();

            $(".taken").html("₹ <br> "+a+"<br> Taken ")
            $(".given").html("₹ <br> "+b+"<br> Given ")
          }
          
          }, 1500);

  </script>
</body>
