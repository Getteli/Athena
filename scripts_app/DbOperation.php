<?php

class DbOperation
{
    //Database connection link
    private $con, $stmt, $nCols, $colsNames;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/conexao.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    //storing token in database 
    public function registerDevice($email,$senha,$turma,$token,$ref,$ativo){
        if(!$this->isEmailExist($email)){
        $stmt = $this->con->prepare("INSERT INTO login (email_login,matricula_alu,turma_alu,token,ref,ativo_l) VALUE (?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$email,$senha,$turma,$token,$ref,$ativo); 
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //return 1 means failure
        }else{
            return 2; //returning 2 means email already exist
        }
    }
    
        public function registerDevice2($email,$senha,$token,$ref){
        if(!$this->isEmailExist($token)){
            $stmt = $this->con->prepare("INSERT INTO login (email_login,matricula_alu ,token,ref) VALUES (?,?,?,?) ");
            $stmt->bind_param("ssss",$email,$senha,$token,$ref);
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //return 1 means failure
        }else{
            return 2; //returning 2 means email already exist
        }
    }
      
    //the method will check if email already exist 
    private function isEmailexist($token){
        $stmt = $this->con->prepare("SELECT id_login FROM login WHERE token= ?");
        $stmt->bind_param("s",$email_login);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        
        return $num_rows > 0;
    }
       
	public function getAllTokens($ref){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE ref=?");
		$stmt->bind_param("s",$ref);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}   
	
	
	
		public function getAllTokensf($valor){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE ativo_l=?");
		$stmt->bind_param("s",$valor);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}  
	
	
	
	
	//GET TOKEN PARA ATUALIZAÇÃO, envia uma notificação de que há uma nova atualização.
	public function getAllTokensup(){
		$stmt = $this->con->prepare("SELECT token FROM login");
		$stmt->bind_param();
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}   
    

	public function getTokenByEmail($email1,$email2,$email3){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE email_login=? or email_login=? or email_login=?");
		$stmt->bind_param("sss",$email1,$email2,$email3);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}
	
		public function getTokenByEmaila($aluno){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE matricula_alu=?");
		$stmt->bind_param("s",$aluno);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}
	
	
	
	public function getTokenByEmailP($senha){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE matricula_alu=?");
		$stmt->bind_param("s",$senha);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}
	
	public function getAllTokensT($turmaagenda){
		$stmt = $this->con->prepare("SELECT token FROM login WHERE turma_alu= ?");
		$stmt->bind_param("s",$turmaagenda);
		$stmt->execute(); 
		$result = $stmt->bind_result($token);
		$tokens = array(); 
		while($teste = $stmt->fetch()){
			$teste =  $token;
			array_push($tokens, $teste);
		}
		return $tokens; 

	}   

}
