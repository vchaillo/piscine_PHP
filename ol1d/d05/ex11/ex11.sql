SELECT UPPER(fiche_personne.nom) as "NOM", fiche_personne.prenom, abonnement.prix FROM fiche_personne, abonnement 
	WHERE abonnement.prix > 42 ORDER BY fiche_personne.nom, fiche_personne.prenom; 
