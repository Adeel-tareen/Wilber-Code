<?php


$people = file_get_contents("data.json");
/**
 * Instructions:
 *
 * Given the above JSON, build a simple PHP script to import it.
 *
 * Your script should create two variables:
 *
 * - a comma-separated list of email addresses
 * - the original data, sorted by age descending, with a new field on each record
 *   called "name" which is the first and last name joined.
 *
 * Please deliver your code in either a GitHub Gist or some other sort of web-hosted code snippet platform.
 */
    $personarray = json_decode(preg_replace('/,\s*([\]}])/m', '$1', $people), true);

    $email = [];

    foreach ($personarray as $info) {
        foreach ($info as $person) {
            $person['name'] = $person['first_name']." ".$person['last_name'];
            $personArray[] =  $person;
            $email[] = $person['email'];
        }
    }


    // comma-separated list of $email.
    $email  = implode(',', $email);

    // $personarray by age DESC
    usort(
        $personarray['data'],
        function($age1, $age2) {
            return $age2['age'] - $age1['age'];
        }
    );
       
    //OUTPUT
        
    echo "<pre>";
    //OUTPUT FOR EMAILS
    print_r($email);
    echo "</pre>";

    echo "<pre>";
    //OUTPUT FOR Name
    print_r($personArray);
    echo "</pre>";

    echo "<pre>";
    //OUTPUT FOR DESC
    print_r(json_encode($personarray));
    echo "</pre>";

?>