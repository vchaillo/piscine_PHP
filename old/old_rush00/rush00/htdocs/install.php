<?PHP
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "minishop";

$minishop = mysqli_connect("127.0.0.1", $username, $password);
if (!$minishop) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}

$sql = "CREATE DATABASE minishop";
if (mysqli_query($minishop, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($minishop) . "\n";
}

mysqli_close($minishop);

$minishop = mysqli_connect("127.0.0.1", $username, $password, $dbname);
if (!$minishop) {
    die("Connection failed: " . mysqli_connect_error() . "\n");
}


$sql = "CREATE TABLE User (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	login VARCHAR(30) NOT NULL,
	passwd VARCHAR(130) NOT NULL,
	cart_id INT(6) UNSIGNED NOT NULL)";
if (mysqli_query($minishop, $sql)) {
    echo "Table User created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO User (login, passwd) VALUES (
	'admin',
	'ADMIN')";
if (mysqli_query($minishop, $sql)) {
    echo "Admin user created successfully\n";
} else {
    echo "Error creating admin user: " . mysqli_error($minishop) . "\n";
}


$sql = "CREATE TABLE Product (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	categorie VARCHAR(30) NOT NULL,
	image VARCHAR(130) NOT NULL,
	description TEXT(1000) NOT NULL,
	price INT(6) NOT NULL)";
if (mysqli_query($minishop, $sql)) {
    echo "Table Users created successfully\n";
} else {
    echo "Error creating table: " . mysqli_error($minishop) . "\n";
}

//Aston Martin V8 Vantage
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'1',
	'Aston Martin V8 Vantage',
	'ASTON_MARTIN',
	'http://i.imgur.com/oTrY1kV.jpg',
	'L Aston Martin V8 Vantage est une automobile de grand tourisme du constructeur Aston Martin produite à partir de 2005.',
	'99')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 1 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

//Aston Martin Vanquish
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'2',
	'Aston Martin Vanquish',
	'ASTON_MARTIN',
	'http://i.imgur.com/7NMaNCX.jpg',
	'Avec ce nouveau modèle, Aston Martin se dote d\'une automobile capable de rivaliser avec les GT les plus performantes du marché. En effet, même si l Aston Martin V8 ou la Vantage possédaient les performances nécessaires, leur technologie était dépassée. La Vanquish doit mêler le meilleur des deux, une technique de pointe dans un véhicule artisanal construit à Newport Pagnell. Ce modèle remplace donc la Virage dans les ateliers traditionnels de la marque et est construite à la main. C\'est pourquoi la production sera limitée à 300 exemplaires par an, versions coupé ou coupé 2+2 confondues. Les ateliers ont toutefois été largement modernisés afin de garantir un haut niveau de qualité.',
	'45')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 2 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

//Audi r8
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'3',
	'Audi R8',
	'AUDI',
	'http://i.imgur.com/Juimevp.jpg',
	'L\'Audi R8 tire son nom de la voiture de course homonyme, victorieuse aux 24 Heures du Mans. Le show-car Avus du salon automobile de Francfort de 1991, le prototype Audi quattro Spyder ou encore le concept-car Audi Le Mans quattro qui inaugura les LED, furent les inspirateurs de l\'actuelle R8. La R8 fut officiellement présentée au mondial de l\'automobile de Paris de 2006 et est présente dans les concessions Audi depuis avril 2007. Elle est produite à Neckarsulm (Bade-Wurtemberg) en Allemagne et sa construction est organisée comme dans une manufacture où des spécialistes vérifient la qualité de chaque pièce',
	'150')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 3 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'4',
	'Bugatti Veyron',
	'BUGATTI',
	'http://i.imgur.com/gmUuNzQ.jpg',
	'La Bugatti 16.4 Veyron est l\'unique modèle en production du constructeur automobile Bugatti Automobiles SAS de 2005 à 2015. C\'est la voiture de (petite) série, dans sa version la plus performante de 1200 ch, la plus rapide au monde, atteignant 434 km/h, statut conservé grâce à des règles d\'homologations non remplies par la Hennessey Venom GT détenant le record non officiel',
	'1')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 4 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'5',
	'Chevrolet Corvette Z06',
	'CHEVROLET',
	'http://i.imgur.com/wsNtQ2i.jpg',
	'Commercialisée début 2009, la ZR1 est une version « ultime » de la C6. Contrairement aux autres déclinaisons de la C6, son V8 reçoit un système de suralimentation. Avec une cylindrée de 6 162 cm3 et un compresseur Eaton, cette version du V8 (nom de code LS9) développe désormais 647 ch à 6 500 tr/min, avec un couple de 819 Nm à 3 800 tr/min, elle ne met que 3,5 secondes pour passer de 0 à 100 km/h.
