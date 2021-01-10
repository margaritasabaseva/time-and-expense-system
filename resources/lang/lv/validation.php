<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute jābūt pieņemtam.',
    'active_url' => ':attribute nav derīgs URL.',
    'after' => ':attribute jābūt datumam pēc :date.',
    'after_or_equal' => ':attribute jābūt vienādam ar vai pēc :date.',
    'alpha' => ':attribute drīkst saturēt tikai burtus.',
    'alpha_dash' => ':attribute var saturēt tikai burtus, ciparus, domuzīmes un pasvītras.',
    'alpha_num' => ':attribute drīkst saturēt tikai burtus un ciparus.',
    'array' => ':attribute jābūt masīvam.',
    'before' => ':attribute jābūt datumam pirms :date.',
    'before_or_equal' => ':attribute jābūt datumam vienādam ar vai pirms :date.',
    'between' => [
        'numeric' => ':attribute jābūt starp :min un :max.',
        'file' => ':attribute jābūt starp :min un :max kilobaitiem.',
        'string' => ':attribute jābūt starp :min un :max rakstzīmēm.',
        'array' => ':attribute jāsastāv no :min līdz :max elementiem.',
    ],
    'boolean' => ':attribute laukam jābūt vai nu patiesam, vai nepatiesam.',
    'confirmed' => 'Apstiprinājums nesakrīt ar lauka :attribute saturu.',
    'date' => ':attribute nav derīgs datums.',
    'date_equals' => ':attribute jābūt datumam vienādam ar :date.',
    'date_format' => ':attribute neatbilst formātam :format.',
    'different' => ':attribute un :other nedrīkst būt vienādi.',
    'digits' => ':attribute jāsastāv no :digits cipariem.',
    'digits_between' => ':attribute jāsastāv no :min līdz :max cipariem.',
    'dimensions' => ':attribute ir nederīgi attēla izmēri.',
    'distinct' => ':attribute laukam ir dublikāta vērtība.',
    'email' => 'Laukam :attribute jāsatur derīga e-pasta adrese.',
    'ends_with' => ':attribute jābeidzas ar kādu no sekojošajām vērtībām: :values.',
    'exists' => 'izvēlētais :attribute ir nederīgs.',
    'file' => ':attribute jābūt failam.',
    'filled' => ':attribute laukam ir jābūt aizpildītam.',
    'gt' => [
        'numeric' => ':attribute jābūt lielākam par :value.',
        'file' => ':attribute jābūt lielākam par :value kilobaitiem.',
        'string' => ':attribute jāsatur vairāk par :value rakstzīmēm.',
        'array' => ':attribute jāsatur vairāk par :value elementiem.',
    ],
    'gte' => [
        'numeric' => ':attribute jābūt vienādam vai lielākam par :value.',
        'file' => ':attribute jābūt lielākam par :value kilobaitiem.',
        'string' => ':attribute jāsatur vienāds vai lielāks skaits par :value rakstzīmēm.',
        'array' => ':attribute jāsatur :value elementi vai vairāk.',
    ],
    'image' => ':attribute jābūt attēlam.',
    'in' => 'izvēlētais :attribute ir nederīgs.',
    'in_array' => ':attribute lauks neeksistē :other.',
    'integer' => ':attribute jābūt veselam skaitlim.',
    'ip' => ':attribute jābūt derīgai IP adresei.',
    'ipv4' => ':attribute jābūt derīgai IPv4 adresei.',
    'ipv6' => ':attribute jābūt derīgai IPv6 adresei.',
    'json' => ':attribute jābūt derīgai JSON virknei.',
    'lt' => [
        'numeric' => ':attribute jābūt mazākam par :value.',
        'file' => ':attribute jābūt mazākam par :value kilobaitiem.',
        'string' => ':attribute jāsatur mazāk par :value rakstzīmēm.',
        'array' => ':attribute jāsatur mazāk nekā :value elementi.',
    ],
    'lte' => [
        'numeric' => ':attribute jābūt vienādam vai mazākam par :value.',
        'file' => ':attribute jābūt vienādam vai mazākam par :value kilobaitiem.',
        'string' => ':attribute jāsatur vienāds vai mazāks skaits par :value rakstzīmēm.',
        'array' => ':attribute nedrīkst saturēt vairāk par :value elementiem.',
    ],
    'max' => [
        'numeric' => ':attribute nedrīkst būt lielāks par :max.',
        'file' => ':attribute nedrīkst būs lielāks par :max kilobaitiem.',
        'string' => ':attribute nedrīkst saturēt vairāk par :max rakstzīmēm.',
        'array' => ':attribute nedrīkst saturēt vairāk par :max elementiem.',
    ],
    'mimes' => ':attribute jābūt failam ar tipu: :values.',
    'mimetypes' => ':attribute jābūt failam ar tipu: :values.',
    'min' => [
        'numeric' => ':attribute jābūt vismaz :min.',
        'file' => ':attribute vismaz :min kilobaitiem.',
        'string' => 'Laukam :attribute jāsatur vismaz :min rakstzīmes.',
        'array' => ':attribute jāsatur vismaz :min elementi.',
    ],
    'multiple_of' => ':attribute jābūt vairākiem :value.',
    'not_in' => 'izvēlētais :attribute ir nederīgs.',
    'not_regex' => ':attribute formāts ir nederīgs.',
    'numeric' => 'Laukam :attribute jāsatur virkne tikai no cipariem.',
    'password' => 'parole ir nepareiza.',
    'present' => ':attribute laukam ir jātiek izmatotam.',
    'regex' => ':attribute formāts ir nederīgs.',
    'required' => 'Lauks :attribute ir obligāts.',
    'required_if' => ':attribute lauks ir obligāts, kad :other ir :value.',
    'required_unless' => ':attribute lauks ir obligāts, ja vien :other ir :values.',
    'required_with' => ':attribute lauks ir obligāts, kad tiek izmantots :values.',
    'required_with_all' => ':attribute lauks ir obligāts, kad tiek izmantotas :values.',
    'required_without' => ':attribute lauks ir obligāts, kad :values netiek izmantots.',
    'required_without_all' => ':attribute lauks ir obligāts, kad nevienas no :values netiek izmantotas.',
    'same' => ':attribute un :other jāsakrīt.',
    'size' => [
        'numeric' => ':attribute jābūt :size.',
        'file' => ':attribute jābūt :size kilobaitiem.',
        'string' => ':attribute jāsastāv no :size rakstzīmēm.',
        'array' => ':attribute jāsatur :size elementi.',
    ],
    'starts_with' => ':attribute jāsākas ar vienu no sekojošajiem: :values.',
    'string' => ':attribute jābūt virknei.',
    'timezone' => ':attribute jābūt derīgai laika zonai.',
    'unique' => ':attribute jau ir aizņemts.',
    'uploaded' => ':attribute neizdevās augšupielādēt.',
    'url' => ':attribute nav derīgs URL.',
    'uuid' => ':attribute jābūt derīgam UUID.',

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

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'project'                => 'Projekts',
        'title'                  => 'Nosaukums',
        'project_description'    => 'Apraksts',
        'responsible_manager'    => 'Atbildīgais projektu vadītājs',
        'start_date'             => 'Sākuma datums',
        'vendor'                 => 'Pakalpojuma sniedzēja nosaukums',
        'document_number'        => 'Dokumenta numurs',
        'amount_euros'           => 'Summa (EUR)',
        'expense_day'            => 'Diena',
        'expense_month'          => 'Mēnesis',
        'expense_year'           => 'Gads',
        'expense_description'    => 'Izmaksu pamatojums/apraksts',
        'name'                   => 'Vārds, uzvārds',
        'email'                  => 'E-pasts',
        'job_title'              => 'Amats',
        'phone'                  => 'Tālrunis',
        'address'                => 'Adrese',
        'password'               => 'Parole',
        'current_password'       => 'Pašreizējā parole',
        'timesheet_month'        => 'Atskaites mēnesis',
        'timesheet_year'         => 'Atskaites gads',
        // 'Y-m-d'                  => 'gggg-mm-dd',
        'start_day'              => 'Diena',
        'start_month'            => 'Mēnesis',
        'start_year'             => 'Gads',
        'project_id'             => 'Projekts'
    ],

];
