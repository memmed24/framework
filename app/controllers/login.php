<?phpclass login extends baseController {    private $admin;    private $user;    public function __construct()    {        $this->admin = $this->model('adminm');        $this->user = $this->model('usermodel');    }    public function index(){        if(isset($_POST['login'])){            $info = array();            $email = $_POST['email'];            $pass = md5('youcanthackbitch'.md5($_POST['password']));            $admin = $this->admin->findAdmin('admin', $email);            if($admin){                foreach($admin as $admins){                    $info = $admins;                }                if($info['email'] == $email && $info['password'] == $pass){                    session_start();                    $id = $info['id'];                    $this->admin->updateAdmin('admin', $id, array(                        'token' => $_POST['token']                    ));                    $_SESSION['Token'] = $_POST['token'];                    $_SESSION['Email'] = $email;                    header('Location: http://localhost/own_framework/admin/');                }else{                    $this->view('login');                }            }else{                $this->view('login');            }        }        else{            $this->view('login');        }    }}