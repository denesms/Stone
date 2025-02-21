<?php

require 'auth.php';
require 'config.php';

try {

	$stmt = $pdo->query("SELECT * FROM perguntas");

	if ($stmt === false) {

		throw new PDOException('Error Processing Request.');

	}
	
} catch (PDOException $e) {
	
	echo $e->getMessage();

}

if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") {

	$newUrl = "https";

} else $newUrl = "http";

$newUrl .= "://";
$newUrl .= $_SERVER["HTTP_HOST"];
$newUrl .= "/a_clear.php";

?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Insan Penjaga Al-Qur'an</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="a_main.php">Insan Penjaga Al-Qur'an</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="a_main.php">Dashboard</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">perguntas <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="a_add.php">Add</a></li>
	            <li class="active"><a href="a_view.php">View <span class="sr-only">(current)</span></a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hasil <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="a_result.php">View</a></li>
	            <li><a href="a_clear.php" id="confAnchor" onclick="confirm();">Clear</a></li>
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th>Pertanyaan</th>
						<th>Pilihan A</th>
						<th>Pilihan B</th>
						<th>Pilihan C</th>
						<th>Pilihan D</th>
						<th>Kunci Jawaban</th>
						<th>Action</th>
					</tr>
					<?php

					while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						echo "<tr>";
						echo "<td>" . $row["pergunta"] . "</td>";
						echo "<td>" . $row["pilihan_1"] . "</td>";
						echo "<td>" . $row["pilihan_2"] . "</td>";
						echo "<td>" . $row["pilihan_3"] . "</td>";
						echo "<td>" . $row["pilihan_4"] . "</td>";
						echo "<td>" . $row["kunci_jawaban"] . "</td>";
						echo "<td><a href='a_edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='a_delete.php?id=" . $row["id"] . "'>Delete</a></td>";
						echo "</tr>";
					}
					
					?>
				</table>
			</div>
		</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
		document.getElementById("confAnchor").addEventListener("click", function(event){
		  event.preventDefault()
		});
		function confirm() {
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this data!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	window.location.href = "<?php Print($newUrl); ?>";
			  } else {
			    swal("Your data is safe!");
			  }
			});
		}
    </script>
    <?php

    if (isset($_GET["msg_title"]) && isset($_GET["msg_text"]) && isset($_GET["msg_icon"])) {
      echo "<script>swal('" . $_GET["msg_title"] . "', '" . $_GET["msg_text"] . "', '" . $_GET["msg_icon"] . "');</script>";
    }

    ?>
  </body>
</html>