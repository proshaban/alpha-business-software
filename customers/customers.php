<?php
if(!isset($_COOKIE['usid']))
{
    ?>

    <script>
        alert("!Login Session Expired!");
        location.href="/index.php";
    </script>
<?php

}

?>


<!DOCTYPE html>

<head>
  <title>Customers || Alpha Business</title>

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
        <p><i class="fas fa-align-justify"></i> Customers List</p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        <table>

          <tr>
            <td align="center">
              <div class="amounts tAmount" style="color:blue">
              <input type="text" id="tAmount" val="" hidden>
              </div>
            </td>
            <td align="center">
              <div class="amounts  pAmount" style="color:green">
                
              </div>
            </td>
            <td align="center" style="color:red">
              <div class="amounts dAmount">
                
              </div>
            </td>
  
            <td>
              
            </td>
          </tr>
        </table>
        <div class="actions">
          <button onclick="location.href='/mainMenu.php'"><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="$('.action').hide();$('.AddRec').show();"><i class="fas fa-file-medical"></i> Add
            New</button>
        </div>


        <form action="adcust.php" method="post" class="action AddRec">
          <fieldset>
            <table>
              <legend>Add New</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>Add New Customer</h1>
                </td>
              </tr>

              <tr>
                <td>Name *
                </td>
                <td>
                  <input type="text" name="name" required >
                </td>
              </tr>
              <tr>
                <td>Mobile *</td>
                <td><input type="text" name="mobile1" maxlength="10" id="" required ></td>
              </tr>
              <tr>
                <td>Secondry Mobile (if any)</td>
                <td><input type="text" name="mobile2" maxlength="10" id="" required ></td>
              </tr>

              <tr>
                <td>Email </td>
                <td><input type="text" name="email" ></td>
              </tr>
              
              <tr style="text-align: center">
                <td>
                  <button class="actionBtn" onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button  class="actionBtn"type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>

      </div>
      <form method="post" class="searchbar">
        Search Customers <input type="search" name="search" id="searchinput" placeholder="Enter Name Or GST Number" />
        <ul id="searchlist" style="display:none ;">
          
        </ul>
      </form>
      <form method="post" class="tableinfo">
              <h3>Sort List </h3>
              <input type="text" name="hidden" value="111" hidden>
              <select name="sortby">
                  <option value="dues">DUES</option>
                  <option value="days">DAYS</option>
              </select>
              
      </form>
      <div class="dataTable scrollTable">
        
      </div>
    </section>
  </div>
<script>
  setInterval(function ()
  {
        if ( searchinput.value!= "") 
        {
            $('#searchlist').show();
            $.ajax({

            type: "post",
            url: "search.php",
            data: $('.searchbar').serialize(),
            dataType : "text",
            success: function (result) 
              {
                  $('#searchlist').show();
                  $('#searchlist').html(result);
        
        
              }

            });
        }
        else {
            $('#searchlist').hide();
        }
        
     
    }, 500);


    //generate  table 

    setInterval(() => {

      console.log("Sending...");
        $.ajax({
        
        type: "post",
        url: "table.php",
        data: $('.tableinfo').serialize(),
        dataType : "text",
        success: function (result) {
        
          
        $('.dataTable').html(result);
        //console.log(result);
        
        }
        
    });
    }, 1000);

    //calculate total 

    setInterval(() => {
            
            if($('#tAmount').val()!="")
          {
            var a= $('#tAmount').val();
            var b = $('#pAmount').val();

            var c= $('#dAmount').val();

            $(".tAmount").html("₹ <br> "+a+"<br> Total ");
            $(".pAmount").html("₹ <br> "+b+"<br> Paid ");
            $(".dAmount").html("₹ <br> "+c+"<br> Dues ");
            
          }
          else
            {
              $(".tAmount").html("₹ <br> Loading...<br> Total ");
              $(".pAmount").html("₹ <br> Loading...<br> Paid ");
              $(".dAmount").html("₹ <br> Loading... <br> Dues ");

            }
          
          }, 1000);
</script>
</body>
