<?php 
include 'preloader.php';

?>

<!DOCTYPE html>

<head>
    <title>New Rough Bill || Alpha Business</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>

<body>
    <div class="container">
        <header>
            <img src="/Logo.png" alt="Logo HERE" width="80" height="80">
            <div class="title">
                <h1>Alpha Business Software</h1>
                <p>For Akash Sanitary</p>
            </div>
            <div class="pagetitle">
                <p><i class="fas fa-file-medical"></i> NEW RECORD</p>
            </div>
        </header>
        <section class="data">

            <div class="details">
                <table>
                    <tr>
                        <td>Transaction Type </td>
                        <td>: General Entry</td>
                    </tr>
                    
                    <tr>
                        <td>Date </td>
                        <td>: <?php echo date("d/m/Y") ?></td>
                    </tr>
                    <tr>
                        <td> Time </td>
                        <td>: <?php echo date('h:i A'); ?></td>
                    </tr>
                </table>
                <div class="actions">
                    <button onclick="$('.cancelR').show();">Cancel</button></td>
                    <button onclick="$('.SaveRec').show();">Save Records</button>
                </div>
                <form action="cancel.php" method="post" class="action cancelR">
                    <fieldset>
                        <table>
                            <legend>Cancel Records</legend>
                            <tr>
                                <td colspan="2">
                                    <h1>Are You sure you want to cancel this record?</h1>
                                    <input type="text" name="table" value="<?php echo $table ?>" required hidden>
                                </td>
                            </tr>

                            <tr style="text-align:center;">
                                <td><button class="actionBtn"  onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button class="actionBtn" type="submit">Yes</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

                <form class="action DropRec">
                    <fieldset>
                        <table>
                            <legend>Drop Records</legend>
                            <tr>
                                <td colspan="2">
                                    <h1>You want to drop this record?</h1>
                                </td>
                            </tr>

                            <tr style="text-align:center;">
                                <td><button class="actionBtn" onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button class="actionBtn" type="button" onclick="">Yes</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <form action="saverec.php" method="post" class="action SaveRec">
                    <fieldset>
                        <table>
                            <legend>Save Record</legend>
                            <tr>
                                <td colspan="2">
                                    <h1>Do you want to save this record?</h1>
                                    <input type="text" name="table" value="<?php echo $table ?>" hidden required>
                                    <input type="text" name="total" id="totalAmt" hidden>
                                </td>
                            </tr>
                            
                            <tr style="text-align:center;">
                                <td><button class="actionBtn" onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button class="actionBtn" type="submit">Save</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

            </div>
            <div class="dataTable ScrollTable">
                    <table>
                        <tr><td>Loading...</td></tr>
                    </table>
            </div>
            <form method="post" class="searchbar">
                Search Your Product To Add On List<input type="search" name="search" id="searchinput"
                    placeholder="Enter Name Or Model Number">
                <ul id="searchlist">
                    

                </ul>
            </form>

            <form method ="post" class="addPro">
            <fieldset>
  <table>
      <input type="text" name="table" hidden>
      <legend>Add Products</legend>
      <tr>
          <td>
              <p>Name OF Product : <span id="productname" class="resetdata" style="color:black;"></span> </p>
              <input type="text" name="name" id="productnamein" hidden required>
          </td>
          
          <td>
              <p> Model : <span id="model" class="resetdata" style="color:black;"></span> </p>
              <input type="text" name="model" id="modelin"  hidden
                   required>
          </td>
          

      </tr>
      <tr>

          
          <td>Buying Price : <p id="hprice" ondblclick="$(\'#buyPrice\').show(); $(\'#hprice\').hide();" style = "color:black;cursor:pointer;"></p> 
          <p id="buyPrice" style="color:black; display:none; cursor:pointer;" onclick="$(\'#buyPrice\').hide(); $(\'#hprice\').show();"></p> <br>
          <p id="addon" style="color:black; cursor:pointer;"></p>
          </td>
          <td>MRP :<p id="MRP" class="resetdata" style="color:black;" ></p></td>
      </tr>
      
      <tr>


          <td>In Stock</td>
          <td >Quantity</td>
          
      </tr>
      <tr>
          <td>
              <p id="stock" class="resetdata" style="color:black;"></p>
              <input type="number" id="instock"  hidden required>
          </td>
          <td>
              <input type="number" name ="quantity" id="quantity" required>
          </td>
      </tr>

      <tr>
      <td> Selling Price</td>
          <td>Total Amount</td>
      </tr>
      <tr>
          <td><input type="number" name="Sprice"  id="Sprice" ></td>
          <td><p id="totalA"></td>
      </tr>
      
      <tr style="text-align:center;">
          <td>
              <input type="reset" class="actionBtn" onclick="$(\'.resetdata\').html(\'\');$(\'#hprice\').html(\'XXXX\'); $(\'#buyPrice\').html(\'\') " class="btns"
                  onclick="$(\'#productname\').html(\'\');$(\'#model\').html(\'\')" value="Clear">
          </td>
          <td colspan="2">
              <input class="actionBtn" type="submit" class="btns" value="Add">
          </td>
      </tr>

  </table>
</fieldset>'
            </form>
            <form method="post" class="tableinfo" style="display:none;">
                <input type="text" name="drop" id="dropId" value="" hidden >
                <input type="text" name="table" value="<?php echo $table; ?>" hidden>
                <input type="text" name="name" id="dropName" hidden>
                <input type="number" name="quantity" id="dropQuantity" hidden>
                <input type="text" name="model" id="dropModel" hidden>
            </form>

            <form method="post" class="editform" style="display:block;">
                <input type="text" name="eid" id="editId" value="" hidden>
                <input type="text" name="table" value="<?php echo $table ?>" hidden>
                <input type ="text" name ="userid" value="<?php echo $usid ?>" hidden>
            </form>
        </section>
    </div>

    <script>




$('.searchbar').on("submit",function(e)
            {
                e.preventDefault();
            });

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
        if($('#Sprice').val()!="" && $('#quantity').val()!="")
        {
            var a = $('#Sprice').val() * $('#quantity').val();
            $('#totalA').html(a);
        } 
        
     
    }, 1000);




    //on adding new products 
    

});



        $('.addPro').on("submit",function(e)
        {

            
                $.ajax({

                    type: "post",
                    url: "addpro.php",
                    data: $('.addPro').serialize(),
                    dataType : "text",
                    success: function (result) {
        
                        $('.resetdata').html('');
                        $('.addPro').trigger("reset");
                        $('#hprice').show();
                        
                        console.log(result);
                        if(result=="401")
                        {
                            alert("Not Enough Quantity In Stock");
                        }
                        }

                });
        


        e.preventDefault();
    });



    //generate  table 

    setInterval(() => {
        $.ajax({

        type: "post",
        url: "table.php",
        data: $('.tableinfo').serialize(),
        dataType : "text",
        success: function (result) {
        
        $('.ScrollTable').html(result);
        $('.tableinfo').trigger("reset");
        
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
                        
                    $('.addPro').html(result);
                       
                }

        });
            
        e.preventDefault();


        
    });

    

    </script>
</body>
