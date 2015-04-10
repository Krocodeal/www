<?php

class Concert {

    private $_concert_id;
    private $_concert_lieu_id;
    private $_concert_libelle;
    private $_concert_description;
    private $_concert_prix;
    private $_concert_horaire;
    private $_concert_date;

    function __construct($id, $lieu_id, $libelle, $description, $prix, $horaire, $date) {
        $this->_concert_id = $id;
        $this->_concert_lieu_id = $lieu_id;
        $this->_concert_libelle = $libelle;
        $this->_concert_description = $description;
        $this->_concert_prix = $prix;
        $this->_concert_horaire = $horaire;
        $this->_concert_date = $date;
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
    public function getConcertLieuId() {
        return $this->_concert_lieu_id;
    }

    /**
     * @param mixed $concert_lieu_id
     */
    public function setConcertLieuId($concert_lieu_id) {
        $this->_concert_lieu_id = $concert_lieu_id;
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
}