# Utilisation

L'application est constituée de l'arborescence suivante : 

o Les Sources (src)
  -> 

o La Vue (view)



# Déploiement

Pour déployer l'application il vous suffira de copier le dossier complet dans le dossier de votre hébergeur local vous permettant d'exécuter l'application.
Exemple : Pour WAMP le dossier se nomme www, pour XAMP htdocs, etc.

# Informations Complémentaires

Au cours de mes tests je remarqué que l'API public d'IBANFIRST bloque les requêtes lorsque l'on excède un certain quota.
Pour remédier à ce problème je stocke les devises dans la $_SESSION à la première requête envoyée.
