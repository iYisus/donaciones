<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => "Le champ :attribute n'est pas une URL valide.",
    'after'                => 'Le champ :attribute doit être une date postérieure au :date.',
    'alpha'                => 'Le champ :attribute doit seulement contenir des lettres.',
    'alpha_dash'           => 'Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le champ :attribute doit seulement contenir des chiffres et des lettres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date antérieure au :date.',
    'between'              => [
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'file'    => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ de confirmation :attribute ne correspond pas.',
    'date'                 => "Le champ :attribute n'est pas une date valide.",
    'date_format'          => 'Le champ :attribute ne correspond pas au format :format.',
    'different'            => 'Les champs :attribute et :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions'           => "La taille de l'image :attribute n'est pas conforme.",
    'distinct'             => 'Le champ :attribute a une valeur dupliquée.',
    'email'                => 'Le champ :attribute doit être une adresse e-mail valide.',
    'exists'               => 'Le champ :attribute sélectionné est invalide.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute est obligatoire.',
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute est invalide.',
    'in_array'             => 'Le champ :attribute n\'existe pas dans :other.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'json'                 => 'Le champ :attribute doit être un document JSON valide.',
    'max'                  => [
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'file'    => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
        'string'  => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
        'array'   => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
    ],
    'mimes'                => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'Le champ :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'La valeur de :attribute doit être supérieure à :min.',
        'file'    => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir au moins :min caractères.',
        'array'   => 'Le tableau :attribute doit contenir au moins :min éléments.',
    ],
    'not_in'               => "Le champ :attribute sélectionné n'est pas valide.",
    'numeric'              => 'Le champ :attribute doit contenir un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire quand la valeur de :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire sauf si :other est :values.',
    'required_with'        => 'Le champ :attribute est obligatoire quand :values est présent.',
    'required_with_all'    => 'Le champ :attribute est obligatoire quand :values est présent.',
    'required_without'     => "Le champ :attribute est obligatoire quand :values n'est pas présent.",
    'required_without_all' => "Le champ :attribute est requis quand aucun de :values n'est présent.",
    'same'                 => 'Les champs :attribute et :other doivent être identiques.',
    'size'                 => [
        'numeric' => 'La valeur de :attribute doit être :size.',
        'file'    => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
        'string'  => 'Le texte de :attribute doit contenir :size caractères.',
        'array'   => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique'               => 'La valeur du champ :attribute est déjà utilisée.',
    'uploaded'             => "Le fichier du champ :attribute n'a pu être téléchargé.",
    'url'                  => "Le format de l'URL de :attribute n'est pas valide.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom'               => [
        'user_name' => [
            'required' => 'Le champ pseudo est obligatoire.',
            'min' => 'Le champ pseudo doit comporter au moins :min caractères.',
            'max' => 'Le champ utilisateur ne doit pas être supérieur à :max caractères.',
            'unique' => "L'pseudo a déjà été prise.",
        ],
        'nombre' => [
            'required' => 'Le champ de nom est requis.',
        ],
        'apellido' => [
            'required' => 'Le dernier champ de nom est requis.',
        ],
        'password_nueva' => [
            'required' => 'Le nouveau mot de passe est requis.',
            'min' => 'Le nouveau champ de champ de mot de passe doit être au moins :min caractères.',
            'max' => 'Le champ du nouveau mot de passe ne doit pas être supérieur à :max caractères.',
        ],
        'password_conf' => [
            'required' => 'Le champ de mot de passe de confirmation est requis.',
            'min' => 'Le champ de mot de passe de confirmation doit être au moins :min caractères.',
            'max' => 'Le champ de mot de passe de confirmation ne doit pas être supérieur à :max caractères.',
            'same' => 'Les mots de passe doivent correspondre.',
        ],
        'mensaje_email' => [
            'required' => 'Le champ de message est obligatoire.',
            'max'=> 'Le champ de message ne doit pas être supérieur à :max caractères.'
        ],
        'correo_actual' => [    
            'required' => 'Le champ de adresse e-mail actuel est obligatoire',
            'max'=> 'Le champ de adresse e-mail actuel ne doit pas être supérieur à :max caractères.',
            'email' => 'Le champ de adresse e-mail actuel doit être une adresse e-mail valide.'
        ],
        'confirmar_email' => [
            'required' => 'Le champ adresse e-mail de confirmation est obligatoire.',
            'max'=> 'Le champ adresse e-mail de confirmation ne doit pas être supérieur à :max caractères.',
            'email' => 'Le champ adresse e-mail de confirmation doit être une adresse e-mail valide.',
            'same'  => 'Les champs adresse e-mail de confirmation et nouveau adresse e-mailadresse e-mail doivent être identiques.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes'           => [
        'nombre'                  => 'Nom',
        'usuario'              => 'Pseudo',
        'correo_electronico'    => 'Adresse e-mail',
        'nombre'            => 'Prénom',
        'apellido'             => 'Nom',
        'contraseña'              => 'Mot de passe',
        'confirmacion_contraseña' => 'Confirmation du mot de passe',
        'ciudad'                  => 'Ville',
        'pais'               => 'Pays',
        'direccion'               => 'Adresse',
        'telefono'                 => 'Téléphone',
        'movil'                => 'Portable',
        'edad'                   => 'Age',
        'sexo'                   => 'Sexe',
        'genero'                => 'Genre',
        'dia'                   => 'Jour',
        'mes'                 => 'Mois',
        'año'                  => 'Année',
        'hora'                  => 'Heure',
        'minuto'                => 'Minute',
        'segundos'                => 'Seconde',
        'titulo'                 => 'Titre',
        'contenido'               => 'Contenu',
        'descripcion'           => 'Description',
        'extracto'               => 'Extrait',
        'fecha'                  => 'Date',
        'hora'                  => 'Heure',
        'disponible'             => 'Disponible',
        'tamaño'                  => 'Taille',
    ],

];