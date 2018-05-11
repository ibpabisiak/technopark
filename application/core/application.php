 <?php

class Application {
    private $url_controller = null;
    private $url_page = null;
	private $url_params = array();

    public function __construct() {
        $this->splitUrl();
		
		if($this->url_controller == null) {
			$homepage = new Homepage();
			$homepage->index();
		} elseif (file_exists('./application/controller/'.$this->url_controller.'.php') 
					/*&& !Functions::IsLogged()*/) {

            require_once './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

			//pages
            if (method_exists($this->url_controller, $this->url_page)) {
                    $this->url_controller->{$this->url_page}();
            } else {
                $this->url_controller->index();
            }
			
        } else {
			
			//TODO strona ktora nie istnieje
			echo "Ta strona nie istnieje lub nie masz do niej uprawnień.";
        }
    }

    private function splitUrl() {
        if (isset($_GET['module'])) {
			$this->url_controller = $_GET['module'];
        } 
		
		if(isset($_GET['page'])) {
			$this->url_page = $_GET['page'];
		}
    }
}


