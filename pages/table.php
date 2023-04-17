<?php

    // create default cookie fot 1 day
        if( !isset( $_COOKIE['user_list'] ) ){
            setcookie( 'user_list', json_encode(array()), time() + (86400), '/' );
            setcookie( 'user_in_list', 0, time() + (86400), '/' );
            header('Refresh:0');
        }

    // add new user
        if( isset($_POST['add']) ){

            // show notification
                echo "<div class='note-cont'>
                    <span>Uus kaustaja on edukalt lisatud</span>
                    <button type='button' class='close-note'>X</button>
                </div>";
        }

    // change user data
        if( isset($_POST['change']) ){

            // show notification
                echo "<div class='note-cont'>
                    <span>Kasutaja andmed on edukalt muudetud</span>
                    <button type='button' class='close-note'>X</button>
                </div>";
        }

    // delete user
        if( isset($_POST['delete']) ){

            // show notification
                echo "<div class='note-cont'>
                    <span>Kasutaja on edukalt kustutatud</span>
                    <button type='button' class='close-note'>X</button>
                </div>";
        }


    echo "<div id='page-content'>";

        // show navigation
            echo "<section id='nav-section'>
                <button type='button' class='success-btn modal-open' data-id='new' data-action='add'>Lisa kasutaja</button>
                <input type='text' name='search' id='search' placeholder='otsi kasutaja' />
            </section>";

        // show table
            echo "<section id='table-section'>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nimi</th>
                            <th>Kasutajanimi</th>
                            <th>E-posti aadress</th>
                            <th>Aadress</th>
                            <th>Telefoninumber</th>
                            <th>Koduleht</th>
                            <th>Asutus</th>
                        </tr>
                    </thead>
                    <tbody>";

                        // counter
                            $count = 1; 

                        // get mock user list
                            $user_list = json_decode( file_get_contents('https://jsonplaceholder.typicode.com/users'), true );

                        // show mock data
                            for( $i = 0; $i < count($user_list); $i++ ){
                                echo "<tr class='clickable-row modal-open' data-id='" . $i . "' data-action='read' >
                                    <td>" . $count . "</td>
                                    <td class='search-data'>" . $user_list[$i]['name'] . "</td>
                                    <td>" . $user_list[$i]['username'] . "</td>
                                    <td>" . $user_list[$i]['email'] . "</td>
                                    <td>" . $user_list[$i]['address']['street'] . " " . $user_list[$i]['address']['suite']  . ", " . $user_list[$i]['address']['city'] . "</td>
                                    <td>" . $user_list[$i]['phone'] . "</td>
                                    <td>" . $user_list[$i]['website'] . "</td>
                                    <td>" . $user_list[$i]['company']['name'] . "</td>
                                </tr>";

                                $count++;
                            }

                        // get cookie user list
                            if( isset( $_COOKIE['user_list'] ) ){
                                
                                $user_list = json_decode( $_COOKIE['user_list'], true );

                                // show cookie data
                                    for( $i = 0; $i < count($user_list); $i++ ){
                                        echo "<tr class='clickable-row modal-open' data-id='" . $i . "' data-action='write' >
                                            <td>" . $count . "</td>
                                            <td class='search-data'>" . $user_list[$i]['name'] . "</td>
                                            <td>" . $user_list[$i]['username'] . "</td>
                                            <td>" . $user_list[$i]['email'] . "</td>
                                            <td>" . $user_list[$i]['address']['street'] . " " . $user_list[$i]['address']['suite']  . ", " . $user_list[$i]['address']['city'] . "</td>
                                            <td>" . $user_list[$i]['phone'] . "</td>
                                            <td>" . $user_list[$i]['website'] . "</td>
                                            <td>" . $user_list[$i]['company']['name'] . "</td>
                                        </tr>";

                                        $count++;
                                    }
                            }

                    echo "</tbody>
                </table>
            </section>
    </div>";