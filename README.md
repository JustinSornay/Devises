# Utilisation

L'application est constituée de l'arborescence suivante :

o Les Sources (src::folder)
  -> Le dossier des controllers (Controller::folder)
    a. Le controller (DevisesHistoryController.php::class)
    
  -> Le dossier de gestion de l'API (IbanFirstAPI::folder)
    a. Le dossier des items récupérés (Items::folder)
      - Les devises (Devise.php::class)
      - Le gestionnaire des devises (DeviseManager.php::class)
    b. Le dossier des outils (Tools::folder)
      - La class utilisé pour consommer l'API (RequestAPI.php::class)

o La Vue (view::folder)
  -> Le dossier des éléments de l'application (layout::folder)
    a. Le formulaire de séléction des types de devises (formTypeDevise.js::file)
  -> Le dossier des mises en pages (style::folder)
    a. Le fichier compilé permettant l'habillage de l'index (style.css::file)
    b. Le fichier de mappage utilisé pour convertir le fichier .scss en .css (style.css.map::file)
    c. Le fichier utilisé pour développer le style (style.scss::file)
  -> Le fichier contenant la structure de l'index (index.html::file)



# Déploiement

Pour déployer l'application il vous suffira de copier le dossier complet dans le dossier de votre hébergeur local vous permettant d'exécuter l'application.
Exemple : Pour WAMP le dossier se nomme www, pour XAMP htdocs, etc.

# Informations Complémentaires

Au cours de mes tests je remarqué que l'API public d'IBANFIRST bloque les requêtes lorsque l'on excède un certain quota.
Pour remédier à ce problème je stocke les devises dans la $_SESSION à la première requête envoyée.
