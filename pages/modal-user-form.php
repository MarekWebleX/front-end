<?php
    $id = strval($_POST['id']);
    $action = strval($_POST['action']);

    // get user info
        if( $action === 'read' ){
            $user_list = json_decode( file_get_contents('https://jsonplaceholder.typicode.com/users'), true );
        } elseif( $action === 'write' ){
            $user_list = json_decode( $_COOKIE['user_list'], true );
        }
        
    echo "<div class='modal-content'>
        <div class='title-block'>
            <span class='title'>" . ( $id === 'new' ? "Uus kasutaja" : $user_list[$id]['name'] ) . "</span>
            <button type='button' class='close-modal'>X</button>
        </div>

        <form method='post' action='' id='client-form'>
            <input type='hidden' name='id' value='$id' />

            <div class='label-block'>
                
                <div class='label-cont'>
                    <label for='user'>Nimi</label>
                    <input type='text' name='name' id='name' value='" . ( $action !== 'add' ? $user_list[$id]['name']  : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Kasutajanimi</label>
                    <input type='text' name='username' id='username' value='" . ( $action !== 'add' ? $user_list[$id]['username'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>E-posti aadress</label>
                    <input type='text' name='email' id='email' value='" . ( $action !== 'add' ? $user_list[$id]['email']  : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Telefoninumber</label>
                    <input type='text' name='phone' id='phone' value='" . ( $action !== 'add' ? $user_list[$id]['phone'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Tänav</label>
                    <input type='text' name='street' id='street' value='" . ( $action !== 'add' ? $user_list[$id]['address']['street'] : '' ) . "' />
                </div>
                
                <div class='label-cont'>
                    <label for='user'>Maja nr.</label>
                    <input type='text' name='suite' id='suite' value='" . ( $action !== 'add' ? $user_list[$id]['address']['suite'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Linn</label>
                    <input type='text' name='city' id='city' value='" . ( $action !== 'add' ? $user_list[$id]['address']['city'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Postiindeks</label>
                    <input type='text' name='zipcode' id='zipcode' value='" . ( $action !== 'add' ? $user_list[$id]['address']['zipcode'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Laiuskraadid</label>
                    <input type='text' name='lat' id='lat' value='" . ( $action !== 'add' ? $user_list[$id]['address']['geo']['lat'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Pikkuskraadid</label>
                    <input type='text' name='lng' id='lng' value='" . ( $action !== 'add' ? $user_list[$id]['address']['geo']['lng'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Kodulehe aadress</label>
                    <input type='text' name='website' id='website' value='" . ( $action !== 'add' ? $user_list[$id]['website'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Ettevõtte nimi</label>
                    <input type='text' name='company_name' id='company_name' value='" . ( $action !== 'add' ? $user_list[$id]['company']['name'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Hüüdlause</label>
                    <input type='text' name='catchPhrase' id='catchPhrase' value='" . ( $action !== 'add' ? $user_list[$id]['company']['catchPhrase'] : '' ) . "' />
                </div>

                <div class='label-cont'>
                    <label for='user'>Tegevusvaldkond</label>
                    <input type='text' name='bs' id='bs' value='" . ( $action !== 'add' ? $user_list[$id]['company']['bs'] : '' ) . "' />
                </div>
                
                <div class='btn-block'>
                    <button type='button' name='close' class='close-modal-btn'>Sulge</button>";
                    
                    if( $action === 'add' ){ // add new user

                       echo "<button type='submit' name='add' class='user-action-btn success-btn' data-action='add'>Salvesta</button>";

                    } else if( $action === 'write' ){ // change data or delete user

                        echo "<button type='submit' name='change' class='user-action-btn success-btn' data-action='change'>Salvesta</button>";
                        echo "<button type='submit' name='delete' class='user-action-btn error-btn' data-action='delete' onclick=\"return confirm('Kinnitad kustutamist?')\">Kustuta</button>";

                    }
                
                echo "</div>
            </div>

        </form>
        
    </div>";