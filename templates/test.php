<?php

$pass=password_hash("imperious@21#Tours", PASSWORD_BCRYPT);
echo $pass.'<br/>';

if (password_verify('imperious@21#Tours', $pass)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>