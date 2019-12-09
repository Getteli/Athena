<?php

// -------------------------------------------------------- conexão criada pela gente --------------------------------------------------------
$dbcon = mysqli_connect("localhost","troiatec","&J^5k*ZPU(HN","troiatec_athenabdcastelinho");
if($dbcon->connect_error) {
echo "conexao_erro";
} /*else {
echo "conexao_ok";
}*/

define('teste','AAAAk7SIggI:APA91bFUtyM_DmfaO3eXJ6KLduZnaIYHTGobEpKLjtfBVsTzbFMCasN3JqAGsvQNjUdo2zm5pPj-f5UVUq4bjJfQfqlEQrYSuG0l-49GHHgjsxK0qwSacmUfjWSHLq_DUanz32NWkICX' );

// -------------------------------------------------------- conexão criada pela gente --------------------------------------------------------

// ---------------------------------------- conexão feita pelo firebase com key do firebase --------------------------------------------------

define('DB_USERNAME', 'troiatec');
define('DB_PASSWORD', '&J^5k*ZPU(HN');
define('DB_HOST', 'localhost');
define('DB_NAME', 'troiatec_athenabdcastelinho');


define('teste','AAAAk7SIggI:APA91bFUtyM_DmfaO3eXJ6KLduZnaIYHTGobEpKLjtfBVsTzbFMCasN3JqAGsvQNjUdo2zm5pPj-f5UVUq4bjJfQfqlEQrYSuG0l-49GHHgjsxK0qwSacmUfjWSHLq_DUanz32NWkICX' );

// ---------------------------------------- conexão feita pelo firebase com key do firebase --------------------------------------------------

// -------------------------------------------------------- conexão nao sei da onde ----------------------------------------------------------

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

// -------------------------------------------------------- conexão nao sei da onde ----------------------------------------------------------
?>