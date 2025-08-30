<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines (خطوط زبان اعتبارسنجی)
    |--------------------------------------------------------------------------
    |
    | خطوط زبان زیر حاوی پیام‌های خطای پیش‌فرض مورد استفاده توسط
    | کلاس اعتبارسنجی است. برخی از این قوانین دارای چندین نسخه مانند
    | قوانین اندازه هستند. شما آزاد هستید که هر یک از این پیام‌ها را در اینجا تغییر دهید.
    |
    */

    'accepted' => ':attribute باید پذیرفته شود.',
    'accepted_if' => 'هنگامی که :other برابر با :value است، :attribute باید پذیرفته شود.',
    'active_url' => ':attribute یک URL معتبر نیست.',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید تاریخی بعد از :date یا مساوی با آن باشد.',
    'alpha' => ':attribute فقط باید شامل حروف باشد.',
    'alpha_dash' => ':attribute فقط باید شامل حروف، اعداد، خط تیره و زیرخط باشد.',
    'alpha_num' => ':attribute فقط باید شامل حروف و اعداد باشد.',
    'array' => ':attribute باید یک آرایه باشد.',
    'ascii' => ':attribute فقط باید شامل کاراکترها و نمادهای الفبایی تک بایتی باشد.',
    'before' => ':attribute باید تاریخی قبل از :date باشد.',
    'before_or_equal' => ':attribute باید تاریخی قبل از :date یا مساوی با آن باشد.',
    'between' => [
        'array' => ':attribute باید بین :min و :max مورد داشته باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
    ],
    'boolean' => 'فیلد :attribute باید صحیح یا غلط باشد.',
    'can' => 'فیلد :attribute حاوی یک مقدار غیرمجاز است.',
    'confirmed' => 'تاییدیه :attribute مطابقت ندارد.',
    'current_password' => 'گذرواژه نادرست است.',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_equals' => ':attribute باید تاریخی برابر با :date باشد.',
    'date_format' => ':attribute با فرمت :format مطابقت ندارد.',
    'decimal' => ':attribute باید :decimal رقم اعشار داشته باشد.',
    'declined' => ':attribute باید رد شود.',
    'declined_if' => 'هنگامی که :other برابر با :value است، :attribute باید رد شود.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم باشد.',
    'dimensions' => ':attribute دارای ابعاد تصویر نامعتبر است.',
    'distinct' => 'فیلد :attribute دارای یک مقدار تکراری است.',
    'doesnt_start_with' => ':attribute نباید با یکی از موارد زیر شروع شود: :values.',
    'doesnt_end_with' => ':attribute نباید با یکی از موارد زیر خاتمه یابد: :values.',
    'email' => ':attribute باید یک آدرس ایمیل معتبر باشد.',
    'ends_with' => ':attribute باید با یکی از موارد زیر خاتمه یابد: :values.',
    'enum' => ':attribute انتخاب شده نامعتبر است.',
    'exists' => ':attribute انتخاب شده نامعتبر است.',
    'file' => ':attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید یک مقدار داشته باشد.',
    'gt' => [
        'array' => ':attribute باید بیشتر از :value مورد داشته باشد.',
        'file' => ':attribute باید بزرگتر از :value کیلوبایت باشد.',
        'numeric' => ':attribute باید بزرگتر از :value باشد.',
        'string' => ':attribute باید بیشتر از :value کاراکتر باشد.',
    ],
    'gte' => [
        'array' => ':attribute باید :value مورد یا بیشتر داشته باشد.',
        'file' => ':attribute باید بزرگتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => ':attribute باید بزرگتر یا مساوی :value باشد.',
        'string' => ':attribute باید بزرگتر یا مساوی :value کاراکتر باشد.',
    ],
    'hex_color' => 'فیلد :attribute باید یک رنگ هگزادسیمال معتبر باشد.',
    'image' => ':attribute باید یک تصویر باشد.',
    'in' => ':attribute انتخاب شده نامعتبر است.',
    'in_array' => 'فیلد :attribute در :other وجود ندارد.',
    'integer' => ':attribute باید یک عدد صحیح باشد.',
    'ip' => ':attribute باید یک آدرس IP معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => ':attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => ':attribute باید یک رشته JSON معتبر باشد.',
    'list' => ':attribute باید یک لیست باشد.',
    'lowercase' => ':attribute باید با حروف کوچک باشد.',
    'lt' => [
        'array' => ':attribute باید کمتر از :value مورد داشته باشد.',
        'file' => ':attribute باید کمتر از :value کیلوبایت باشد.',
        'numeric' => ':attribute باید کمتر از :value باشد.',
        'string' => ':attribute باید کمتر از :value کاراکتر باشد.',
    ],
    'lte' => [
        'array' => ':attribute نباید بیشتر از :value مورد داشته باشد.',
        'file' => ':attribute باید کمتر یا مساوی :value کیلوبایت باشد.',
        'numeric' => ':attribute باید کمتر یا مساوی :value باشد.',
        'string' => ':attribute باید کمتر یا مساوی :value کاراکتر باشد.',
    ],
    'mac_address' => ':attribute باید یک آدرس MAC معتبر باشد.',
    'max' => [
        'array' => ':attribute نباید بیشتر از :max مورد داشته باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'string' => ':attribute نباید بیشتر از :max کاراکتر باشد.',
    ],
    'max_digits' => ':attribute نباید بیشتر از :max رقم داشته باشد.',
    'mimes' => ':attribute باید فایلی از نوع :values باشد.',
    'mimetypes' => ':attribute باید فایلی از نوع :values باشد.',
    'min' => [
        'array' => ':attribute باید حداقل :min مورد داشته باشد.',
        'file' => ':attribute باید حداقل :min کیلوبایت باشد.',
        'numeric' => ':attribute باید حداقل :min باشد.',
        'string' => ':attribute باید حداقل :min کاراکتر باشد.',
    ],
    'min_digits' => ':attribute باید حداقل :min رقم داشته باشد.',
    'missing' => 'فیلد :attribute باید وجود نداشته باشد.',
    'missing_if' => 'فیلد :attribute در صورتی که :other برابر با :value باشد، باید وجود نداشته باشد.',
    'missing_unless' => 'فیلد :attribute باید وجود نداشته باشد، مگر اینکه :other برابر با :value باشد.',
    'missing_with' => 'فیلد :attribute در صورتی که :values موجود باشد، باید وجود نداشته باشد.',
    'missing_with_all' => 'فیلد :attribute در صورتی که :values موجود باشند، باید وجود نداشته باشد.',
    'multiple_of' => ':attribute باید مضربی از :value باشد.',
    'not_in' => ':attribute انتخاب شده نامعتبر است.',
    'not_regex' => 'فرمت :attribute نامعتبر است.',
    'numeric' => ':attribute باید یک عدد باشد.',
    'password' => [
        'letters' => ':attribute باید حداقل شامل یک حرف باشد.',
        'mixed' => ':attribute باید حداقل شامل یک حرف بزرگ و یک حرف کوچک باشد.',
        'numbers' => ':attribute باید حداقل شامل یک عدد باشد.',
        'symbols' => ':attribute باید حداقل شامل یک نماد باشد.',
        'uncompromised' => ':attribute وارد شده در یک نشت اطلاعاتی دیده شده است. لطفاً یک :attribute دیگر انتخاب کنید.',
    ],
    'present' => 'فیلد :attribute باید موجود باشد.',
    'prohibited' => 'فیلد :attribute ممنوع است.',
    'prohibited_if' => 'فیلد :attribute هنگامی که :other برابر با :value است، ممنوع است.',
    'prohibited_unless' => 'فیلد :attribute ممنوع است، مگر اینکه :other در :values باشد.',
    'prohibits' => 'فیلد :attribute، وجود :other را ممنوع می‌کند.',
    'regex' => 'فرمت :attribute نامعتبر است.',
    'required' => 'فیلد :attribute الزامی است.',
    'required_array_keys' => 'فیلد :attribute باید شامل ورودی‌هایی برای :values باشد.',
    'required_if' => 'فیلد :attribute هنگامی که :other برابر با :value است، الزامی است.',
    'required_if_accepted' => 'فیلد :attribute هنگامی که :other پذیرفته شده است، الزامی است.',
    'required_unless' => 'فیلد :attribute الزامی است، مگر اینکه :other در :values باشد.',
    'required_with' => 'فیلد :attribute هنگامی که :values موجود است، الزامی است.',
    'required_with_all' => 'فیلد :attribute هنگامی که :values موجود هستند، الزامی است.',
    'required_without' => 'فیلد :attribute هنگامی که :values موجود نیست، الزامی است.',
    'required_without_all' => 'فیلد :attribute هنگامی که هیچ یک از :values موجود نیستند، الزامی است.',
    'same' => ':attribute و :other باید مطابقت داشته باشند.',
    'size' => [
        'array' => ':attribute باید شامل :size مورد باشد.',
        'file' => ':attribute باید :size کیلوبایت باشد.',
        'numeric' => ':attribute باید :size باشد.',
        'string' => ':attribute باید :size کاراکتر باشد.',
    ],
    'starts_with' => ':attribute باید با یکی از موارد زیر شروع شود: :values.',
    'string' => ':attribute باید یک رشته باشد.',
    'timezone' => ':attribute باید یک منطقه زمانی معتبر باشد.',
    'unique' => ':attribute قبلاً انتخاب شده است.',
    'uploaded' => 'آپلود :attribute ناموفق بود.',
    'uppercase' => ':attribute باید با حروف بزرگ باشد.',
    'url' => ':attribute باید یک URL معتبر باشد.',
    'ulid' => ':attribute باید یک ULID معتبر باشد.',
    'uuid' => ':attribute باید یک UUID معتبر باشد.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines (خطوط زبان اعتبارسنجی سفارشی)
    |--------------------------------------------------------------------------
    |
    | در اینجا می‌توانید پیام‌های اعتبارسنجی سفارشی برای صفات با استفاده از
    | قرارداد "attribute.rule" برای نام‌گذاری خطوط مشخص کنید. این کار
    | مشخص کردن یک خط زبان سفارشی خاص برای یک قانون صفت معین را سریع می‌کند.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'پیام سفارشی',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes (صفات اعتبارسنجی سفارشی)
    |--------------------------------------------------------------------------
    |
    | خطوط زبان زیر برای جایگزینی جایگاه صفت ما با چیزی خواناتر
    | مانند "آدرس ایمیل" به جای "email" استفاده می‌شود. این به سادگی
    | به ما کمک می‌کند تا پیام خود را گویاتر کنیم.
    |
    */

    'attributes' => [
        'name' => 'نام',
        'username' => 'نام کاربری',
        'email' => 'آدرس ایمیل',
        'first_name' => 'نام',
        'last_name' => 'نام خانوادگی',
        'password' => 'گذرواژه',
        'password_confirmation' => 'تاییدیه گذرواژه',
        'city' => 'شهر',
        'country' => 'کشور',
        'address' => 'آدرس',
        'phone' => 'تلفن',
        'mobile' => 'تلفن همراه',
        'age' => 'سن',
        'sex' => 'جنسیت',
        'gender' => 'جنسیت',
        'day' => 'روز',
        'month' => 'ماه',
        'year' => 'سال',
        'hour' => 'ساعت',
        'minute' => 'دقیقه',
        'second' => 'ثانیه',
        'title' => 'عنوان',
        'content' => 'محتوا',
        'description' => 'توضیحات',
        'excerpt' => 'خلاصه',
        'date' => 'تاریخ',
        'time' => 'زمان',
        'available' => 'موجود',
        'size' => 'اندازه',
    ],

];
