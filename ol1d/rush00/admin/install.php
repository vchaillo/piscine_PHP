<?PHP
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "babyshop";

$babyshop = mysqli_connect("127.0.0.1", $username, $password);
if (!$babyshop) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}

$sql = "CREATE DATABASE babyshop";
if (mysqli_query($babyshop, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($babyshop) . "\n";
}

mysqli_close($babyshop);

$babyshop = mysqli_connect("127.0.0.1", $username, $password, $dbname);
if (!$babyshop) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}


$sql = "CREATE TABLE User (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(30) NOT NULL,
	passwd VARCHAR(512) NOT NULL,
	cart_id INT(6) UNSIGNED NOT NULL)";
if (mysqli_query($babyshop, $sql)) {
    echo "Table User created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($babyshop) . "\n";
}

$salt = hash("whirlpool", "RhvFgdo7HdwW");
$passwd = hash("whirlpool", "ADMIN");
$password = $salt.$passwd;
$sql = "INSERT INTO User (login, passwd) VALUES (
	'admin',
	'$password')";
if (mysqli_query($babyshop, $sql)) {
    echo "Admin user created successfully\n";
} else {
    echo "Error creating admin user: " . mysqli_error($babyshop) . "\n";
}


$sql = "CREATE TABLE Product (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	categorie VARCHAR(30) NOT NULL,
	image VARCHAR(130) NOT NULL,
	description TEXT(1000) NOT NULL,
	price INT(6) NOT NULL)";
if (mysqli_query($babyshop, $sql)) {
    echo "Table Users created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($babyshop) . "\n";
}

//Lee
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'1',
	'Lee',
	'ASIAN',
	'http://i.imgur.com/lBejnWh.jpg',
	'Lee est un enfant tres propre, il a seulement 1 an mais a deja ecrit son premier framework php qui attira la curiosite de google',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 1 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

//Rolihlahla
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'2',
	'Rolihlahla',
	'AFRICAN',
	'http://i.imgur.com/z4E0ajo.jpg',
	'Rolihlahla est un enfant sage, il vous aimera peu importe votre ouverture d\'esprit ou vos convictions politiques',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 2 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

//Sophie
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'3',
	'Sophie',
	'EUROPEAN',
	'http://i.imgur.com/wjFxO2H.jpg',
	'Sophie est adorable, comme tous les enfants europeens elle est un modele d\'equilibre et d\'epanouissement, du moins jusqu\'a l\'adolescence ou elle sombrera dans la drogue et la prostitution',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 3 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

//Paul
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'4',
	'Paul',
	'EUROPEAN',
	'http://i.imgur.com/pOgzCkn.jpg',
	'Le petit Paul du haut de ses 1 an et demi (il tient au demi faites attention), a deja tout d\'un grand! Bien qu\'orphelin il a deja un compte en banque bien rempli grace a ces placements en bourse et a deja parcouru le globe sur son bateau a voile!',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 4 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

//Wang
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'5',
	'Wang',
	'ASIAN',
	'http://i.imgur.com/4kucVZq.jpg',
	'Wang n\'est pas le plus beau c\'est certain! Malgre cela son physique le predispose implaccablement a une grande carriere de sumo. Attention toutefois au budget nourriture!',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 5 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

//Koffi
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'6',
	'Koffi',
	'AFRICAN',
	'http://i.imgur.com/Ub1vcLw.jpg',
	'Notre petit Koffi est un grand chouineur, surement car apres l\'avoir recueilli nous nous sommes rapidement rendu compte que sa mere devait etre une junkie accro a la cafeine. Oui en effet, nous manquions d\'inspiration pour lui choisir un prenom! Mais quoi de mieux que de rendre hommage a sa droguee de mere?',
	'30')";
if (mysqli_query($babyshop, $sql)) {
    echo "Adding baby 6 accepted\n";
} else {
    echo "Error creating baby: " . mysqli_error($babyshop) . "\n";
}

?>
