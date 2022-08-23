<?php

function save_inputs()
{
    foreach ($_POST as $key => $value) {
        if (in_array($key, ['password'])) {
            continue;
        }
        //Initialisation pour évité le bug de tableau vide si jamais ca arrive (lol)
        $_SESSION['previous_inputs'] =  $_SESSION['previous_inputs'] ?? [];
        $_SESSION['previous_inputs'][$key] = $value;
    }
}

function get_previous_inputs()
{
    static $previous_inputs;
    if($previous_inputs){
        return $previous_inputs;
    }
    $previous_inputs = $_SESSION['previous_inputs'] ?? [];
    $_SESSION['previous_inputs']=[];
    return $previous_inputs;
}

?>
