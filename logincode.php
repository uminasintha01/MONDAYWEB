<?php
session_start();
include('dbconfig.php');

if(isset($_POST['login_btn']))
{
    $email = $_POST['email'];
    $clearTextpassword = $_POST['password'];


    try {
        $user = $auth->getUserByEmail("$email");
        
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextpassword);
            $idTokenString =$signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $claims = $auth->getUser($uid)->customClaims;
          
                $claims = $auth->getUser($uid)->customClaims;
                 if(isset($claims['admin']) == true)
                {
                    $_SESSION['verified_admin'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;

                }elseif(isset($claims['super_admin']) == true)
                {
                    $_SESSION['verified_super_admin'] = true;
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }
                elseif($claims == null)
                {
                    $_SESSION['verified_user_id'] = $uid;
                    $_SESSION['idTokenString'] = $idTokenString;
                }

            

            $_SESSION['status'] = 'Logged in successfully';
            header('Location: beranda.php');
            exit();


            } catch (InvalidToken $e) {
                 echo 'The token is invalid: '.$e->getMessage();
            } catch (\InvalidArgumentException $e) {
             echo 'The token could not be parsed: '.$e->getMessage();
            }
        }
        catch(Exception $e)
        {
            $_SESSION['status'] = 'Wrong Password';
            header('Location: index.php');
            exit();
        }
       
        
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        //echo $e->getMessage();

        $_SESSION['status'] = 'No Email Found';
        header('Location: index.php');
        exit();
    }

}

else
{ 
    $_SESSION['status'] = 'Not Allowed';
    header('Location: index.php');
    exit();
}

?>