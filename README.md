# Utilisation

L'application est constituée de l'arborescence suivante :  \n \n

o Les Sources (src::folder) \n
  -> Le dossier des controllers (Controller::folder) \n
    a. Le controller (DevisesHistoryController.php::class) \n \n
    
  -> Le dossier de gestion de l'API (IbanFirstAPI::folder) \n
    a. Le dossier des items récupérés (Items::folder) \n
      - Les devises (Devise.php::class) \n
      - Le gestionnaire des devises (DeviseManager.php::class) \n
    b. Le dossier des outils (Tools::folder) \n
      - La class utilisé pour consommer l'API (RequestAPI.php::class) \n \n

o La Vue (view::folder) \n
  -> Le dossier des éléments de l'application (layout::folder) \n
    a. Le formulaire de séléction des types de devises (formTypeDevise.js::file) \n
  -> Le dossier des mises en pages (style::folder) \n
    a. Le fichier compilé permettant l'habillage de l'index (style.css::file) \n
    b. Le fichier de mappage utilisé pour convertir le fichier .scss en .css (style.css.map::file) \n
    c. Le fichier utilisé pour développer le style (style.scss::file) \n
  -> Le fichier contenant la structure de l'index (index.html::file) \n



# Déploiement

Pour déployer l'application il vous suffira de copier le dossier complet dans le dossier de votre hébergeur local vous permettant d'exécuter l'application.
Exemple : Pour WAMP le dossier se nomme www, pour XAMP htdocs, etc.

# Informations Complémentaires

Au cours de mes tests je remarqué que l'API public d'IBANFIRST bloque les requêtes lorsque l'on excède un certain quota.
Pour remédier à ce problème je stocke les devises dans la $_SESSION à la première requête envoyée.
