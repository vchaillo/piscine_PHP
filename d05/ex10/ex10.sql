SELECT `titre` AS 'Titre', `resum` AS 'Resume', `annee_prod`
	FROM `db_vchaillo`.`film`
	INNER JOIN `db_vchaillo`.`genre` ON `film`.`id_genre` = `genre`.`id_genre`
	WHERE `genre`.`nom` = 'erotic'