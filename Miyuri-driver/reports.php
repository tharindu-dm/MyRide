<?php
	include_once'config.php';
?> 
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="reports.css">
        <link rel="stylesheet" href="style.css">

      <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<!-- To adjust the screen-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

	<title>MyRide-Reports</title>
	
    </head>

    <body>
      <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">MyRide</span>
		</a>
		<ul class="side-menu top">
		<li class="active">
			<a href="index.html">
				
				<span class="text">Dashboard</span>
			</a>
		<li>
			<a href="#">
				<i class="fas fa-calendar-alt"></i>
				<span class="text">Reservations</span>
			</a>
		</li>
		<li>
			<a href="returns.html">
				<i class="fas fa-undo"></i>
				<span class="text">Returns</span>
			</a>
		</li>
		<li>
			<a href="reports.php">
				<i class="fas fa-file-alt"></i>
				<span class="text">Reports</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-chart-bar"></i>
				<span class="text">Activity</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class="fas fa-bell"></i>
				<span class="text">Reminders</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-map-marked-alt"></i>
				<span class="text">Maps</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<i class="fas fa-money-bill"></i>
				<span class="text">Payments</span>
			</a>
		</li>
	</ul>


		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->

		<nav>
			<div class="profile">
			<a href="#" class="profile">
			<i class='bx bxs-user' ></i>	
			</a></div>
		</nav>
		<!-- NAVBAR -->


		<br/>
		<button style='background-color:#ADD8E6; border-radius: 8px;'> <a href = "addReport.html"> Add Items </a> </button>
		<br/>
        <br><br>
		<div class="reports-table">
        <table id="dataTable">
            <thead>
                <tr>
                    <th>ReportID</th>
                    <th>Inquiry</th>
                    <th>Category</th>
                    <th>Report Date/Time</th>
                    <th>Ref ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Existing data from the database will be populated here -->
                <?php
                $sql = "SELECT * FROM Report";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row["ReportID"]."</td>
                            <td>".$row["Inquiry"]."</td>
                            <td>".$row["Category"]."</td>
                            <td>".$row["Report_DateTime"]."</td>
                            <td>".$row["Ref_ID"]."</td>
                            <td>
                                <a href='editReports.php?ReportID={$row['ReportID']}&Inquiry={$row['Inquiry']}&Category={$row['Category']}&ReportDT={$row['Report_DateTime']}&RefID={$row['Ref_ID']}'>
                                    <input type='submit' value='Edit' style='background-color: #00FF00; border-radius: 8px;'>
                                </a>
                            </td>
                            <td>
                                <a href='deleteReports.php?ReportID={$row['ReportID']}'>
                                    <input type='submit' value='Delete' style='background-color:#FF0000; border-radius: 8px;'>
                                </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Empty rows</td></tr>";
                }
				mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
			


				
						
				
				
				
		
		<!-- </table> -->
				
	</body>
</html>	