Lors de sa présentation, la C6 ZR1 a particulièrement impressionné par la révélation de ses performances sur circuit. Elle a notamment signé en 2008 un temps record de 7 min 26 s sur la célèbre boucle nord du Nürburgring, la Nordschleife. Les nombreuses innovations techniques dont elle dispose ont permis de rendre sa conduite plus accessible et performante : nouvelle gestion du système de suspension Magnetic Ride Control, adoption de freins en carbone/céramique, commande de boîte plus rapide, etc.',
	'130')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 5 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'6',
	'Ferrari 458 Italia',
	'FERRARI',
	'http://i.imgur.com/0vAQCaE.jpg',
	'La 458 Italia est une voiture de sport produite par le constructeur italien Ferrari. Les deux premiers chiffres de son nom indiquent la cylindrée du moteur et le dernier, le nombre de cylindres. Le nom « Italia », succédant à « Modena » et « Maranello », rappelle les origines géographiques de la marque.',
	'36')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 6 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'7',
	'Ferrari 599',
	'FERRARI',
	'http://i.imgur.com/8bN6URM.jpg',
	'La Ferrari 599 GTB Fiorano est une voiture de sport produite par le constructeur italien Ferrari. Apparue en 2006, elle remplace les Ferrari 575M GTC et Ferrari 575M Maranello commercialisées en 2002, et succède, plus généralement, à la lignée des Ferrari 550 Maranello introduite en 1996.',
	'48')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 7 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'8',
	'Ferrari F40',
	'FERRARI',
	'http://i.imgur.com/0dCnL7M.jpg',
	'La Ferrari F40 est une voiture de sport de prestige, produite par le constructeur automobile italien Ferrari entre 1987 et 1992, pour fêter les 40 ans de la marque. Elle succède à la Ferrari 288 GTO. Elle est au moment de sa sortie la Ferrari la plus rapide, la plus puissante et la plus chère jamais proposée au public.',
	'40')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 8 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'9',
	'Ferrari Testarossa',
	'FERRARI',
	'http://i.imgur.com/GrhY7Hb.jpg',
	'La Ferrari Testarossa est une voiture de sport de Grand Tourisme du constructeur automobile italien Ferrari. Animée par un bloc-moteur central arrière 12 cylindres à plat de 390 chevaux (en V ouvert à 180° et non un véritable boxer comme le flat 12 des Porsche 917, qui est lui aussi un moteur à plat), elle est capable d\'atteindre la vitesse de 300 km/h et a été présentée au mondial de l\'automobile de Paris en 1984. C\'est l\'avant-dernière voiture de série à sortir des usines de Maranello sous le règne du Commendatore Enzo Ferrari disparu le 14 août 1988 juste après la sortie de la Ferrari F40 ; une série spéciale a été créée pour fêter les 40 ans de la marque.',
	'86')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 9 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'10',
	'Ford GT40',
	'FORD',
	'http://i.imgur.com/P0axRzj.jpg',
	'La Ford GT40 est une voiture de sport du constructeur américain Ford qui a été fabriquée à 126 exemplaires, de 1964 à 1968. Elle a permis à la firme américaine de remporter, entre autres, les 24 Heures du Mans à quatre reprises successives, de 1966 à 1969.
	L\'appellation GT40 vient des initiales « GT » de la catégorie « Grand Touring » (Grand Tourisme), complétées par le nombre 40 pour sa hauteur de caisse de 40 pouces (soit 1,02 m).',
	'70')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 10 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'11',
	'Golf 4 Chaillou Ed. V12',
	'ROLCE_ROYCE',
	'http://i.imgur.com/t2hSbaf.jpg',
	'La Super Golf 4 Chaillou Ed. est un coupé décapotable construit par Rolls-Royce Motor Cars qui a été introduit lors de l\'édition de janvier 2007 du Salon international de l\'automobile d\'Amérique du Nord à Détroit (Michigan). Il est basé sur la Rolls-Royce Phantom de 2003, la toute première Golf dessinée par BMW.
	La Golf 4 est construite à Goodwood au Royaume-Uni, dans la nouvelle usine construite par BMW.',
	'900000')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 11 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'12',
	'Jaguar Type F',
	'JAGUAR',
	'http://i.imgur.com/W3ApZAk.jpg',
	'La Jaguar F-Type est une voiture de luxe développée par la marque automobile Jaguar.
	Il est dévoilé au Mondial de l\'automobile de Paris 2012.',
	'6')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 12 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'13',
	'Lamborghini Countach',
	'LAMBORGHINI',
	'http://i.imgur.com/FcqcK00.jpg',
	'La Lamborghini Countach est une supercar produite par le constructeur automobile italien Lamborghini entre 1974 et 1990. Ce modèle, qui a remplacé la Lamborghini Miura, a lui-même laissé la place à la Lamborghini Diablo.',
	'99')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 13 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

