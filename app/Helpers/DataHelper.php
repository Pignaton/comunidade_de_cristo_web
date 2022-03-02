<?php

function convertDataBR($data){
    return date('d/m/Y', strtotime($data));
}
