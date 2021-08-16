
<?php
$db = mysqli_connect('localhost', 'bld', '20433402') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'bld' ) or die(mysqli_error($db));
?>