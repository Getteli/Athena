<?php
// -------------------------------------------------------- conexao criada pela gente --------------------------------------------------------

$con = mysqli_connect("localhost","troiatec","&J^5k*ZPU(HN","troiatec_athenabdcastelinho");

mysqli_set_charset($con,"utf8");

  // Checar conexao
  if(mysqli_connect_error()){
  
  echo "Falha ao se conectar ao Banco de Dados MySQL: " . mysqli_connect_error();
  
  }
  
// -------------------------------------------------------- conexao criada pela gente --------------------------------------------------------

// --------------------------------------------------------- conexao firebase e key ----------------------------------------------------------
//config
define('DB_USERNAME', 'troiatec');
define('DB_PASSWORD', '&J^5k*ZPU(HN');
define('DB_HOST', 'localhost');
define('DB_NAME', 'troiatec_athenabdcastelinho');


define('teste','AAAAk7SIggI:APA91bFUtyM_DmfaO3eXJ6KLduZnaIYHTGobEpKLjtfBVsTzbFMCasN3JqAGsvQNjUdo2zm5pPj-f5UVUq4bjJfQfqlEQrYSuG0l-49GHHgjsxK0qwSacmUfjWSHLq_DUanz32NWkICX' );

// --------------------------------------------------------- conexao firebase e key ----------------------------------------------------------

// --------------------------------------------------------- conexao nao sei ----------------------------------------------------------
//dbconnect
class DbConnect{

    //Variable to store database link
    private $con;
 
    //Class constructor
    function __construct()
    {
 
    }
 
    //This method will connect to the database
    function connect()
    {
        //Including the constants.php file to get the database constants
 
        //connecting to mysql database
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        //Checking if any error occured while connecting
        if (mysqli_connect_errno()) {
            echo "Falha ao se conectar no MySQL: " . mysqli_connect_error();
        }
 
        //finally returning the connection link 
        return $this->con;
    }
 
}
// --------------------------------------------------------- conexao nao sei ----------------------------------------------------------

?>