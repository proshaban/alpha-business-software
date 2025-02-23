<?php
include 'billdetailsB.php';
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
  <title>Bill || Alpha Business Software</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
    integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <style>
    body
    {
      width: 100%;
      
    }
    @media print
    {
      size: A 4px;
      head
      {
        display: none;
      }
      body
      {
        width: 100%;
      }
      .container
     {
       width: 95%;
       box-shadow: none;
       padding: 10px;
       border: 1px solid black;
       margin:0 auto;
     }
      
      .data
      {
        display: block;
      }
      .details
      {
        background-color: white;
      }
      .actions
      {
        display: none;
      }
      .dataTable
      {
        width: 95%;
        margin:0 auto;
        
      }
      .dataTable table
      {
        width:98%;
        overflow: hidden;
        font-size: 12px;
        padding:10px;
        max-height: fit-content;
        
      }
      .dataTable table thead th
      {
        
        background-color: white;
        color:black;
        
      }
      .dataTable table th,
      .dataTable table td {
        padding-left: 5x;
        padding-top: 0;
        padding-bottom: 0;
        border: 0.5px solid black;
        padding:0;

      }
    }
  </style>
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
        <p>Billing Details</p>
      </div>
    </header>
    <section class="data">
      <div class="details">
        <table>
          <tr>
            <td>Name</td>
            <td colspan="2">: <?php echo $name ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td colspan="2">: <?php echo $email ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td colspan="2">: <?php echo $phone ?></td>
          </tr>
          <tr>
            <td>Bill Number
            </td>
            <td colspan="2">: <?php echo $billno ?></td>
          </tr>
          <tr>
            <td>Time </td>
            <td colspan="2">: <?php echo $btime ?></td>
          </tr>
          <tr>
            <td>Date </td>
            <td colspan="2">: <?php echo $bdate ?></td>
          </tr>
          
        </table>
        <div class="actions">
          <button onclick="location.href='transactions.php?destId=dest_<?php echo $destid ?>';"><i class="fas fa-arrow-left"></i> Go Back</button>
          <button onclick="window.print()"><i class="fas fa-print"></i> Print Bill</button>
          <button onclick="$('.action').hide();$('.DeleteData').show();"><i class="fas fa-edit"></i> Delete This Bill</button>

        </div>

       
        
        <form action="deletebill.php" class="action DeleteData" method="post" autofill="off">
          <fieldset>
            <table>
              <legend>Delete Data</legend>
              <tr align="center">
                <td colspan="2">
                  <h1>   Delete This Bill  ?</h1>
                </td>
              </tr>
              <tr>
                <input type="text" name="userid" value="<?php echo $_COOKIE['usid'] ?>">
                <input type="text" name="billid" value="<?php echo $_GET['billid'] ?>">
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
      <div class="dataTable nonScrollTable">
        <?php echo $output ?>
    </div>  
    </section>
  </div>

  <script src="/records.js"></script>
</body>
