<?php

class Panier {

    private $_panier_liste_concert;
    private $_panier_taille;
    private $_panier_total;

    function __construct() {
        $this->_panier_taille = 0;
        $this->_panier_total = 0;
    }
    
    /**
     * @return mixed
     */
    public function getPanierListeConcert() {
        return $this->_panier_liste_concert;
    }

    public function getConcertID($concert) {
        $concertID = -1;
        foreach ($this->_panier_liste_concert  as $id =>$element) {
            if($element == $concert){
                $concertID = $id;
            }
        }
        return $concertID;
    }

    /**
     * @param mixed $panier_liste_concert
     */
    public function setPanierListeConcert($panier_liste_concert) {
        $this->_panier_liste_concert = $panier_liste_concert;
    }

    public function addPanier($produit) {
        $this->_panier_liste_concert[$this->_panier_taille] = $produit;
        $this->_panier_taille++;
    }

    public function removePanierByConcertID($id){
        foreach ($this->_panier_liste_concert  as &$element) {
            if($element->getConcertId() == $id) {
                unset($this->_panier_liste_concert[$element]);
                $this->_panier_taille--;
            }
        }
    }

    /**
     * @return int
     */
    public function getPanierTaille()
    {
        return $this->_panier_taille;
    }

    /**
     * @param int $panier_taille
     */
    public function setPanierTaille($panier_taille)
    {
        $this->_panier_taille = $panier_taille;
    }

    /**
     * @return int
     */
    public function getPanierTotal()
    {
        return $this->_panier_total;
    }

    /**
     * @param int $panier_total
     */
    public function setPanierTotal($panier_total)
    {
        $this->_panier_total = $panier_total;
    }


}