<?php

// --+ Importation
define("__ROOT__", dirname(dirname(__FILE__)));
require_once(__ROOT__."/src/Controller/DevisesHistoryController.php");

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript" src="layout/formTypeDevise.js" defer></script>
        <link rel="stylesheet" href="style/style.css">

        <title>Devises infos</title>
    </head>
    <body>
        <!-- Entête -->
        <header>
            <nav>
                <ol>
                    <ul>
                        <li>Historique des devises sur :</li>
                    </ul>
                </ol>
                <ol>
                    <ul>
                        <li>1 mois</li>
                        <li>3 mois</li>
                    </ul>
                </ol>
                <ol class="choice-list">
                    <form id="form-type-devise" action="#" method="POST">
                        <ul>
                            <li><label for="EURCHF1">EUR - CHF</label><input type="radio" id="EURCHF1" name="type-devise" value="EURCHF;1"></input></li>
                            <li><label for="EURGBP1">EUR - GBP</label><input type="radio" id="EURGBP1" name="type-devise" value="EURGBP;1"></input></li>
                            <li><label for="EURUSD1">EUR - USD</label><input type="radio" id="EURUSD1" name="type-devise" value="EURUSD;1"></input></li>
                        </ul>
                        <ul>
                            <li><label for="USDCHF1">USD - CHF</label><input type="radio" id="USDCHF1" name="type-devise" value="USDCHF;1"></input></li>
                            <li><label for="USDEUR1">USD - EUR</label><input type="radio" id="USDEUR1" name="type-devise" value="USDEUR;1"></input></li>
                            <li><label for="USDGBP1">USD - GBP</label><input type="radio" id="USDGBP1" name="type-devise" value="USDGBP;1"></input></li>
                        </ul>
                        <ul>
                            <li><label for="EURCHF3">EUR - CHF</label><input type="radio" id="EURCHF3" name="type-devise" value="EURCHF;3"></input></li>
                            <li><label for="EURGBP3">EUR - GBP</label><input type="radio" id="EURGBP3" name="type-devise" value="EURGBP;3"></input></li>
                            <li><label for="EURUSD3">EUR - USD</label><input type="radio" id="EURUSD3" name="type-devise" value="EURUSD;3"></input></li>
                        </ul>
                        <ul>
                            <li><label for="USDCHF3">USD - CHF</label><input type="radio" id="USDCHF3" name="type-devise" value="USDCHF;3"></input></li>
                            <li><label for="USDEUR3">USD - EUR</label><input type="radio" id="USDEUR3" name="type-devise" value="USDEUR;3"></input></li>
                            <li><label for="USDGBP3">USD - GBP</label><input type="radio" id="USDGBP3" name="type-devise" value="USDGBP;3"></input></li>
                        </ul>
                    </form>
                </ol>
            </nav>
        </header>

        <!-- Corps -->
        <main>
            <section>
                <h1>OWLNEXT</h1>
                <div class="devises-container">
                    <?php

                    if (isset($_POST["type-devise"])) {
                        $devisesHistoryController = DevisesHistoryController::getInstance();
                        $devisesHistoryController::generateAllDevises();
                        
                        $listValue       = explode(';', $_POST["type-devise"]);
                        $typeDevise      = $listValue[0];
                        $historyDuration = $listValue[1];

                        switch ($historyDuration) {
                            case '1':
                                $listDevise = $devisesHistoryController::getDevisesLastMonth($typeDevise);
                            break;
                            case '3':
                                $listDevise = $devisesHistoryController::getDevisesLast3Month($typeDevise);
                            break;
                            default:
                                $listDevise = array();
                            break;
                        }

                        echo "
                            <p class='desc'>".substr($typeDevise, 0, 3)." - ".substr($typeDevise, 2, 3)."</p>

                            <table>
                                <tr>
                                    <th>Taux</th>
                                    <th>Date</th>
                                </tr>
                        ";

                        foreach ($listDevise as $key => $devise) {
                            echo "
                                <tr>
                                    <td>".$devise->getRate()."</td>
                                    <td>".$devise->getDate()->format('d/m/Y h:m:s')."</td>
                                </tr>
                            ";
                        }

                        echo "
                            </table>
                        ";

                        }
                    ?>
                </div>
            </section>
        </main>

        <!-- Pied de page -->
        <footer>
        </footer>
    </body>
</html>