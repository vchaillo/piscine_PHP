SELECT `nom`, `prenom`, date(`date_naissance`) as "date de naissance" FROM fiche_personne WHERE YEAR(date_naissance) = '1989' ORDER BY nom ASC;
