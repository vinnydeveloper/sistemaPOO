<?php
require_once "model/Pessoas.php";
require_once "model/Usuarios.php";
require_once "model/conexao.php";
require_once "model/Funcionarios.php";
class LoginController{


    public function view($server){
            global $con;
        switch($server){
            case "GET":
                require_once "view/login.php";
                break;
            case "POST":  
                $usuario = $_POST['usuario'];
                $senha = $_POST['senha'];
                
                $query = $con->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
                $query->execute(["usuario" => $usuario]);
                //
                $result = $query->fetch(PDO::FETCH_ASSOC);
                
                if(count($result) <=0){
                    echo "Usuario ou senha incorreta verifique e tente novamente";
                    exit;
                }else {

                    if(password_verify($senha,$result['senha'])){
                        
                        if($result['tipo_pessoa'] == "usuario"){
                            $pessoa = new Usuarios(
                                $result['nome'],
                                $result['idade'],
                                $result['cpf'],
                                $result['usuario'],
                                $result['senha']
                            );
                            
                        }elseif ($result['tipo_pessoa'] == "funcionario"){
                            $pessoa = new Funcionarios(
                                $result['nome'],
                                $result['idade'],
                                $result['cpf'],
                                $result['usuario'],
                                $result['senha'],
                                $result['salario']
                            );
                        }

                        $_REQUEST['pessoa'] = $pessoa;
                        require_once "view/sucesso.php";
                    }else {
                        echo "Usuario ou senha incorreta verifique e tente novamente";
                        exit;
                    }

                }
                
                break;  
        }
        
    }

}

?>