#Lamborghini Gallardo
$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'14',
	'Lamborghini Gallardo',
	'LAMBORGHINI',
	'http://i.imgur.com/1KqrgW0.jpg',
	'La Lamborghini Gallardo est une voiture de sport du constructeur automobile italien Lamborghini. Sa conception est dirigée par Audi, propriétaire de la marque depuis 1998. Très attendue lors de sa présentation au salon automobile de Genève 2003, elle est conçue pour concurrencer la Ferrari 360 Modena. La marque avait dévoilé son moteur V10 de 5 litres au Mondial de l\'automobile de Paris 2002.

Le nom de la Gallardo évoque une célèbre race de taureaux de combat de la région de Cadix, nom utilisé afin de rester fidèle aux vœux de Ferruccio Lamborghini, le fondateur né sous le signe du taureau.

Après dix ans de production, la dernière Gallardo est sortie de l\'usine le 26 novembre 2013. Avec 14 022 voitures construites, c\'est le modèle le plus produit, et de loin, par la marque. En 2014, la Lamborghini Huracán prendra sa suite.',
	'67')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 14 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'15',
	'Lamborghini Miura',
	'LAMBORGHINI',
	'http://i.imgur.com/6AWyfXC.jpg',
	'La Lamborghini Miura est un modèle automobile du constructeur Italien Lamborghini, qui fut produit de 1966 à 1973. Une des premières voitures de série dotées d\'un moteur central-arrière, elle est devenue un des modèles majeurs de l\'histoire de l\'automobile.',
	'120')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 15 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'16',
	'Mclaren P1',
	'MCLAREN',
	'http://i.imgur.com/3wMt3lK.jpg',
	'La McLaren P1 est une supercar hybride électrique/essence du constructeur britannique McLaren. Elle a été présentée au Salon international de l\'automobile de Genève 2013 et sera fabriquée en série exclusive à 375 exemplaires.',
	'36')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 16 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'17',
	'Maserati GranTurismo S',
	'MASERATI',
	'http://i.imgur.com/9F8oXKM.jpg',
	'La Maserati GranTurismo est une automobile Grand Tourisme du constructeur automobile italien Maserati, présentée en mars 2007 au salon international de l\'automobile de Genève. La version Maserati GranCabrio est présentée au salon de l\'automobile de Francfort 2009.',
	'20')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 17 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'18',
	'Mercedes SLS AMG',
	'MERCEDES',
	'http://i.imgur.com/JS3HDEc.jpg',
	'La Mercedes-Benz SLS AMG est un modèle du constructeur allemand Mercedes-Benz. 
	Il reprend les ailes papillon de la 300 SL des années 1950. Ce modèle, conçu par AMG (comme les autres modèles sportifs de la gamme) reprend le moteur V8 6,2 L atmosphérique développé par le préparateur (et installé dans nombre de modèles : Classes C, E, CL, S, SL, CLS, ML, CLK 63 AMG). 
	Il développe 571 ch à 6 800 tr/min et un couple de 650 Nm à 4 750 tr/min. Les performances annoncées sont un 0 à 100 km/h effectué en 3,8 s et une vitesse maximale limitée électroniquement de 317 km/h. La répartition des masses est de 47/53, soit 47 % du poids à l’avant et 53 % à l’arrière. Au Salon de Paris de 2010, une version e-cell électrique de la SLS a été présentée.',
	'15')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 18 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'19',
	'Mustang 350GT',
	'FORD',
	'http://i.imgur.com/ZrqN4o2.jpg',
	'La Shelby GT 350 est une automobile Ford Mustang modifiée par Carroll Shelby.

	En 1964, Ford connait un succès sans précédent avec sa nouvelle Ford Mustang, mais très vite, Ford se rend compte qu\'ils ont besoin d\'ajouter un modèle plus sportif à la gamme existante, principalement pour courir en championnat américain du SCCA en catégorie \" B production \", car à l\'époque, \"gagner des courses le dimanche c\'est vendre des autos le lundi \".

	Et c\'est tout naturellement qu\'ils se tournent vers Carroll Shelby, partenaire vainqueur de bien des courses avec ses Cobras motorisées par Ford.

	Ainsi les premiers exemplaires prototypes sont fabriqués en décembre 1964 par Shelby American, la société de Carroll Shelby.',
	'7')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 19 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'20',
	'Nissan GTR',
	'NISSAN',
	'http://i.imgur.com/oE4g3Q6.jpg',
	'La Nissan GT-R est une voiture de sport produite depuis 2007 par le constructeur japonais Nissan.
	La GT-R est propulsée par un V6 de 3,8 litres bi-turbo, entièrement assemblé à la main et développant une puissance de 485 ch à 6 400 tr/min et un couple de 587 Nm, disponible entre 3 200 et 5 200 tr/min. 
	On notera toutefois que la puissance annoncée est sous-évaluée par-rapport à la puissance réellement délivrée par le moteur.',
	'83')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 20 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'21',
	'Pagani Zonda',
	'PAGANI',
	'http://i.imgur.com/V6VwCG8.jpg',
	'La Pagani Zonda est une supercar du constructeur automobile italien Pagani produite depuis 1999 au rythme d\'environ vingt-cinq unités par an. En décembre 2005, soixante Zonda, toutes versions confondues, avaient été construites. Elle existe en coupé et en roadster, possède un moteur en position centrale arrière et est principalement composée en matériaux composites à base de fibre de carbone.

	Une partie du développement a profité de l\'aide du champion de Formule 1, Juan Manuel Fangio. Aussi, la voiture devait être nommée « Fangio F1 », mais ce nom fut changé en « Zonda » après sa mort en 1995. « Zonda » étant le nom d\'un vent soufflant dans la Cordillère des Andes d\'où sont originaires Horacio Pagani et Juan Manuel Fangio',
	'19')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 21 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

$sql = "INSERT INTO Product (id, name, categorie, image,description, price) VALUES (
	'22',
	'Porsche 918',
	'PORSCHE',
	'http://i.imgur.com/RssiKQo.jpg',
	'La Porsche 918 Spyder est une supercar hybride rechargeable du constructeur allemand de voitures de sport Porsche développée depuis novembre 2009 sous la direction du docteur Frank-Steffen Walliser.

	Elle fut présentée officiellement pour la première fois lors du 80e édition du salon de Genève, qui s\'est tenue en mars 2010. Elle a été dévoilée en version définitive au salon de Francfort en septembre 2013.',
	'57')";
if (mysqli_query($minishop, $sql)) {
    echo "Adding car 22 accepted\n";
} else {
    echo "Error creating car: " . mysqli_error($minishop) . "\n";
}

mysqli_close($minishop);
?>