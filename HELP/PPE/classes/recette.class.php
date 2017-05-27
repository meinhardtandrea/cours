<?php
class Ingredient{
        private $ing_id, $ing_nom;
        
        public function __construct($var = []){
            if(!empty($var)){
            $this->ing_nom = $var;
            }
        }
        
        public function listeRec(){
        
        }
}

class ingredientPDO extends Ingredient
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }

  protected function add(Ingredient $ingredient)
  {
    $requete = $this->db->prepare('INSERT INTO ingredient(ing_nom) VALUES(:ing_nom)');
    $requete->bindValue(':ing_nom', $ingredient->ing_nom());
    $requete->execute();
  }
  
  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM ingredient')->fetchColumn();
  }
  
  public function delete($ing_id)
  {
    $this->db->exec('DELETE FROM ingredient WHERE ing_id = '.(int) $ing_id);
  }
  
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT ing_id, ing_nom FROM ingredient ORDER BY ing_id DESC';

    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->db->query($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Ingredient');
    $listeRec = $requete->fetchAll();
    $requete->closeCursor();
    
    return $listeRec;
  }

  public function getUnique($ing_id)
  {
    $requete = $this->db->prepare('SELECT ing_id, ing_nom FROM ingredient WHERE ing_id = :ing_id');
    $requete->bindValue(':ing_id', (int) $ing_id, PDO::PARAM_INT);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Ingredient');
    $ingredient = $requete->fetch();
    
    return $ingredient;
  }

  protected function update(Ingredient $ingredient)
  {
    $requete = $this->db->prepare('UPDATE ingredient SET ing_nom = :ing_nom WHERE ing_id = :ing_id');
    $requete->bindValue(':ing_nom', $ingredient->ing_nom());
    $requete->bindValue(':ing_id', $ingredient->ing_id(), PDO::PARAM_INT);
    $requete->execute();
  }
}
?>