

<?php

        require APPPATH . 'libraries/Format.php';
        defined('BASEPATH') OR exit('No direct script access allowed');
        require(APPPATH.'libraries\REST_Controller.php');
        use Restserver\Libraries\REST_Controller;
        use chriskacerguis\RestServer\RestController;
	class Demo extends RestController{


        public function __construct()
        {
                parent::__construct();
                $this->load->model('RecipesModel');
        }


// GET
       
        public function list_recipe_get()
        {
                $data = $this->RecipesModel->get_all_recipes();
                $this->response($data); 
        }


        public function full_recipe_get($id)
        {
            $data = $this->RecipesModel->get_recipe_by_ID($id);
            if ($data)
            {
                $data=json_encode($data);
                $this->response($data);
            }
            else
            {
                $this->response(['status'=> 404, 'message' => 'Нет такого ID']);
            
            
             }
        }


        public function ingredients_recipe_get($id)
        {
                $data = $this->RecipesModel->get_recipe_ingredients_by_ID($id);
                $this->response($data);

                if ($data)
                {
                    $this->response($data);
                }
                else
                {
                    $this->response(['status'=> 404, 'message' => 'Нет такого ID']);
                
                
                 }
        }


        public function list_ingredients_get()
        {
                $data = $this->RecipesModel->get_all_ingredients();
                $this->response($data); 
        }

        public function full_ingredients_get($id)
        {
            $data = $this->RecipesModel->get_ingredient_by_ID($id);
            $this->response($data);

            if ($data)
            {
                $this->response($data);
            }
            else
            {
                $this->response(['status'=> 404, 'message' => 'Нет такого ID']);
            
            
             }
        }

//POST
        public function ingredient_add_post()
        {
                $name = $this->post('name');
                $measure_ID = $this->post('measure_ID');

                if(!empty($name) && !empty($measure_ID) && is_numeric($measure_ID))
                { 
                        //проверить, есть ли измерение в базе данных
                        $measure_check=$this->RecipesModel->check_measure_ID($measure_ID);
                        if($measure_check)
                        {
                                $insert=$this->RecipesModel->insert_ingredient($name,$measure_ID);
                                if($insert)
                                {
                                        $this->response([ 
                                                'status' => TRUE, 
                                                'message' => 'Успешно добавлен ингредиент' 
                                            ]); 
                                }
                                else 
                                {
                                        $this->response(['status'=> FALSE, 'message' => 'Что-то пошло не так']);
                                }
        
                        }
                        else
                        {
                                $this->response(['status'=> FALSE, 'message' => 'Неизвестная мера']);
                        }
                }     
                else
                {
                        $this->response(['status'=> FALSE, 'message' => 'Недостаточно информации']);
                }
                
        }

//DELETE
public function ingredient_del_delete($id)
        {

                if(!empty($id) && is_numeric($id))
                { 
                        
                     
                                $delete=$this->RecipesModel->delete_ingredient($id);
                                if($delete)
                                {
                                        $this->response([ 
                                                'status' => TRUE, 
                                                'message' => 'Успешно удален ингредиент' 
                                            ]); 
                                }
                                else 
                                {
                                        $this->response(['status'=> FALSE, 'message' => 'Что-то пошло не так']);
                                }
        
                        
                }     
                else
                {
                        $this->response(['status'=> FALSE, 'message' => 'Недостаточно информации']);
                }
                
        }
    
}
?>
