<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<?php
	class Demo extends CI_Controller {


        public function __construct()
        {
                parent::__construct();
                $this->load->model('recipes_model');
        }

        public function index()
        {
                $data['recipes'] = $this->recipes_model->get_recipes();
                $data['title'] = 'recipes_list';
                $this->load->view('recipes_list', $data);
        }

        public function view($demo='demo',$recipes_list='recipes_list', $id = NULL)
        {
                //$data['title'] = ucfirst($recipes_list);
                
                //$data['recipes'] = $this->recipes_model->get_recipes();
                //$data['recipe_item'] = $this->recipes_model->get_recipes($id);
                //$this->load->view($recipes_list, $data);
                $data['title'] = ucfirst('Демонстрация API');
                $this->load->view($demo, $data);
        }

       

        public function list_view($recipes_list='recipes_list', $id = NULL)
        {
                $data['title'] = ucfirst($recipes_list);
                
                $data['recipes'] = $this->recipes_model->get_recipes();
                $data['recipe_item'] = $this->recipes_model->get_recipes($id);
                $this->load->view($recipes_list, $data);
        }

        public function full_view($recipe_view='recipe_view', $id = NULL){
            $data['title'] = ucfirst($recipe_view);
            $data['recipe_item'] = $this->recipes_model->get_full_recipe($id);
            $this->load->view($recipe_view, $data);
        }
    
}
?>
