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

    'accepted'             => 'پێویستە :attribute ڕێگەپێدراوبێت.',
    'active_url'           => 'ئەم بەستەرە :attribute ڕێگەپێدراونییە.',
    'after'                => ':attribute بەروارێک بنووسە دوای  ئەم بەروارە :date.',
    'after_or_equal'       => 'پێویستە ئەو بەروارەی نوسیوتە :attribute وەکو ئەم بەروارەبێت یاخود دواتر :date.',
    'alpha'                => ':attribute تەنیا پیتەکان ڕێگەپێدراون .',
    'alpha_dash'           => 'پێویستە :attribute تەنیا پیتەکان یان ژمارەکان یان کورتەهێڵ یان بنهێڵ لەخۆبگرێت.',
    'alpha_num'            => 'پێویستە :attribute تەنیا ژمارە لەخۆ بگرێت.',
    'array'                => 'پێویستە :attribute بەشێوازی ڕیز(ئەرێی) بێت.',
    'before'               => 'پێویستە ئەو بەروارەی دەینوسیت (:attribute) پێش ئەم بەروارەبێت (:date).',
    'before_or_equal'      => 'پێویستە ئەو بەروارەی دەینوسیت (:attribute) پێش ئەم بەروارەبێت :date یان هەمان بەرواربێت.',
    'between'              => [
        'numeric' => 'پێویستە :attribute لەنێوان :min نۆ :max ژمارەدا بێت.',
        'file'    => 'پێویستە :attribute قەبارەی پەڕگە لەنێوان :min بۆ :max کیلۆبایت دابێت.',
        'string'  => 'پێویستە :attribute وشەکانی لەنێوان :min بۆ :max دابێت،',
        'array'   => 'پێویستە :attribute بڕگەکانی لەنێوان :min بۆ :max دابێت.',
    ],
    'boolean'              => 'پێویستە :attribute تەنیا true یان false بێت.',
    'confirmed'            => 'پێویستە :attribute هاوشێوەبن.',
    'date'                 => 'پێویستە بەروار :attribute بەدروستی بنوسیت.',
    'date_format'          => 'پێویستە :attribute و :format هاوشێوەبن.',
    'different'            => 'پێویستە :attribute و :other جیاوازبن.',
    'digits'               => 'پێویستە :attribute ڕەنوسبێت :digits.',
    'digits_between'       => 'پێویستە ڕەنوس :attribute لەنێوان :min بۆ :max دابێت.',
    'dimensions'           => 'مەودای وێنە :attribute دروست نییە.',
    'distinct'             => 'ئەم خانەیە :attribute نرخەکەی دوبارەیە.',
    'email'                => 'تکایە پۆستی ئەلیکترۆنی دروست بنووسە.',
    'exists'               => 'ئەوەی دیاریت کردووە لە :attribute دروست نییە.',
    'file'                 => 'پێویستە :attribute پەڕگە بێت.',
    'filled'               => 'پێویستە خانەی :attribute نرخ لەخۆبگرێت.',
    'gt'                   => [
        'numeric' => 'پێویستە :attribute گەورەتربێت لە :value.',
        'file'    => 'پێویستە قەبارەی پەڕگەی :attribute گەورەتربێت لە :value کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی زیاتربێت لە :value وشە.',
        'array'   => 'پێویستە ڕیزەکانی :attribute زیاتربێت لە :value ڕیز.',
    ],
    'gte'                  => [
        'numeric' => 'پێویستە :attribute گەورەتربێت یان یەکسان بێت بە :value  .',
        'file'    => 'پێویستە قەبارەی پەڕگەی :attribute گەورەتربێت یان یەکسان بێت بە :value کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی زیاتربێت یان یەکسانبێت بە :value وشە.',
        'array'   => 'پێویستە ڕیزەکانی :attribute زیاتربێت یان یەکسانبێت بە :value ڕیز.',
    ],
    'image'                => 'پێویستە :attribute وێنە بێت.',
    'in'                   => 'ئەوەی دیاریت کردووە لە :attribute دروست نییە.',
    'in_array'             => 'پێویستە ئەوەی دیاریت کردووە لە :attribute لە :other بونی هەبێت.',
    'integer'              => 'پێویستە :attribute تەنیا ژمارەی تەواو لەخۆ بگرێت.',
    'ip'                   => 'تکایە ناونیشانی ئایپی دروست بنووسە لە :attribute.',
    'ipv4'                 => 'پێویستە :attribute بەشێوازی ناونیشانی (IPv4) بێت.',
    'ipv6'                 => 'پێویستە :attribute بەشێوازی ناونیشانی (IPv6) بێت.',
    'json'                 => 'پێویستە :attribute بەشێوازی نوسنی جەی سۆن (JSON) بێت.',
    'lt'                   => [
        'numeric' => 'پێویستە :attribute بچوکتربێت لە :value.',
        'file'    => 'پێویستە قەبارەی پەڕگەی :attribute بچوکتربێت لە :value کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی کەمتربێت لە :value وشە.',
        'array'   => 'پێویستە ڕیزەکانی :attribute زیاتربێت لە :value ڕیز.',    ],
    'lte'                  => [
        'numeric' => 'پێویستە :attribute بچوکتربێت یان یەکسان بێت بە :value .',
        'file'    => 'پێویستە قەبارەی پەڕگەی :attribute بچوکتربێت یان یەکسان بێت بە :value کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی کەمتربێت یان یەکسان بێت بە :value وشە.',
        'array'   => 'پێویستە ڕیزەکانی :attribute کەمتربێت یان یەکسان بێت بە :value ڕیز.',
    ],
    'max'                  => [
        'numeric' => 'پێویستە :attribute زیاترنەبێت لە :max.',
        'file'    => 'پێویستە پەڕگەی :attribute قەبارەی زیاترنەبێت لە :max کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی زیاتر نەبێت لە :max.',
        'array'   => 'پێویستە بڕگەکانی :attribute زیاتر نەبێت لە :max.',
    ],
    'mimes'                => 'پێویستە جۆری پەڕگەی :attribute یەکێک بێت لەمانە: :values.',
    'mimetypes'            => 'پێویستە جۆری پەڕگەی :attribute یەکێک بێت لەمانە: :values.',
    'min'                  => [
        'numeric' => 'پێویستە :attribute کەمتربێت لە :min.',
        'file'    => 'پێویستە پەڕگەی :attribute قەبارەی کەمتربێت لە :min کیلۆبایت.',
        'string'  => 'پێویستە :attribute وشەکانی کەمتربێت لە :min.',
        'array'   => 'پێویستە بڕگەکانی :attribute کەمتربێت لە :min.',
    ],
    'not_in'               => 'ئەوەی دیاریت کردووە لە :attribute دروست نییە..',
    'not_regex'            => 'شێوازی :attribute دروست نییە.',
    'numeric'              => 'پێویستە :attribute شێوازی ژمارەیی بێت.',
    'present'              => 'پێویستە خانەی :attribute دواتربێت.',
    'regex'                => 'شێوازی :attribute دروست نییە.',
    'required'             => 'تکایە خانەی :attribute بەدروستی پڕبکەوە.',
    'required_if'          => 'خانەی :attribute پێویستە پڕبکرێتەوە کاتێک :other یەکسانبێت بە :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'خانەی :attribute پێویستە پڕبکرێتەوە کاتێک  خانەی :values دواتربێت.',
    'required_with_all'    => 'خانەی :attribute پێویستە پڕبکرێتەوە کاتێک  خانەی :values دواتربێت.',
    'required_without'     => 'خانەی :attribute پێویستە پڕبکرێتەوە کاتێک  خانەی :values پێشتربێت.',
    'required_without_all' => 'خانەی :attribute پێویستە پڕبکرێتەوە کاتێک  هیچ کام لە بڕگەکانی :values دواترنەبێت.',
    'same'                 => 'پێویستە :attribute و :other هاوشێوەبن.',
    'size'                 => [
        'numeric' => 'پێویستە :attribute :size ژمارە لەخۆبگرێت.',
        'file'    => 'پێویستە قەبارەی پەڕگەی :attribute :size کیلۆبایت بێت.',
        'string'  => 'پێویستە :attribute :size وشە لەخۆبگرێت.',
        'array'   => 'پێویستە بڕگەکانی :attribute :size بڕگەبێت.',
    ],
    'string'               => 'پێویستە :attribute نوسین بێت.',
    'timezone'             => 'تکایە کاتی ناوچەی دروست بنووسە لە :attribute.',
    'unique'               => 'ببورە :attribute پێشتر بەکارهاتووە.',
    'uploaded'             => 'بەرزکردنەوەی :attribute سەرکەوتوونەبوو.',
    'url'                  => 'تکایە بەستەری :attribute بەدروستی بنووسە.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name'                  => 'ناو',
        'username'              => 'ناوی بەکارهێنەر',
        'email'                 => 'پۆستی ئەلیکترۆنی',
        'first_name'            => 'ناوی یەکەم',
        'last_name'             => 'ناوی باوک',
        'password'              => 'تێپەڕەوشە',
        'password_confirmation' => 'تێپەڕەوشەی دڵنیاکردنەوە',
        'city'                  => 'شار',
        'country'               => 'وڵات',
        'address'               => 'ناونیشان',
        'phone'                 => 'ژمارە مۆبایل',
        'mobile'                => 'ژمارە مۆبایل',
        'age'                   => 'تەمەن',
        'sex'                   => 'ڕەگەز',
        'gender'                => 'ڕەگەز',
        'day'                   => 'ڕۆژ',
        'month'                 => 'مانگ',
        'year'                  => 'ساڵ',
        'hour'                  => 'کاتژمێر',
        'minute'                => 'خولەک',
        'second'                => 'چرکە',
        'title'                 => 'ناونیشان',
        'content'               => 'ناوەڕۆک',
        'description'           => 'وەسخ',
        'excerpt'               => 'پوختە',
        'date'                  => 'بەروار',
        'time'                  => 'کات',
        'available'             => 'بەردەستە',
        'size'                  => 'قەبارە',
    ],

];