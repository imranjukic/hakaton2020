<?php

    // $message = array();
    $error = false;

    $teamName = '';
    $oldCompetitions = '';
    $motivation = '';
    $teamAdvantages = '';
    $giveUpSituation = '';
    $googleDriveLink = '';

    $member1Name = '';
    $member1Email = '';
    $member1Phone = '';
    $member1School = '';
    $member1Year = '';

    $member2Name = '';
    $member2Email = '';
    $member2Phone = '';
    $member2School = '';
    $member2Year = '';

    $member3Name = '';
    $member3Email = '';
    $member3Phone = '';
    $member3School = '';
    $member3Year = '';

    $member4Name = '';
    $member4Email = '';
    $member4Phone = '';
    $member4School = '';
    $member4Year = '';

    function cleanInput($input){
        $input = trim($input);
        $input = stripslashes($input); // removes / from sting
        $input = htmlspecialchars($input);

        return $input;
    }

    if(isset($_POST['submit'])){

        $teamName = $_POST['naziv-tima'];
        $oldCompetitions = $_POST['iskustvo'];
        $motivation = $_POST['zasto-ste-se-prijavili'];
        $teamAdvantages = $_POST['prednost-mana'];
        $giveUpSituation = $_POST['kako-ste-saznali'];
        $googleDriveLink = $_POST['link-za-cv'];
    
        $member1Name = $_POST['ime-prezime1'];
        $member1Email = $_POST['email1'];
        $member1Phone = $_POST['telefon1'];
        $member1School = $_POST['faks/skola1'];
        $member1Year = $_POST['godina1'];
    
        $member2Name = $_POST['ime-prezime2'];
        $member2Email = $_POST['email2'];
        $member2Phone = $_POST['telefon2'];
        $member2School = $_POST['faks/skola2'];
        $member2Year = $_POST['godina2'];
    
        $member3Name = $_POST['ime-prezime3'];
        $member3Email = $_POST['email3'];
        $member3Phone = $_POST['telefon3'];
        $member3School = $_POST['faks/skola3'];
        $member3Year = $_POST['godina3'];
    
        $member4Name = $_POST['ime-prezime4'];
        $member4Email = $_POST['email4'];
        $member4Phone = $_POST['telefon4'];
        $member4School = $_POST['faks/skola4'];
        $member4Year = $_POST['godina4'];

        $teamName = cleanInput($teamName);
        $oldCompetitions = cleanInput($oldCompetitions);
        $motivation = cleanInput($motivation);
        $teamAdvantages = cleanInput($teamAdvantages);
        $giveUpSituation = cleanInput($giveUpSituation);
        $googleDriveLink = cleanInput($googleDriveLink);

        $member1Name = cleanInput($member1Name);
        $member1Email = cleanInput($member1Email);
        $member1Phone = cleanInput($member1Phone);
        $member1School = cleanInput($member1School);
        $member1Year = cleanInput($member1Year);

        $member2Name = cleanInput($member2Name);
        $member2Email = cleanInput($member2Email);
        $member2Phone = cleanInput($member2Phone);
        $member2School = cleanInput($member2School);
        $member2Year = cleanInput($member2Year);

        $member3Name = cleanInput($member3Name);
        $member3Email = cleanInput($member3Email);
        $member3Phone = cleanInput($member3Phone);
        $member3School = cleanInput($member3School);
        $member3Year = cleanInput($member3Year);

        $member4Name = cleanInput($member4Name);
        $member4Email = cleanInput($member4Email);
        $member4Phone = cleanInput($member4Phone);
        $member4School = cleanInput($member4School);
        $member4Year = cleanInput($member4Year);

        if(empty($teamName) || empty($oldCompetitions) || empty($motivation) || empty($teamAdvantages) || empty($giveUpSituation) || empty($googleDriveLink) 
        || empty($member1Name) || empty($member1Email) || empty($member1Phone) || empty($member1School) || empty($member1Year)
        || empty($member2Name) || empty($member2Email) || empty($member2Phone) || empty($member2School) || empty($member2Year)
        || empty($member3Name) || empty($member3Email) || empty($member3Phone) || empty($member3School) || empty($member3Year)){
            // $message['missingFields'] = '<p>Niste popunili sva polja.</p>';
            $error = true;
        }

        if(!filter_var($member1Email, FILTER_VALIDATE_EMAIL) || !filter_var($member2Email, FILTER_VALIDATE_EMAIL)
        || !filter_var($member3Email, FILTER_VALIDATE_EMAIL)){
            // $message['wrongEmailFormat'] = '<p><label class="text-danger">Pogrešan Email Format.</label></p>';
            if(!empty($member4Email)){
                if(!filter_var($member4Email, FILTER_VALIDATE_EMAIL)){
                    $error = true;
                }
            }
        }

        // if(empty($email)){
        //     $message['email'] = '<p><label class="text-danger">Please Enter Your Email</label></p>';
        // }else{
        //     $email = cleanInput($email);
        //     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //         $message['email'] = '<p><label class="text-danger">Invalid Email Format</label></p>';
        //     }
        // }

        if(!$error){
            $file = fopen('contact_data.csv', 'a');
            $fileBUP = fopen('contact_data_BUP.csv', 'a');

            $numOfRows = count(file('contact_data.csv'));

            // if($numOfRows == 0){
                fputcsv($file, ['Br.', 'Naziv Tima', 'Iskustvo', 'Zasto Ste Se Prijavili', 'Prednosti / Mane', 'Kada Bi Odustali', 'CV']);
                fputcsv($fileBUP, ['Br.', 'Naziv Tima', 'Iskustvo', 'Zasto Ste Se Prijavili', 'Prednosti / Mane', 'Kada Bi Odustali', 'CV']);
            // }

            if($numOfRows > 1){
                $numOfRows = ($numOfRows - 1);
            }

            $formData = array(
                'Br.' => 69,
                'teamName' => $teamName,
                'oldCompetitions' => $oldCompetitions,
                'motivation' => $motivation,
                'teamAdvantages' => $teamAdvantages,
                'giveUpSituation' => $giveUpSituation,
                'googleDriveLink' => $googleDriveLink
            );

            fputcsv($file, $formData);
            fputcsv($fileBUP, $formData);

            fputcsv($file, ['Br.', 'Ime i Prezime', 'Email', 'Telefon', 'Fax / Škola', 'Godina']);
            fputcsv($fileBUP, ['Br.', 'Ime i Prezime', 'Email', 'Telefon', 'Fax / Škola', 'Godina']);

            $formData = array(
                'Br.' => 1,
                'member1Name' => $member1Name,
                'member1Email' => $member1Email,
                'member1Phone' => $member1Phone,
                'member1School' => $member1School,
                'member1Year' => $member1Year
            );

            fputcsv($file, $formData);
            fputcsv($fileBUP, $formData);

            $formData = array(
                'Br.' => 2,
                'member2Name' => $member2Name,
                'member2Email' => $member2Email,
                'member2Phone' => $member2Phone,
                'member2School' => $member2School,
                'member2Year' => $member2Year
            );

            fputcsv($file, $formData);
            fputcsv($fileBUP, $formData);

            $formData = array(
                'Br.' => 3,
                'member3Name' => $member3Name,
                'member3Email' => $member3Email,
                'member3Phone' => $member3Phone,
                'member3School' => $member3School,
                'member3Year' => $member3Year
            );

            fputcsv($file, $formData);
            fputcsv($fileBUP, $formData);

            if(!empty($member4Name)){
                $formData = array(
                    'Br.' => 4,
                    'member4Name' => $member4Name,
                    'member4Email' => $member4Email,
                    'member4Phone' => $member4Phone,
                    'member4School' => $member4School,
                    'member4Year' => $member4Year
                );
    
                fputcsv($file, $formData);
                fputcsv($fileBUP, $formData);
            }

            // $message['success'] = '<p><label class="text-success">Uspešno ste se prijavili za Hakaton 2020.</label></p>';
            // $toEmail = $email;
            $subject = 'Hakaton Prijava';
            $messageEmail = 'Uspešno ste se prijavili za FON Hakaton 2020';
            $headers = 'From: dzeca@dzeca.com';

            if(mail($member1Email, $subject, $messageEmail, $headers) && mail($member2Email, $subject, $messageEmail, $headers)
            && mail($member3Email, $subject, $messageEmail, $headers) && mail($member4Email, $subject, $messageEmail, $headers)){
                // poslao se mail
            }else{
                // nije se poslao
            }

            $teamName = '';
            $oldCompetitions = '';
            $motivation = '';
            $teamAdvantages = '';
            $giveUpSituation = '';
            $googleDriveLink = '';

            $member1Name = '';
            $member1Email = '';
            $member1Phone = '';
            $member1School = '';
            $member1Year = '';

            $member2Name = '';
            $member2Email = '';
            $member2Phone = '';
            $member2School = '';
            $member2Year = '';

            $member3Name = '';
            $member3Email = '';
            $member3Phone = '';
            $member3School = '';
            $member3Year = '';

            $member4Name = '';
            $member4Email = '';
            $member4Phone = '';
            $member4School = '';
            $member4Year = '';
            
        }else{
            echo "NAY!!!!!!!!!!!!!!!!!!!!!!!\n\n\n\n\n\n\n\n\n";
        }

        // print_r($message);
    }

    // echo count($message);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/png" href="/img/favicon-03.png" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/prijava.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <title>Prijava</title>
