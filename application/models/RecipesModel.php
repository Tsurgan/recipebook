<?php
class RecipesModel extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

//GET

        public function get_all_recipes()
        {
                $query = $this->db->get('recipes');
                return $query->result_array();
        }
        public function get_recipe_by_ID($id)
        {
               
                $query = $this->db->get_where('recipes', array('ID' => $id));


                return $query->row_array();
        }
        public function get_recipe_ingredients_by_ID($id)
        {
               

                $query=$this->db->get_where('amounts', array('recipe_ID'=>$id));

                return $query->result_array();
        }

        public function get_all_ingredients()
        {
                $query = $this->db->get('ingredients');
                return $query->result_array();
        }

        public function get_ingredient_by_ID($id)
        {
               
                $query = $this->db->get_where('ingredients', array('ID' => $id));


                return $query->row_array();
        }

        public function check_measure_ID($id)
        {
                $query = $this->db->get_where('measure', array('ID' => $id));
                return $query->row_array();
        }

//POST
        public function insert_ingredient($name, $measure_ID)
        {
                $data = array(
                        'name' => $name,
                        'measure_ID' => $measure_ID,
                );
                $this->db->insert('ingredients',$data); 
                return true;
        }

//DELETE
        public function delete_ingredient($id)
        {

                $this->db->delete('ingredients', array('ID' => $id));
                return true;
        }
}