 <?php
	ini_set('session.gc_maxlifetime',60); 
	session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>Bazy danych: Zakłady bukmacherskie - Panel administracyjny</title>
</head>
<body>
	<h2><font color="blue">Bazy danych: Zakłady bukmacherskie</font></h2>
	<h4>Autorzy: Maciej Nowak</h4>

<?php
				
	if (isset($_SESSION['login']))
	{
		echo '<p>Witaj: ' . $_SESSION['login'] . ' <a href="logout.php">Wyloguj się</a></br></br>
		</br>DANE STADIONU</br></p>';
		
		$database = mysqli_connect('localhost', 'root', '', 'zaklady') or die("Could not connect");
		$query = "SELECT * FROM Stadion WHERE nazwa = '" . $_GET['nazwa'] ."'";
		$data = mysqli_query($database, $query) or die("Query failed");
		
		while($row = mysqli_fetch_array($data))
		{	
			echo '<p><b>Nazwa stadionu: </b>' . $row['nazwa'] . ' </p>';
			echo '<p><b>Miasto: </b>' . $row['miasto'] . ' </p>';
			echo '<p><b>Pojemność: </b>' . $row['pojemnosc'] . ' </p>';
		}
		mysqli_close($database);
		echo '<p></br><a href="index.php">Powrót</a></br></p>';
	}
	else
	{
		echo '<p>Zaloguj się, aby uzyskać dostęp. Jeśli nie masz konta, zarejestruj się<br/><p>
		<p><a href="login.php">Zaloguj się</a></p>
		<p><a href="register.php">Zarejestruj się</a></p> ';
	}

?>

</body>
</html>

