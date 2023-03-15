<?php 
include("send_post.php");
require('vendor/autoload.php');
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');
?>
<html>

<body>
    <header>
        <?php 
            $components=explode(",",$_ENV['test']);
            foreach($components as $component) {
                include_once("components/".$component.".php");
            }
            
        ?>
    </header>
    <form action="/" method="post">
        <input type="checkbox" id="vehicle1" name="active[]" value="Poland">
        <label for="vehicle1">Poland</label><br>
        <input type="checkbox" id="vehicle2" name="active[]" value="Germany">
        <label for="vehicle2">Germany</label><br>
        <input type="checkbox" id="vehicle3" name="active[]" value="China">
        <label for="vehicle3">China</label><br>
        <input type="submit" value="submit">
    </form>
    <?php 
    if (isset($_POST['active'])) {
        send_request($_POST['active']);
    }
    ?>
</body>

</html>