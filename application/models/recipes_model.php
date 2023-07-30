<?php
class recipes_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }



        public function get_recipes($id = FALSE)
        {
                if ($id === FALSE)
                {
                        $query = $this->db->get('recipes');
                        
                        
                        return $query->result_array();
                }
        
                $query = $this->db->get_where('recipes', array('ID' => $id));
                return $query->row_array();
        }
        public function get_full_recipe($id = FALSE)
        {
                $sql="SELECT ingredients.name
                FROM ingredients
                INNER JOIN amount ON ingredients.ID = amount.ingredient_ID 
                WHERE recipe_ID = ?";
                //$this->db->query($sql,array($id));
                //return $query->result_array();
                $query = $this->db->get_where('recipes', array('ID' => $id));
                return $query->result_array();
        }

}