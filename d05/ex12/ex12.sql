SELECT nom, prenom FROM fiche_personne WHERE prenom LIKE "%-%" OR nom LIKE "%-%" ORDER BY nom, prenom;
