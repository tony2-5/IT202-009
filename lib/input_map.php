<?php

function input_map($fieldType)
{
    if (str_contains($fieldType, "varchar")) {//needed since varchars have a size
        return "text";
    } else if(str_contains($fieldType, "tinyint")) {
        return "checkbox";
    } 
    else if ($fieldType === "text") {
        return "textarea";
    } else if (in_array($fieldType, ["int", "bigint"])) { //TODO fill in as needed
        return "number";
    } else {
        return "text"; //default
    }
}