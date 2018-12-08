//<?php
//session_start();
//if($_SESSION['Login']!="Active")
//{
//    header("location:loginPage.php");
//}
//?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Customer-Login</title>
<link rel="stylesheet" href="WholeSaler/styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>

<body>

		<section id="body" class="width">
			<aside id="sidebar" class="column-left">

			<header>
				<h1><a href="#">Customer</a></h1>

				<h2>The Complete Info</h2>

			</header>
			<!--THE LEFT SIDE MENU IS DUE TO THE ABOVE CODE...!!-->
			<nav id="mainnav">
  				<ul>
                            		<li> <a href= CustomerLogin.php">Home</a></li>
															
																<li class="selected-item"> <a href="CustomerTransactions.php">All Transactions</a></li>
									                            <li> <a href="PaymentsDue.php">Payments Due</a></li>
																<li> <a href="Logout.php">Logout</a></li>
          </ul>
			</nav>



			</aside>

		<section id="content" class="column-right">

	    <article>

		<blockquote><p>WholeSalerlogin contain 1.Add Customer 2.Add Transaction 3.Depleted Stocks  4.Defaulters Table 5. Updating the stocks 6.Adding about the buyer</p></blockquote>
		<p>&nbsp;</p>

		<!--	<a href="#" class="button">Read more</a>
			<a href="#" class="button button-reversed">Comments</a> -->
		<!--IN THIS FIELD WE CAN ADD THE CUSTOMER..-->
		<!--THE ABOVE CREATES THE TABLE VIEW WHICH YOU WILL BE NEEDING...-->
    <fieldset>
      <legend><strong><h3>From Date to To Date Transactions</h3></strong></legend>
      <form action="CustomerTransactions.php" method="POST">
        <p><label for="FDate"><strong>From Date:</strong></label>
        <input type="Date" name="FDate" id="FDate"  placeholder = "Start Date" required/><b/></p>

        <p><label for="TDate">To Date:</label>
        <input type="Date" name="TDate" id="TDate" placeholder= "Login_ID" required/><br /></p>

        <p><input type="submit" name="Show" class="formbutton" value="Show Transactions" /></p>
      </form>

    </fieldset>

    <?php
    if(isset($_POST['Show']))
    {
      $fdate = $_POST['FDate'];
      $tdate = $_POST['TDate'];
    ?>

     <!--Printing the transactions from Start date to end Date-->
    <fieldset>
				<legend><h3>Customer Transactions</h3></legend>
				<table>

					<tr>
            <th>Transaction_ID</th>
						<th>Product_ID</th>
						<!--<th>Customer_ID</th>-->
						<th>Total_Amount</th>
						<th>Transaction_Date</th>
   				</tr>

					<?php
						$conn = mysqli_connect("localhost","root","","WholeSale_Management");
						$cid= $_POST['CustomerID'];
						$sql = "SELECT * FROM transaction_detail
						WHERE Trans_Init_Date>='$fdate' AND Trans_Init_Date<='$tdate' AND CustomerID =cid";

						$result = mysqli_query($conn,$sql);

						$row = mysqli_fetch_assoc($result);
						do { ?>


					<tr>
						<td><?php echo $row['TransactionID']; ?></td>
						<td><?php echo $row['ProductID']; ?></td>
						<td><?php echo $row['Total_Amount']; ?></td>
						<td><?php echo $row['Trans_Init_Date']; ?></td>
					</tr>

					<?php } while($row = mysqli_fetch_assoc($result)) ?>

          <?php
              $conn = mysqli_connect("localhost","root","","WholeSale_Management");
              $sql = "SELECT SUM(Total_Amount) FROM transaction_detail
              WHERE Trans_Init_Date>='$fdate' AND Trans_Init_Date<='$tdate' AND CustomerID = cid";

              $result1 = mysqli_query($conn,$sql);
              $row = mysqli_fetch_assoc($result1);

               ?>
               <p>The Total Amount The whole saler got from <?php echo $fdate  ?> to <?php echo $tdate ?> is <?php echo $row['SUM(Total_Amount)'] ?> </p>
          <?php } ?>




				</table>
		</fieldset>
				<p>&nbsp;</p>

		</article>


</p>
			<footer class="clear">
				<p>&copy; rnsit</p>
			</footer>

		</section>

		<div class="clear"></div>

	</section>


</body>
</html>
