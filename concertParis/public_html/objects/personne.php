<?php

class Personne {

    private $_personne_id;
    private $_personne_pseudo;
    private $_personne_nom;
    private $_personne_typeuser;
    private $_personne_photo;
    private $_personne_mail;
    private $_personne_tel;

    function __construct($id, $pseudo, $nom, $typeuser, $photo, $mail, $tel) {
        $this->_personne_id = $id;
        $this->_personne_pseudo = $pseudo;
        $this->_personne_nom = $nom;
        $this->_personne_typeuser = $typeuser;
        $this->_personne_photo = $photo;
        $this->_personne_mail = $mail;
        $this->_personne_tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getPersonneId() {
        return $this->_personne_id;
    }

    /**
     * @param mixed $personne_id
     */
    public function setPersonneId($personne_id) {
        $this->_personne_id = $personne_id;
    }

    /**
     * @return mixed
     */
    public function getPersonnePseudo() {
        return $this->_personne_pseudo;
    }

    /**
     * @param mixed $personne_pseudo
     */
    public function setPersonnePseudo($personne_pseudo) {
        $this->_personne_pseudo = $personne_pseudo;
    }

    /**
     * @return mixed
     */
    public function getPersonneNom() {
        return $this->_personne_nom;
    }

    /**
     * @param mixed $personne_nom
     */
    public function setPersonneNom($personne_nom) {
        $this->_personne_nom = $personne_nom;
    }

       /**
     * @return mixed
     */
    public function getPersonneTypeUser() {
        return $this->_personne_typeuser;
    }

    /**
     * @param mixed $personne_typeuser
     */
    public function setPersonneTypeUser($personne_typeuser) {
        $this->_personne_typeuser = $personne_typeuser;
    }

    /**
     * @return mixed
     */
    public function getPersonnePhoto() {
        return $this->_personne_photo;
    }

    /**
     * @param mixed $personne_photo
     */
    public function setPersonnePhoto($personne_photo) {
        $this->_personne_photo = $personne_photo;
    }

    /**
     * @return mixed
     */
    public function getPersonneMail() {
        return $this->_personne_mail;
    }

    /**
     * @param mixed $personne_mail
     */
    public function setPersonneMail($personne_mail) {
        $this->_personne_mail = $personne_mail;
    }

    /**
     * @return mixed
     */
    public function getPersonneTel() {
        return $this->_personne_tel;
    }

    /**
     * @param mixed $personne_tel
     */
    public function setPersonneTel($personne_tel) {
        $this->_personne_tel = $personne_tel;
    }


}