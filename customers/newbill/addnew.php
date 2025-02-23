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
                        <td>Primary Phone</td>
                        <td>:<?php echo $mobile1 ?></td>
                    </tr>
                    <tr>
                        <td>Secondry Phone</td>
                        <td>:<?php echo $mobile1 ?></td>
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
                                <input type="text" name="cusid" value="<?php echo $cusid ?>" hidden >
                            </tr>

                            <tr style="text-align:center;">
                                <td><button onclick="$('.action').hide();" type="reset">Cancel</button></td>
                                <td><button type="submit">Yes</button></td>
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
                                <input type ="text" name="cusid" value ="<?php echo $cusid ?>" hidden>
                                <input type="text" name="random" value="<?php echo $random ?>" hidden>
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
</fieldset>
</form>



<form method="post" class="tableinfo" style="display:none;">
    <input type="text" name="drop" id="dropId" value="" hidden >
    <input type="text" name="table" value="<?php echo $table; ?>" hidden>
    <input type="text" name="name" id="dropName" hidden>
    <input type="number" name="quantity" id="dropQuantity" hidden>
    <input type="text" name="model" id="dropModel" hidden>
</form>


<!--this if for adding product details on the addpro form-->     
<form method="post" class="editform" style="display:block;">
<p>edit form</p>
    <input type="text" name="eid" id="editproId" value="" hidden>
    <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
    <input type ="text" name ="userid" value="<?php echo $usid ?>" hidden>
</form>


            <!--THis table is for loading the items of actual bill-->            
            <form method="post" class="tableinfo" style="display:none;">
            <p>table info </p>
                <input type="text" name="drop" id="droproId" value="" hidden>
                <input type="text" name="dropname" id="dropname" value="" hidden>
                <input type="text" name="dropmodel" id="dropmodel" value="" hidden>
                <input type="text" name="dropquan" id="dropquan" value="" hidden>
                
                <input type="text" name="table" value="<?php echo $tablename ?>" hidden>
                <input type="text" name="userid" value="<?php echo $_COOKIE['usid'] ?>" hidden>
                
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



    //generate table and drop item from table

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
                        else if(result=="401")
                        {
                            alert("Not Enough Quantity In Stock");
                        }

                        $('.resetdata').html('');
                        $('.addPro').trigger("reset");
                        }

        });
            
        


        
    });


setInterval(() => {
    
    if($('#Sprice').val()!="" && $('#quantity').val()!="")
        {
            var a = $('#Sprice').val() * $('#quantity').val();
            $('#totalA').html(a);
        } 
        

    
}, 500);


//load form 
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


//final price calculator
setInterval(() => {

    if($('.totalSum').val()!="")
    {
        var t = $('.totalSum').val();
         $('#totalS').val(t);
         $('.totalS').html(t);

         if($('#paidS').val()!="")
         {
             var p = $('#paidS').val();

             $('.dueS').html(t-p);


         }
    }
    else
    {

    }
    
}, 100);



    </script>
</body>
