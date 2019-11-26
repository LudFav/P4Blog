Cr�ation de ma base de donn�e et de mes tables Billets et Commentaires

La table Billets

id : On donne � chaque billets une ID, qui sera un entier court ( de 0 � 65535) non sign�, avec comme attribut 'NOT NULL' ( le champ ne peut pas etre vide) et on l'auto-incremente
pour qu'a chaques nouveau billets, lui soit alou� un nouvel ID, 2 billets ne pourront ainsi pas avoir la m�me ID. La selection du billet voulue se fera donc plus facilement.

auteur: On donne � chaque billet un auteur, c'est une varchar, c'est � dire une chaine de caracteres et on fixe le nombre de maximum de caracteres � 30.

titre : On donne � chaque billet un titre, c'est une varchar, c'est � dire une chaine de caracteres et on fixe le nombre de maximum de caracteres � 100.

Contenu : Chaques billet � son contenu, qui sera ici du texte.

dateAjout: une date de premiere parution de type datetime.
dateModif: une date de modification du billet elle aussi de type datetime.


La table Commentaires

id: On donne � chaque commentaire une ID, qui sera un entier medium ( de 0 � 16777215) non sign�, avec comme attribut 'NOT NULL' ( le champ ne peut pas etre vide) et on l'auto-incremente
pour qu'a chaques nouveau commentaire, lui soit alou� un nouvel ID, 2 commentaires ne pourront ainsi pas avoir la m�me ID. La selection du commentaire voulue se fera donc plus facilement.

billet: l'entier court de ce champ correspond � l'ID du billet associ� � ce commentaire.

auteur: Chaque commentaire � un auteur, c'est une varchar, c'est � dire une chaine de caracteres et on fixe le nombre de maximum de caracteres � 30.

contenu: Contenu du commentaire de type texte.

dateAjoutCom: une date de premiere parution de type datetime.
dateModifCom: une date de modification du commentaire elle aussi de type datetime.

signale: de type boolean afin de savoir si le commentaire est signal�.