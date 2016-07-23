<?php
   $db = new mysqli('DB_HOST', 'USERNAME', 'PASSWORD', 'DATABASE_NAME');

    if (!$db) {
        echo 'Database connection is not found.';
    } else {
        if (isset($_POST['q'])) {
            $q = $db->real_escape_string($_POST['q']);

            if (strlen($q) > 0) {
                $query = $db->query("SELECT country FROM countries WHERE country LIKE '$q%' LIMIT 12");
                if ($query) {
                    echo '<ul>';
                    while ($result = $query->fetch_object()) {
                        echo '<li onClick="fill(\''.addslashes($result->country).'\');">'.$result->country.'</li>';
                    }
                    echo '</ul>';
                } else {
                    echo 'OOPS, There is a problem :(';
                }
            } else {
                // do nothing
            }
        } else {
            echo 'No direct access to this script!';
        }
    }
