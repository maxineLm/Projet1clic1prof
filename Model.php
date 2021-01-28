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
	    //include "/home/student/Auth/credentials.php";
        $this->bd = new PDO('mysql:host=localhost;dbname=1clic1prof', 'root', '');
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET nameS 'utf8'");
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
     */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retourne les professeurs enseignant la matière $matiere au niveau d'étude $niveau
     * @return [array] Contient la liste des couples [nom, prénom] des professeurs
     */
    public function rechercherProfesseur($matiere, $niveau)
    {
        $req = $this->bd->prepare('SELECT * FROM utilisateur, (SELECT professeur_id FROM enseignement WHERE matiere_id = (SELECT matiere_id FROM type_matiere WHERE :matiere = nom_matiere)) AS a WHERE a.professeur_id = professeur.user_id AND :niveau = utilisateur.usr_niveauEtude');
		$req->bindValue(':matiere', $matiere);
		$req->bindValue(':niveau', $niveau);
        $req->execute();
        return $req->fetchall();
    }
	
	/**
     * Retourne toute les matières disponibles
     * @return [array] Contient la liste des noms des matières
     */
	public function retournerMatieresDisponibles() {
		$req = $this->bd->prepare('SELECT nom_matiere FROM type_matiere');
        $req->execute();
        return $req->fetchall();
	}
}
