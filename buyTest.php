<!DOCTYPE html>
<html>
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<!--<link rel="shortcut icon" href="img/favicon.png">-->
	<!-- Author Meta -->
	<meta name="author" content="Paul Rhee, Ming Chiang-Tseng, Anisa Anuar">
	<!-- Meta Description -->
	<meta name="description" content="This is TexChange.">
	<!-- Meta Keyword -->
	<meta name="keywords" content="textbook exchange">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Search | TexChange</title>
	<link rel="stylesheet" href="styles.css">
</head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}
</style>
<body>

    <div onclick="location.href='search.html'" class="nav-bar">
        <div class="texchange">
            TEXCHANGE
        </div>
        <nav>
            <ul class="nav-menu">
                <li><a href="search.html">Home</a></li>
                <li><a href="userProf.html">Account</a></li>
                <li><a href="login.html">Log out</a></li>
            </ul>
        </nav>
    </div>

    <div class="container-95">

        <h2><u>BUY</u></h2>
        <p>The following people have this textbook! Please contact the person that you wish to buy from via email or phone. Thank you!</p>

        <table id="buyTable">
        <thead>
            <tr>
                <th><u>Name</u></th>
                <th><u>Email</u></th> 
                <th><u>Phone</u></th> 
                <th><u>Price</u></th>
                <th><u>Condition</u></th>
            </tr>
        </thead>
        <tbody>
        <?php
        $connect = mysqli_connect("localhost","root", "", "db");
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }
        $query = "select `name`, email, phone, `condition`, price from buy right join (select * from listing where listing_id = 1) as listing on book_sold_id = listing_id left join user on seller_id = user_id";
        $results = $connect->query($query);
        while($row = $results->fetch_assoc()) {
            <tr>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["phone"]?></td>
                <td><?php echo $row["price"]?></td>
                <td><?php echo $row["condition"]?></td>
            </tr>
        }
        $connect->close();
        ?>
        </tbody>    
            
        </table>
    </div>

</body>
</html>