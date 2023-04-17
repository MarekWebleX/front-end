<?php

    $form_data = parse_str( $_POST['form_data'], $form );
    $action = strval($_POST['action']);

    // add new user to cookie
        if( $action === 'add' ){

            $cookie_user_list = json_decode( $_COOKIE['user_list'], true  );

            // create new array and encode it
                array_push( $cookie_user_list, array (
                    'id' => $_COOKIE['user_in_list'],
                    'name' => $form['name'],
                    'username' => $form['username'],
                    'email' => $form['email'],
                    'address' => array(     
                        'street' => $form['street'],
                        'suite' => $form['suite'],
                        'city' => $form['city'],
                        'zipcode' => $form['zipcode'],
                        'geo' => array(
                            'lat' => $form['lat'],
                            'lng' => $form['lng']
                        )
                    ),
                    'phone' => $form['phone'],
                    'website' => $form['website'],
                    'company' => array(
                        'name' => $form['company_name'],
                        'catchPhrase' => $form['catchPhrase'],
                        'bs' => $form['bs']
                    )
                ) );

            // update user list
                setcookie( 'user_list', json_encode($cookie_user_list), time() + (86400), '/' );

            // update user list counter
                setcookie( 'user_in_list', $_COOKIE['user_in_list'] + 1, time() + (86400), '/' );

        }

    // change user in cookie
        if( $action === 'change' ){

            $cookie_user_list = json_decode( $_COOKIE['user_list'], true  );

            // update data
                $cookie_user_list[$form['id']]['name'] = $form['name'];
                $cookie_user_list[$form['id']]['username'] = $form['username'];
                $cookie_user_list[$form['id']]['email'] = $form['email'];
                $cookie_user_list[$form['id']]['address']['street'] = $form['street'];
                $cookie_user_list[$form['id']]['address']['suite'] = $form['suite'];
                $cookie_user_list[$form['id']]['address']['city'] = $form['city'];
                $cookie_user_list[$form['id']]['address']['zipcode'] = $form['zipcode'];
                $cookie_user_list[$form['id']]['address']['geo']['lat'] = $form['lat'];
                $cookie_user_list[$form['id']]['address']['geo']['lng'] = $form['lng'];
                $cookie_user_list[$form['id']]['phone'] = $form['phone'];
                $cookie_user_list[$form['id']]['website'] = $form['website'];
                $cookie_user_list[$form['id']]['company']['name'] = $form['company_name'];
                $cookie_user_list[$form['id']]['company']['catchPhrase'] = $form['catchPhrase'];
                $cookie_user_list[$form['id']]['company']['bs'] = $form['bs'];

            // update user list
                setcookie( 'user_list', json_encode($cookie_user_list), time() + (86400), '/' );
        }

    // delete user from cookie
        if( $action === 'delete' ){

            $cookie_user_list = json_decode( $_COOKIE['user_list'], true  );

            // delte user 
                unset( $cookie_user_list[$form['id']] );

            // update user list
                setcookie( 'user_list', json_encode($cookie_user_list), time() + (86400), '/' );

        }
    
