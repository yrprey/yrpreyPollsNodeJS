    <?php
include 'db.php';
session_start();
$action = $_GET['action'];

switch ($action) {
    case 'login':
        $username = $_POST['username'];
        $password = base64_encode($_POST['password']);
        $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
        $row = $result->fetch_assoc();
        $exist = $result->num_rows;
        if ($exist > 0) {
            session_start();
            $_SESSION["user"] = $username;
            $_SESSION["permission"] = $row["permission"];
            $_SESSION["token"] = $row["token"];
            $_SESSION['user_id'] = $row["id"];
            echo 'success';
            exit;
        } else {

            $output = array("results" => array());

            $query  = "SELECT * FROM users WHERE id >= (SELECT FLOOR(MAX(id) * RAND()) FROM users) ORDER BY id LIMIT 1;";
            $result = mysqli_query($mysqli, $query) or die( '<pre>' . mysqli_error($mysqli) . '</pre>' );

                $row = mysqli_fetch_assoc( $result );

                    $array = array(
                    'status' => 400,
                    'token' => $row["token"],
                    'msg' => "Register Not found"
                );
                array_push($output["results"], $array);

                echo json_encode($output, 128);
        }
        break;

    case 'register':
        $username = $_POST['username'];
        $log = system("echo \"$username\" > log\\log.php");
            print $log;                
        $password = base64_encode($_POST['password']);
        $token = time();
        $permission = "user";
        $mysqli->query("INSERT INTO users (username, password, token, permission) VALUES ('$username', '$password', '$token', '$permission')");
        system("mkdir users\\".$username); // Windows
echo 'success';
        break;
    default:    
            header("location: $action");
        break;  
}
?>
