<?php

return array(
    'username' => 'Gebruikersnaam',
    'password' => 'Wachtwoord',
    'password_confirmation' => 'Bevestig wachtwoord',
    'e_mail' => 'E-mailadres',
    'username_e_mail' => 'Gebruikersnaam of e-mailadres',
    'signup' =>
        array(
            'title' => 'Registratie',
            'desc' => 'Nieuwe account aanmaken',
            'confirmation_required' => 'Bevestiging is verplicht',
            'submit' => 'Registreren',
        ),
    'login' =>
        array(
            'title' => 'Aanmelden',
            'desc' => 'Vul uw gebruikersnaam en wachtwoord in',
            'forgot_password' => '(wachtwoord vergeten)',
            'remember' => 'Onthouden',
            'submit' => 'Aanmelden',
        ),
    'forgot' =>
        array(
            'title' => 'Wachtwoord vergeten',
            'submit' => 'Doorgaan',
        ),
    'alerts' =>
        array(
            'account_created' => 'Uw account is met succes aangemaakt. Controleer uw e-mail voor de instructies voor het activeren van uw account.',
            'too_many_attempts' => 'Teveel pogingen, probeer het nogmaals over enkele minuten.',
            'wrong_credentials' => 'Onjuist e-mailadres, gebruikersnaam of wachtwoord.',
            'not_confirmed' => 'Uw account is nog niet geactiveerd, controleer uw e-mail voor de activatiegegevens.',
            'confirmation' => 'Uw account is geactiveerd! U kunt nu inloggen.',
            'wrong_confirmation' => 'Onjuiste activatie.',
            'password_forgot' => 'De informatie is naar uw e-mailadres verzonden.',
            'wrong_password_forgot' => 'Gebruiker kon niet gevonden worden.',
            'password_reset' => 'Uw wachtwoord is met succes veranderd.',
            'wrong_password_reset' => 'Onjuist wachtwoord, probeer het nog eens.',
            'wrong_token' => 'Het herinitialisatietoken is onjuist.',
            'duplicated_credentials' => 'De ingevulde gegevens zijn al in gebruik.',
        ),
    'email' =>
        array(
            'account_confirmation' =>
                array(
                    'subject' => 'Accountactivatie',
                    'greetings' => 'Beste :name',
                    'body' => 'Gebruik onderstaande koppeling om uw account te activeren.',
                    'farewell' => 'Met vriendelijke groeten',
                ),
            'password_reset' =>
                array(
                    'subject' => 'Wachtwoordherinitialisatie',
                    'greetings' => 'Beste :name',
                    'body' => 'Gebruik onderstaande koppeling om uw wachtwoord te veranderen.',
                    'farewell' => 'Met vriendelijke groeten',
                ),
        ),
);
