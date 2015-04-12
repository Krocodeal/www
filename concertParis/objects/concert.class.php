<?php

class Concert {

    private $_concert_id;
    private $_concert_lieu_libelle;
    private $_concert_lieu_ville;
    private $_concert_lieu_codePostal;
    private $_concert_libelle;
    private $_concert_description;
    private $_concert_prix;
    private $_concert_horaire;
    private $_concert_date;
    private $_concert_photo;

    function __construct($id, $lieu_libelle, $ville, $codePostal, $libelle, $description, $prix, $horaire, $date, $photo) {
        $this->_concert_id = $id;
        $this->_concert_lieu_libelle = $lieu_libelle;
        $this->_concert_lieu_ville = $ville;
        $this->_concert_lieu_codePostal = $codePostal;
        $this->_concert_libelle = $libelle;
        $this->_concert_description = $description;
        $this->_concert_prix = $prix;
        $this->_concert_horaire = $horaire;
        $this->_concert_date = $date;
        $this->_concert_photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getConcertId() {
        return $this->_concert_id;
    }

    /**
     * @param mixed $concert_id
     */
    public function setConcertId($concert_id) {
        $this->_concert_id = $concert_id;
    }

    /**
     * @return mixed
     */
    public function getConcertLieuLibelle() {
        return $this->_concert_lieu_libelle;
    }

    /**
     * @param mixed $concert_lieu_id
     */
    public function setConcertLieuLibelle($concert_lieu_id) {
        $this->_concert_lieu_libelle = $concert_lieu_id;
    }

    /**
     * @return mixed
     */
    public function getConcertLibelle() {
        return $this->_concert_libelle;
    }

    /**
     * @param mixed $concert_libelle
     */
    public function setConcertLibelle($concert_libelle) {
        $this->_concert_libelle = $concert_libelle;
    }

    /**
     * @return mixed
     */
    public function getConcertDescription() {
        return $this->_concert_description;
    }

    /**
     * @param mixed $concert_description
     */
    public function setConcertDescription($concert_description) {
        $this->_concert_description = $concert_description;
    }

    /**
     * @return mixed
     */
    public function getConcertPrix() {
        return $this->_concert_prix;
    }

    /**
     * @param mixed $concert_prix
     */
    public function setConcertPrix($concert_prix) {
        $this->_concert_prix = $concert_prix;
    }

    /**
     * @return mixed
     */
    public function getConcertHoraire() {
        return $this->_concert_horaire;
    }

    /**
     * @param mixed $concert_horaire
     */
    public function setConcertHoraire($concert_horaire) {
        $this->_concert_horaire = $concert_horaire;
    }

    /**
     * @return mixed
     */
    public function getConcertDate() {
        return $this->_concert_date;
    }

    /**
     * @param mixed $concert_date
     */
    public function setConcertDate($concert_date) {
        $this->_concert_date = $concert_date;
    }

    /**
     * @return mixed
     */
    public function getConcertPhoto()
    {
        return $this->_concert_photo;
    }

    /**
     * @param mixed $concert_photo
     */
    public function setConcertPhoto($concert_photo)
    {
        $this->_concert_photo = $concert_photo;
    }

    /**
     * @return mixed
     */
    public function getConcertLieuVille()
    {
        return $this->_concert_lieu_ville;
    }

    /**
     * @param mixed $concert_lieu_ville
     */
    public function setConcertLieuVille($concert_lieu_ville)
    {
        $this->_concert_lieu_ville = $concert_lieu_ville;
    }

    /**
     * @return mixed
     */
    public function getConcertLieuCodePostal()
    {
        return $this->_concert_lieu_codePostal;
    }

    /**
     * @param mixed $concert_lieu_codePostal
     */
    public function setConcertLieuCodePostal($concert_lieu_codePostal)
    {
        $this->_concert_lieu_codePostal = $concert_lieu_codePostal;
    }
}