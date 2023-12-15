<?php

return [

    //  --------- UNIVERZALNE  ---------- //
    "0" => "Error pri validácii",
    "1" => "Požiadavka bola úspešne vrátená",
    "2" => "Požiadavka sa nemohola zobraziť, pravdepodobne pre zlú požiadavku používateľa",
    "3" => "Používateľ s týmto id neexistuje",
    "9" => "Požiadavka sa nemohla zobraziť kvôli chybe na strane servera",



    // ----------- 1 . CONTRACT ------------//
    // GET - index /api/v1/contract
    "1.1.1" => "List bol úspešne vrátený",
    "1.1.2" => "List sa nemohol zobraziť, pravdepodobne pre zlú požiadavku používateľa",
    "1.1.3" => "Používateľ s týmto id neexistuje",
    "1.1.9" => "Zmluvy sa nemohli zobraziť kvôli chybe na strane servera",
    // POST - store /api/v1/contract
    "1.2.1" => "Zmluva bola úspešne vytvorená",
    "1.2.2" => "Zmluva sa nemohla vytvoriť, pravdepodobne pre nesprávne zadané údaje používateľom",
    "1.2.3" => "Zmluva sa nemohla vytvoriť, pretože užívateľ sa nenašiel",
    "1.2.9" => "Zmluva sa nemohla vytvoriť kvôli chybe na strane servera",
    // GET - show /api/v1/contract/{contractId}
    "1.3.1" => "Zmluva bola úspešne vrátená",
    "1.3.2" => "Zmluva s týmto id neexistuje",
    "1.3.9" => "Zmluva sa nemohla zobraziť kvôli chybe na strane servera",
    // PUT - update /api/v1/contract/{contractId}
    "1.4.1" => "Zmluva bola úspešne upravená",
    "1.4.2" => "Zmluva sa nemohla upraviť, pravdepodobne pre nesprávne zadané údaje používateľom",
    "1.4.3" => "Zmluva s týmto id neexistuje",
    "1.4.9" => "Zmluva sa nemohla upraviť kvôli chybe na strane servera",
    // DELETE - delete /api/v1/contract/{contractId}
    "1.5.1" => "Zmluva bola úspešne vymazaná",
    "1.5.2" => "Zmluva s týmto id neexistuje",
    "1.5.3" => "Neautorizovaný používateľ",
    "1.5.9" => "Zmluva sa nemohla vymazať kvôli chybe na strane servera",


    // ----------- 2 . USERS ------------//
    // GET - index /api/v1/users
    "2.1.1" => "Užívatelia boli úspešne vrátený",
    "2.1.2" => "Užívatelia sa nemoholi zobraziť, pravdepodobne pre zlú požiadavku používateľa",
    "2.1.9" => "Užívatelia sa nemoholi zobraziť, pravdepodobne pre chybu na strane servera",



];
