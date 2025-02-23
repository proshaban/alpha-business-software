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



include 'preloader.php';
?>
<!DOCTYPE html>

<head>
    <title>New Destributer Bill || Alpha Business</title>

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
                <h1>Smart Business Software</h1>
                <p>By Shaban Khan</p>
            </div>
            <div class="pagetitle">
                <p><i class="fas fa-file-medical"></i> NEW RECORD</p>
            </div>
        </header>
        <section class="data">

            <div class="details">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>:<?php echo $name ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:<?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:<?php echo $mobile ?></td>
                    </tr>
                    <tr>
                        <td>Date </td>
                        <td>:<?php echo $date ?></td>
                    </tr>
                    <tr>
                        <td>
                        <td></td>
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
                                </td>
                                <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
                                <input type="text" name="transtable" value="<?php echo $random ?>" hidden>
                                <input type="text" name="destid" value="<?php echo $destid ?>" hidden>
                            </tr>

                            <tr style="text-align:center;">
                                <td><button onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button type="submit">Yes</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <form method="post" class="action AddProduct">
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
                <td><input type="text" name="name"  required/></td>
              </tr>
              <tr>
                <td>Model No.</td>
                <td><input type="text" name="model"  required/></td>
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
                <form action="saverec.php" method="post" class="action SaveRec">
                    <fieldset>
                        <table>
                            <legend>Save Record</legend>
                            <tr>
                                <td colspan="2">
                                    <h1>Do you want to save this record?</h1>
                                </td>
                                <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
                                <input type ="text" name="destid" value ="<?php echo $destid ?>" hidden>
                                <input type="text" name="destTid" value="<?php echo $newid ?>" hidden>
                            </tr>
                            <tr>
                                <td>Bill number</td>
                                <td><input type="text" name="billno" id="" required></td>
                            </tr>
                            <tr>
                                <td>Total Amount </td>
                                <td><span class="totalS">Loading...</span>
                                <input type="text" id="totalS" name="total" required hidden></td>
                            </tr>
                            <tr>
                                <td>Paid Amount </td>
                                
                                <td>
                                <input type="number" id="paidS" name="paid" id="" required></td>
                            </tr>
                            <tr>
                                <td>Due Amount </td>
                                <td> <span class="dueS" ></span>
                                    <input type="number" id="dueS" name="dues" id="" required hidden></td>
                            </tr>
                            <tr>
                                <td>Enter date :</td>
                                <td><input type="date" name="date" id="" required></td>
                            </tr>
                            <tr style="text-align:center;">
                                <td><button onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button type="submit">Save</button></td>
                            </tr>
                        </table>
                    </fieldset>
                </form>

            </div>
            <div class="dataTable ScrollTable">
                    
            </div>
            <form method="post" class="searchbar">
                Search Your Product To Add On List<input type="search" name="search" id="searchinput"
                    placeholder="Enter Name Or Model Number">
                <ul id="searchlist">
                    

                </ul>
            </form>

            <form method="post" class="addPro">
                <fieldset>
                    <table>
                    <input type="text" name="table" value="<?php echo $tablename ?> " hidden>
                    <input type="text" name="destid" value="<?php echo $destid ?> " hidden>
                    <input type ="text" name="proid" value="" hidden>
                        <legend>Add Products</legend>
                        <tr>
                            <td colspan="3">
                                <p>Name OF Product* : <span id="productname" class="resetdata" style="color:black;"></span> </p>
                                <input type="text" name="name" id="productnamein" required hidden>
                            </td>

                            <td colspan="2">
                                <p> Model* : <span id="model" class="resetdata" style="color:black;"></span> </p>
                                <input type="text" name="model" id="modelin" placeholder="Enter name Or model No."
                                     required hidden>
                            </td>

                        </tr>
                        <tr>

                            <td colspan="2">Quantity* <br></td>

                            <td colspan="2" >Rate* (Exclusive Of Tax) </td>
    

                        </tr>
                        <tr>
                            <td colspan="2" >
                                <input type="text" name="quantity" id="quantityP" placeholder="Quantity of product" required>
                            </td>
                            <td colspan="2">
                                <input type="text" name="rateE" id="rateP" placeholder="Enter Rate Without Tax" required>
                            </td>
            
                        </tr>
                        <tr>



                            <td>CGST*</td>
                            <td>CGST Amount*</td>
                            
                            <td>SGST*</td>
                            <td>SGST* Amount</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="cgstp" id="cgstpP" placeholder="in percentage" required></td>
                            <td><input type="text" name="cgst" id="cgstP" placeholder="Amount" required></td>

                            <td><input type="text" name="sgstp" id="sgstpP" placeholder="in percentage" required></td>
                            <td><input type="text" name="sgst" id="sgstP" placeholder="Amount" required></td>
                        </tr>
                        <tr>
                            <td>Discount (if any) </td>
                            <td>Net Buying Rate* </td>
                            <td>MRP*</td>
                            <td> Total Amount </td>
                           
                        </tr>
                        <tr>
                            <td><input type="text" id="discountP" placeholder="in percentage"></td>
                            <td><input type="text" name="rate" id="netrateP" placeholder="Amount" required></td>
                            <td><input type="text" name="MRP"  placeholder="Amount" required></td>
                            <td colspan="2"><input type="text" name="total" id="totalP"  placeholder="Amount" required></td>
                        </tr>
                        <tr style="text-align:center;">
                            <td colspan="2">
                                <input type="reset" class="btns"
                                    onclick="$('#productname').html('');$('#model').html('')" value="Clear">
                            </td>
                            <td colspan="2">
                                <input type="submit" class="btns" value ="submit">
                            </td>
                        </tr>

                    </table>
                </fieldset>

            </form>
            <form method="post" class="tableinfo" style="display:none;">
                <input type="text" name="drop" id="dropId" value="" hidden>
                <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
                <input type="text" name="userid" value="<?php echo $_COOKIE['usid'] ?>"  hidden>
                <input type ="text" name="proId" id="proId" value="" hidden >
                <input type ="text" name="destid" value="<?php echo $destid ?>" hidden >
                
            </form>
            <form method="post" class="editform" style="display:block;">
                <input type="text" name="eid" id="editId" class="editId" value="" hidden>
                <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
                <input type="text" name="destid" value="<?php echo $destid ?> " hidden>
            </form>
        </section>
    </div>

    <script>

        setInterval(function () {
        if ( $('#searchinput').val()!= "") {
                $('.searchbar').on("submit",function(e)
                {  
                e.preventDefault();
                });
            
          
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
    },1000);


    //calculations 

    setInterval(() => {

        if($('#quantiyP').val()!="" && $('#rateP').val()!="")
        {
            if($("#cgstpP").val()!="")
            {
                var a = $('#rateP').val() * ($('#cgstpP').val()/100);
                $('#cgstP').val(a.toFixed(2));
            }

            if($("#sgstpP").val()!="")
            {
               
                var b = $('#rateP').val() * ($('#sgstpP').val()/100);
                $('#sgstP').val(b.toFixed(2));
            }

           
        }
        
        
    }, 500);


//auto filling details
setInterval(() => {
            if($('#discountP').val()!="" && $('#quantityP').val()!="" && $('#rateP').val()!="" && $("#sgstpP").val()!="" && $("#cgstpP").val()!="")
            {

                var sgst = $('#sgstpP').val();
                var cgst = $('#cgstpP').val();
                var rate = $('#rateP').val();
                var quantity = $('#quantityP').val();
                var discount = $('#discountP').val();

                var percent = parseInt(sgst)+ parseInt(cgst);


                var ratetax = parseInt(rate) + (parseInt(rate) * percent/100);

                var discounted = ratetax - (ratetax * parseInt(discount)/100);


                $('#netrateP').val(discounted.toFixed(2));

                var total = discounted  * quantity ;

                $('#totalP').val(total.toFixed(2));

            }
            else if($('#discountP').val()=="" && $('#quantityP').val()!="" && $('#rateP').val()!="" && $("#sgstpP").val()!="" && $("#cgstpP").val()!="")
            {
                var sgst = $('#sgstpP').val();
                var cgst = $('#cgstpP').val();
                var rate = $('#rateP').val();
                var quantity = $('#quantityP').val();

                var percent = parseInt(sgst)+ parseInt(cgst);


                var ratetax = parseInt(rate) + (parseInt(rate) * percent/100);

                $('#netrateP').val(ratetax);
                
                var netprice = ratetax * parseInt(quantity);

                $('#totalP').val(netprice.toFixed(2));
            }
}, 500);

    //generate table 

    setInterval(() => {
        $.ajax({

        type: "post",
        url: "table.php",
        data: $('.tableinfo').serialize(),
        dataType : "text",
        success: function (result) {
        
        $('.dataTable').html(result);
        //$('.tableinfo').trigger("reset");
       
        }

    });
    }, 1000);



    //add product 

    $('.addPro').on("submit",function(e)
        {
            e.preventDefault();

        $.ajax({

                    type: "post",
                    url: "addpro.php",
                    data: $('.addPro').serialize(),
                    dataType : "text",
                    success: function (result) {
                        
                        if(result == "111")
                        {
                            alert("Fill The Mendatory Fileds");
                        }
                        else if(result=="112")
                        {
                            alert("Cann't add product to current table");
                        }
                        else if(result=="113")
                        {
                            alert(" Faild to update in product list");
                        }

                        $('.resetdata').html('');
                        $('.addPro').trigger("reset");
                        }

        });
            
        


        
    });


setInterval(() => {
    if($('#totalAmount').val()!="")
    {
        var amt = $('#totalAmount').val();
        $('.totalS').html(amt);
        $('#totalS').val(amt);
    }
    if ($('#totalS').val()!="" && $('#paidS').val()!="")
    {
        var due = parseInt($('#totalS').val()) - parseInt($('#paidS').val());

        $('#dueS').val(due);
    }
    else
    {
        var amt = $('#totalAmount').val();
        $('#dueS').val(amt);
        $('.dueS').html(amt);
    }
    
}, 500);


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

    $('.AddProduct').on("submit",function(e)
        {
            $('.AddProduct').hide();
        $.ajax({

                type: "post",
                url: "newpro.php",
                data: $('.AddProduct').serialize(),
                dataType : "text",
                success: function (result) {
                        
                    alert(result);
                    
                    $('.AddProduct').trigger("reset");
                    
                }

        });
            
        e.preventDefault();


        
    });


    </script>
</body>
