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
  <title>Transactions || Alpha Business</title>

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
        <p><i class="fas fa-align-justify"></i> All TRANSACTIONS</p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        <table>
          <tr>
            <td>Name</td>
            <td colspan="2">: <?php echo $name?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td colspan="2">: <?php echo $email ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td colspan="2">: <?php echo $mobile ?></td>
          </tr>
          <tr>
            <td>GST Number</td>
            <td colspan="2">: <?php echo $gst ?></td>
          </tr>
          <tr>
            <td align="center">
              <div class="amounts" style="color:blue">
                ₹ <br />
                <?php echo $total ?> <br />
                Total
              </div>
            </td>
            <td align="center">
              <div class="amounts" style="color:green">
                ₹ <br />
                <?php echo $paid ?> <br />
                paid
              </div>
            </td>
            <td align="center" style="color:red">
              <div class="amounts">
                ₹ <br />
                <?php echo $dues ?> <br />
                Dues
              </div>
            </td>
            <td></td>
          </tr>
        </table>
        <div class="actions">
          <button onclick="location.href='destributers.php'" ><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="$('.action').hide();$('.PayDues').show();"><i class="fas fa-rupee-sign"></i> Pay Dues</button>
          <button onclick="$('.action').hide();$('.EditData').show();"><i class="fas fa-edit"></i> Edit Info</button>
          <button onclick="location.href='newbill/addnew.php?destId=<?php echo $destid ?>'"><i class="fas fa-file-medical"></i> New Bill</button>
        </div>

        <form action="paydues.php" method="post" class="action PayDues">
          <fieldset>
            <table>
              <input type="text" name="table" value="<?php echo $destid ?>" hidden>
              <legend>Pay Old Dues</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>You are now paying old dues</h1>
                </td>
              </tr>

              <tr>
                <td>Total Due Amount</td>
                <td><?php echo $dues ?>
                <input type="text" name="total" id="totalS" value="<?php echo $dues ?>" hidden>
                </td>

              </tr>
              <tr>
                <td>Paying Amount</td>
                <td><input type="number" name="paid" name="payamount" id="paidS" /></td>
              </tr>
              <tr>
                <td>Rest Due Amount</td>
                <td><input type="number" name="dues" id="dueS" /></td>
              </tr>
              <tr>
                <td>Enter date :</td>
                <td><input type="date" name="date" id="" required /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
        <form method="post" class="action EditData">
          <fieldset>
            <table>
              <legend>Edit Details</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>Editing Distributer's Detials.</h1>
                  <input type="text" name="table" value="<?php echo $destid ?>" hidden>
                </td>
              </tr>
              <tr align="right">
                <td colspan="2"><input type="button" onclick="$('.action').hide();$('.DeleteData').show();" style="color:red; width:150px;" value="Delete Data"></input></td>
              </tr>

              <tr>
                <td>Name
                  <aside>(Name can't be change)</aside>
                </td>
                <td><?php echo $name ?></td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile" id="" maxlength="10" value="<?php echo $mobile ?>" /></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="" value="<?php echo $email ?>" /></td>
              </tr>
              <tr>
                <td>GST Number</td>
                <td><input type="text" name="gst" id="" value="<?php echo $gst ?>" /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
        <form action="deletedest.php" method="post" class="action DeleteData">
          <fieldset>
            <table>
              <legend>Delete Data</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>!!Delete Whole Data!!</h1>
                  <input type="text" name="usid" value="<?php echo $_COOKIE['usid']?>">
                  <input type="text" name="destid" value=<?php echo $destid ?>>
                </td>
              </tr>

              <tr>
                <td colspan="2">Enter Password to delete</td>
              </tr>
              <tr>
              <tr>
                <td colspan="2"><input type="password" name="pass" id="" required /></td>
              </tr>
              <tr style="text-align: center">
                <td>
                  <button onclick="$('.action').hide();" type="reset">
                    Cancel
                  </button>
                </td>
                <td><button type="submit">Save</button></td>
              </tr>
            </table>
          </fieldset>
        </form>
      </div>
      <form method="post" class="searchbar" >
        Search Bill No.<input type="search" name="search" id="searchinput" placeholder="Enter Name Or Model Number" />
        <ul id="searchlist" style="display:none ;">
          
        </ul>
      </form>
      <div class="dataTable">
        
            <?php echo $output ?>
      </div>
    </section>
  </div>

  <script>
    setInterval(() => {

    if ($('#totalS').val()!="" && $('#paidS').val()!="")
    {
        var due = parseInt($('#totalS').val()) - parseInt($('#paidS').val());

        $('#dueS').val(due);
    }
    else
    {
        var amt = $('#totalS').val();
        $('#dueS').val(amt);
    }
    
}, 500);


$('.EditData').on("submit",function(e)
{
  e.preventDefault();
  $.ajax({

    type: "post",
    url: "editdest.php",
    data: $('.EditData').serialize(),
    dataType : "text",
    success: function (result) {
    
    if(result==="success")
    {
      $('.action').hide();
      location.reload();
    }
    else
    {
      alert(result);
      $('.action').hide();
    }

    }

  });

});
  </script>
</body>
