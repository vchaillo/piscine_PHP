SELECT etage_salle as "etage", SUM(nbr_siege) as "sieges" 
	FROM salle 
	GROUP BY etage_salle 
	ORDER BY SUM(nbr_siege) DESC;
