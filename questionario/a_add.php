<?php

require 'auth.php';
require 'config.php';

if (isset($_POST['tambah'])) {

  $pergunta    = filter_input(INPUT_POST, 'pergunta', FILTER_SANITIZE_STRING);
  $pilihan_1     = filter_input(INPUT_POST, 'pilihan_1', FILTER_SANITIZE_STRING);
  $pilihan_2     = filter_input(INPUT_POST, 'pilihan_2', FILTER_SANITIZE_STRING);
  $pilihan_3     = filter_input(INPUT_POST, 'pilihan_3', FILTER_SANITIZE_STRING);
  $pilihan_4     = filter_input(INPUT_POST, 'pilihan_4', FILTER_SANITIZE_STRING);
  $kunci_jawaban = strtolower(filter_input(INPUT_POST, 'kunci_jawaban', FILTER_SANITIZE_STRING));

  try {
    
    $stmt = $pdo->query("INSERT INTO perguntas (pergunta, pilihan_1, pilihan_2, pilihan_3, pilihan_4, kunci_jawaban) VALUES ('$pergunta', '$pilihan_1', '$pilihan_2', '$pilihan_3', '$pilihan_4', '$kunci_jawaban')");

    if ($stmt === false) {

      throw new PDOException('Error Processing Request.');

    } else {

      $msg_title = urlencode('Berhasil!');
      $msg_text  = urlencode('Input perguntas berhasil!');
      $msg_icon  = 'success';
      $msg       = 'msg_title=' . $msg_title . '&msg_text=' . $msg_text . '&msg_icon=' . $msg_icon;

      header('Location: a_view.php?' . $msg);

    }

  } catch (PDOException $e) {
    
    echo $e->getMessage();

  }

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
    <title>Adicione uma pergunta</title>
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
  	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Soal <span class="caret"></span></a>
  	          <ul class="dropdown-menu">
  	            <li class="active"><a href="a_add.php">Add <span class="sr-only">(current)</span></a></li>
  	            <li><a href="a_view.php">View</a></li>
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
  		<div class="panel panel-primary">
  		  <div class="panel-heading">
  		    <h3 class="panel-title">Form Soal</h3>
  		  </div>
  		  <div class="panel-body">
  		  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  		  		<div class="form-group">
  		  			<label for="pergunta">pergunta</label>
  		  			<input type="text" class="form-control" name="pergunta" id="pergunta">
  		  		</div>
  		  		<div class="form-group">
  		  			<label for="pilihan_1">Pilihan A</label>
  		  			<input type="text" class="form-control" name="pilihan_1" id="pilihan_1">
  		  		</div>
  		  		<div class="form-group">
  		  			<label for="pilihan_2">Pilihan B</label>
  		  			<input type="text" class="form-control" name="pilihan_2" id="pilihan_2">
  		  		</div>
  		  		<div class="form-group">
  		  			<label for="pilihan_3">Pilihan C</label>
  		  			<input type="text" class="form-control" name="pilihan_3" id="pilihan_3">
  		  		</div>
  		  		<div class="form-group">
  		  			<label for="pilihan_4">Pilihan D</label>
  		  			<input type="text" class="form-control" name="pilihan_4" id="pilihan_4">
  		  		</div>
  		  		<div class="form-group">
  		  			<label for="kunci_jawaban">Kunci Jawaban</label>
  		  			<input type="text" class="form-control" name="kunci_jawaban" id="kunci_jawaban" placeholder="e.g., a, b, c, d" maxlength="1">
  		  		</div>
  				<input type="submit" class="btn btn-default" name="tambah" value="Tambah">
  			</form>
  		  </div>
  		</div>
  	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
  </body>
</html>