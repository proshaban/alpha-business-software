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
  <title>Products || Alpha Business</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
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
        <p><i class="fas fa-shopping-cart"></i> List Of All Products</p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        
        <div class="actions">
          <button onclick="location.href='/mainMenu.php';"><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="$('.AddProduct').show();">Add Product</button>

        </div>

        <form action="addpro.php" method="post" class="action AddProduct">
          <fieldset>
            <table>
              <input type="text" name="userid" value="<?php echo $_COOKIE['usid'] ?>" hidden>
              <legend>Add Product</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>Add New Product</h1>
                </td>
              </tr>
              <tr>
                <td>Product Name
                </td>
                <td><input type="text" name="name"  /></td>
              </tr>
              <tr>
                <td>Model No.</td>
                <td><input type="text" name="model"  /></td>
              </tr>
              <tr>
                <td>Stock</td>
                <td><input type="text" name="stock"  /></td>
              </tr>  
              <tr>
                <td>Buy Price</td>
                <td><input type="text" name="Bprice" /></td>
              </tr>
              <tr>
                <td>MRP</td>
                <td><input type="text" name="MRP" /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button class="actionBtn" onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button class="actionBtn" type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>

        <form action="editpro.php" method="post" class="action EditData">
          <fieldset>
            <table>
              <legend>Edit Product</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>Edit Product informations</h1>
                </td>
              </tr>
              <tr align="right">
                <td></td>
                <td colspan="1"><input type="button" class="actionBtn" style="font-size:14px; width:50%; cursor:pointer; color:red;" onclick="$('.action').hide();$('.DeleteData').show();" value="Delete "></input></td>
              </tr>
              <tr>
              <input type="text" name="proId" class="proId" value="" hidden>
              </tr>
  
              <tr>
                <td>Name
                </td>
                
                <td><input type="text" name="proName" class="proName" required /></td>
              </tr>
              <tr>
                <td>Model No.</td>
                <td><input type="text" name="proModel" class="proModel" required  /></td>
                

              </tr>
              <tr>
                <td>Stock</td>
                <td><input type="text" name="proStock" id="" class="proStock" required /></td>
              </tr>
              <tr>
                <td>Buy Price</td>
                <td><input type="text" name="proBprice" id="" class="proBprice" required  /></td>
              </tr>
              <tr>
                <td>Sell Price</td>
                <td><input type="text" name="proMRP" id="" class="proMRP"  required /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button class="actionBtn" onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button class="actionBtn" type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
        
        <form action="deletepro.php" method="post" class="action DeleteData">
          <fieldset>
            <table>
              <legend>Delete</legend>
              <tr align="center">
              
                <td colspan="2">
                  <h1>   Delete Product </h1>
                </td>
              </tr>
              <tr><input type="text" name="proId" class="proId" value="" hidden></tr>

              <tr>
                <td colspan="2">Are You Sure Want To Delete This Product ?</td>
              </tr>
              <tr>
              
              <tr style="text-align: center">
                <td>
                  <button class="actionBtn" onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button  class="actionBtn" type="submit">Delete</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
      </div>
      
      <form method="post" class="searchbar">
        Search Your Product To Add On List<input type="search" name="search" id="searchinput"
            placeholder="Enter Name Or Model Number">
        <ul id="searchlist">
          
        </ul>
    </form>
    <form method="post" class="editform" style="display:none;">
        <input type="text" name="eid" id="editId" value="">
    </form>
    <form method="post" class="tableinfo">
              <h3>Sort List </h3>
              <input type="text" name="hidden" value="111" hidden>
              <select name="sortby" >
                  <option value="1">NONE</option>
                  <option value="2">QUANTITY</option>
                  <option value="3">MRP</option>
              </select>
              
      </form>
        
        
      <div class="dataTable ScrollTable">
        
      </div>
    </section>


  </div>

  <script>

const searchinput = document.querySelector("#searchinput");
$(function () {
    //serachbar 
      setInterval(function () {
        if ( searchinput.value!= "") {

          
              $.ajax({

              type: "post",
              url: "search.php",
              data: $('.searchbar').serialize(),
              dataType : "text",
              success: function (result) {
                $('#searchlist').show();
                      $('#searchlist').html(result);
                      
                      
                      }

              });
          
        
          
            
            }
        else {
            $('#searchlist').hide();
        }
        
     
    }, 1000);

    
});

setInterval(() => {

console.log("Sending...");
  $.ajax({
  
  type: "post",
  url: "preloader.php",
  data: $('.tableinfo').serialize(),
  dataType : "text",
  success: function (result) {
  
    
  $('.dataTable').html(result);
  //console.log(result);
  
  }
  
});


}, 1000);




$('.editform').on("submit",function(e)
        {
           
            $('.EditData').show();
        $.ajax({

                    type: "post",
                    url: "editloader.php",
                    data: $('.editform').serialize(),
                    dataType : "text",
                    success: function (result) {
                        
                        
                        $('.EditData').html(result);
                       
                        }

        });
            
        e.preventDefault();


        
    });



  </script>
</body>
