<?php

class Model
{


    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;


    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;


    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    private function __construct()
    {

        try {
            include 'Utils/credentials.php';
            $this->bd = new PDO($dsn, $login, $mdp);
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bd->query("SET nameS 'utf8'");
        } catch (PDOException $e) {
            die('Echec connexion, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }


    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {

        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }


    public static function addLogin($infos)
    {
        $m = Model::getModel();
        try { 
            //Préparation de la requête
            $requete = $m->bd->prepare('INSERT INTO user (login, mdp) VALUES (:login, :mdp)');
            //Remplacement des marqueurs de place par les valeurs
            $marqueurs = ['login', 'mdp'];
            foreach ($marqueurs as $value) {
                $requete->bindValue(':' . $value, $infos[$value]);
            }
            //Exécution de la requête
            return $requete->execute();
        } catch (PDOException $e) {
            die('Echec addLogin, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

    public function getLogin()
    {

        try {
            $requete = $this->bd->prepare('SELECT login FROM user');
            $requete->execute();
            $reponse = [];
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                $reponse[] = $ligne['login'];
            }
            return $reponse;
        } catch (PDOException $e) {
            die('Echec getLogin, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

    public function getNbLogin()
    {
        try {
            $requete = $this->bd->prepare('SELECT count(*) FROM user');
            $requete->execute();
            return $requete->fetch(PDO::FETCH_NUM);
        } catch (PDOException $e) {
            die('Echec getNbLogin, erreur n°' . $e->getCode() . ':' . $e->getMessage());
        }
    }

}