</head>

<body>

    <h1>Prijava za Hakaton</h1>
    <h3>Svaki tim može imati 3 ili 4 člana.</h3>

    <div class="missing-fileds-error" style="margin-bottom: 1.5rem; color: #fff;">
        <?php //if(array_key_exists('missingFields', $message)) echo $message['missingFields']; ?>
        <?php //if(array_key_exists('wrongEmailFormat', $message)) echo $message['wrongEmailFormat']; ?>
        <?php //if(array_key_exists('success', $message)) echo $message['success']; ?>
    </div>

    <form name="submit-to-google-sheet" method="POST">
        <button type="button" class="collapsible">Tim</button>
        <div class="content">
            <div class="forma">
                <h2>Naziv tima:</h2>
                <input name="naziv-tima" type="text" class="form-control aaa" value="<?php echo $teamName; ?>">
                <h2>Da li ste ranije učestvovali na sličnim takmičenjima? Ako jeste, navedite na kojim i ukratko
                    opišite iskustvo.</h2>
                <textarea name="iskustvo" class="form-control" rows="3"><?php echo $oldCompetitions; ?></textarea>
                <h2>Šta vas motiviše da se prijavite za učestvovanje na FON Hakatonu? Opišite svoju
                    motivaciju, očekivanja i zašto baš vaš tim treba da odaberemo.</h2>
                <textarea name="zasto-ste-se-prijavili" class="form-control aaa" rows="4"><?php echo $motivation; ?></textarea>
                <h2>Opišite ključne prednosti i mane vašeg tima:</h2>
                <textarea name="prednost-mana" class="form-control aaa" rows="3"><?php echo $teamAdvantages; ?></textarea>
                <h2>Koja situacija bi dovela do toga da vaš tim odustane od takmičenja?</h2>
                <textarea name="kako-ste-saznali" class="form-control aaa" rows="3"><?php echo $giveUpSituation; ?></textarea>
                <h2>Na drajv ubacite CV svakog clana tima i unesite link tog drajva (google drive, onedrive i sl.) u naredno polje.</h2>
                <input name="link-za-cv" type="text" class="form-control aaa" value="<?php echo $googleDriveLink; ?>">
            </div>
        </div><br><br>

        <button type="button" class="collapsible">Prvi član</button>
        <div class="content">
            <div class="forma">
                <h2>Ime i prezime</h2>
                <input name="ime-prezime1" type="text" class="form-control aaa" value="<?php echo $member1Name; ?>">
                <h2>E-mail</h2>
                <input id="email1" name="email1" type="text" class="form-control aaa" value="<?php echo $member1Email; ?>">
                <h2>Telefon</h2>
                <input name="telefon1" type="tel" class="form-control aaa" value="<?php echo $member1Phone; ?>">
                <h2>Fakultet/Srednja škola</h2>
                <input name="faks/skola1" type="text" class="form-control aaa" value="<?php echo $member1School; ?>">
                <h2>Godina studija/razred</h2>
                <input name="godina1" type="number" class="form-control aaa" value="<?php echo $member1Year; ?>">
            </div>
        </div><br><br>

        <button type="button" class="collapsible">Drugi član</button>
        <div class="content">
            <div class="forma">
                <h2>Ime i prezime</h2>
                <input name="ime-prezime2" type="text" class="form-control aaa" value="<?php echo $member2Name; ?>">
                <h2>E-mail</h2>
                <input id="email2" name="email2" type="text" class="form-control aaa" value="<?php echo $member2Email; ?>">
                <h2>Telefon</h2>
                <input name="telefon2" type="tel" class="form-control aaa" value="<?php echo $member2Phone; ?>">
                <h2>Fakultet/Srednja škola</h2>
                <input name="faks/skola2" type="text" class="form-control aaa" value="<?php echo $member2School; ?>">
                <h2>Godina studija/razred</h2>
                <input name="godina2" type="number" class="form-control aaa" value="<?php echo $member2Year; ?>">
            </div>
        </div><br><br>

        <button type="button" class="collapsible">Treći član</button>
        <div class="content">
            <div class="forma">
                <h2>Ime i prezime</h2>
                <input name="ime-prezime3" type="text" class="form-control aaa" value="<?php echo $member3Name; ?>">
                <h2>E-mail</h2>
                <input id="email3" name="email3" type="text" class="form-control aaa" value="<?php echo $member3Email; ?>">
                <h2>Telefon</h2>
                <input name="telefon3" type="tel" class="form-control aaa" value="<?php echo $member3Phone; ?>">
                <h2>Fakultet/Srednja škola</h2>
                <input name="faks/skola3" type="text" class="form-control aaa" value="<?php echo $member3School; ?>">
                <h2>Godina studija/razred</h2>
                <input name="godina3" type="number" class="form-control aaa" value="<?php echo $member3Year; ?>">
            </div>
        </div><br><br>

        <button type="button" class="collapsible">Četvrti član</button>
        <div class="content">
            <div class="forma">
                <h2>Ime i prezime</h2>
                <input name="ime-prezime4" type="text" class="form-control bbb" value="<?php echo $member4Name; ?>">
                <h2>E-mail</h2>
                <input id="email4" name="email4" type="text" class="form-control bbb" value="<?php echo $member4Email; ?>">
                <h2>Telefon</h2>
                <input name="telefon4" type="tel" class="form-control bbb" value="<?php echo $member4Phone; ?>">
                <h2>Fakultet/Srednja škola</h2>
                <input name="faks/skola4" type="text" class="form-control bbb" value="<?php echo $member4School; ?>">
                <h2>Godina studija/razred</h2>
                <input name="godina4" type="number" class="form-control bbb" value="<?php echo $member4Year; ?>">
            </div>
        </div><br><br>

        <h4>Svi članovi tima prihvataju da se njihovi podaci čuvaju u internoj bazi projekta.</h4>
        <button id="dugme" name="submit" type="submit" class="form-control submit" onclick="prijava();">POTVRDI</button>
        <h1 id="potvrda"></h1>
        <br><br>

    </form>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/prijava.js"></script>
    <script>

        function potvrda() {
            const scriptURL = 'https://script.google.com/macros/s/AKfycbxgH_Xq8de0HcJXcIGQgc8PqAEDzfhfFnNWLrZrLLU_c_zkAV9A/exec'
            const form = document.forms['submit-to-google-sheet']
            form.addEventListener("submit", e => {
                e.preventDefault()
                fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                    .then(response => console.log('Success!', response))
                    .catch(error => console.error('Error!', error.message))
            })
        }

        function prijava() {
            var gotovo = true;
            var list = document.querySelectorAll('.aaa');

            let validEmails = false;
            let email1 = document.querySelector('#email1');
            let email2 = document.querySelector('#email2');
            let email3 = document.querySelector('#email3');
            let email4 = document.querySelector('#email4');

            for (var element of list) {
                if (element.value == "") {
                    gotovo = false;

                    break;
                }
            }

            if (gotovo) {
                if(validateEmail(email1.value) && validateEmail(email2.value) && validateEmail(email3.value)){
                    if(email4.value != ''){
                        if(validateEmail(email4.value)){
                            potvrda();
                            document.getElementById('dugme').style.display = 'none'

                            Swal.fire({
                                text: 'Uspešno ste se prijavili!',
                                type: 'success',
                                confirmButtonText: 'Ok'
                            })
                        }else{
                            event.preventDefault();

                            Swal.fire({
                                text: 'Pogrešan Email Format!',
                                type: 'error',
                                confirmButtonText: 'Ok'
                            });
                        }
                    }
                }else{
                    event.preventDefault();

                    Swal.fire({
                        text: 'Pogrešan Email Format!',
                        type: 'error',
                        confirmButtonText: 'Ok'
                    });
                }

            }else {
                event.preventDefault();

                Swal.fire({
                    text: 'Niste popunili sva polja!',
                    type: 'error',
                    confirmButtonText: 'Ok'
                });

            }
        }

        function validateEmail(email) {
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            return re.test(String(email).toLowerCase());
        }

    </script>

</body>

</html>