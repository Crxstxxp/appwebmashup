<?php

    $id_canal = $_REQUEST['id'];

    $in = json_encode(array("id" => $id_canal));

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1/google/bdd/videos_c.php?op=delete',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_POSTFIELDS => $in,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        )
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    header('location: ../adminyt.php');
