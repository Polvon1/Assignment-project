<?php


return [
    'menu' => [
        'home' => 'Bosh sahifa',
        'how_to_work' => 'Tizim qanday ishlaydi',
        'feature' => 'Imkoniyatlar',
        'test' => 'Testlar',
        'about' => 'Loyiha haqida',
        'contact' => 'Murojaat qilish'
    ],

    'hero' => [
        'top_title' => 'Top title',
        'title' => 'ONLAYN TEST TIZIMI',
        'sub_title' => "Kadrlar barcha muammolarni hal qiladi. Xodimlaringizning bilim darajasi qanday? <br> Testlar yarating, testlarni o'tkazing va xodimlar bilimini ob'ektiv baholang",
        'get_started' => 'Ariza qoldirish'
    ],

    'how_to_work_box' => [
        'top_title' => '',
        'title' => 'Tizim qanday ishlaydi?',
        'sub_title' => ''
    ],


    'how_to_work' => [
        [
            'title' => 'Ariza<br>qoldirish',
            'description' => '',
            'icon' => 'uil uil-envelopes d-block rounded h3 mb-0',
            'img' => asset('landing/icons/how_work/1.png')
        ],
        [
            'title' => 'Tizimga<br>kirish',
            'description' => '',
            'icon' => 'uil uil-sign-out-alt d-block rounded h3 mb-0',
            'img' => asset('landing/icons/how_work/2.png')
        ],
        [
            'title' => "Testlar<br>qo'shish",
            'description' => '',
            'icon' => 'uil uil-file-plus-alt d-block rounded h3 mb-0',
            'img' => asset('landing/icons/how_work/3.png')
        ],
        [
            'title' => "Test<br>o'tkazish",
            'description' => '',
            'icon' => 'uil uil-clipboard-alt d-block rounded h3 mb-0',
            'img' => asset('landing/icons/how_work/4.png')
        ],
        [
            'title' => 'Natijalarni<br>bilish',
            'description' => '',
            'icon' => 'uil uil-award d-block rounded h3 mb-0',
            'img' => asset('landing/icons/how_work/5.png')
        ],
    ],

    'feature_box' => [
        'title' => 'Imkoniyatlar'
    ],

    'feature' => [
        [
            'title' => 'Ballar shkalasi',
            'description' => "Ballar yoki foizlar bilan o'zingizning baholash shkalalaringizni yarating",
            'icon' => asset('landing/icons/feature/1.png')
        ],
        [
            'title' => 'Test sinovi vaqti',
            'description' => 'Test sinovi vaqtini cheklash',
            'icon' => asset('landing/icons/feature/2.png')
        ],
        [
            'title' => 'Media test muharriri',
            'description' => "Rasmlar, fotosuratlar, video yoki audioni to'g'ridan-to'g'ri topshiriq matniga yuklang",
            'icon' => asset('landing/icons/feature/3.png')
        ],
        [
            'title' => 'Natijalarni eksport qilish',
            'description' => 'Test natijalarini Excelga eksport qilish',
            'icon' => asset('landing/icons/feature/4.png')
        ]
    ],

    'about' => [
        'title' => 'Loyiha haqida',

        'content' => '<p style="text-align: justify;"  class = "text-muted para-desc">
                <strong>Onlayn test tizimi </strong> - sinov jarayonini avtomatlashtirish va natijalarni qayta ishlash uchun professional vosita boʻlib, keng koʻlamli vazifalarni hal qilishga moʻljallangan. Tizim ko\'p sonli xodimlarning bilim va ko\'nikmalarini minimal vaqt va moliyaviy resurslar bilan ob\'ektiv baholash imkonini beradi.
            </p>
            <p style="text-align: justify;"  class = "text-muted para-desc">
                Tizimdan foydalanish uchun serverlar yoki boshqa qimmat kompyuterlarni sotib olishingiz shart emas. Sizga kerak bo\'lgan narsa - oddiy internetga ulangan kompyuter, noutbuk yoki smartfon. Tizimdan istalgan joyda bemalol foydalanishingiz mumkin: ishda, uyda yoki xizmat safarida.
            </p>
            <p style="text-align: justify;"  class = "text-muted para-desc">Har bir xodim professional rahbar sifatida qadrlanadi. Chunki jamoadagi barcha vazifalarni xodimlar bajaradi va ular natijani yaratadilar. Xodimning kasbiy salohiyatini rivojlantira olmagan rahbar o‘z jamoasi ishini yuqori darajaga olib chiqa olmaydi, belgilangan maqsadlarga erisha olmaydi.</p>',
       'for' => 'Tizim kim uchun?',
        'for_elements' => [
            "Davlat va xo'jalik boshqaruvi organlari",
            "Ta'lim muassasalari",
            "O'quv markazlari",
            'HR kompaniyalari',
            'Boshqa xususiy kompaniyalar',

        ],
        'box' => [
            "O'quv markazlari",
            'HR kompaniyalari',
            'Boshqa xususiy kompaniyalar',
        ]
    ],

    'application' => [
        'title' => 'Ariza qoldirish',
        'first_name' => 'Ism',
        'last_name' => 'Familiya',
        'organization' => 'Tashkilot',
        'region' => 'Region',
        'users' => 'Xodimlar soni',
        'exam_date' => 'Test sinove vaqti',
        'email' => 'E-mail manzili',
        'phone' => 'Telefon',
        'privacy' => "Tugmani bosish orqali men Foydalanuvchi shartnomasi shartlarini qabul qilaman va shaxsiy ma'lumotlarimni qayta ishlashga rozilik beraman.",
        'send' => 'Yuborish',
    ],

    'contact' => [
        'detail' => "Bog'lanish uchun ma'lumot",
        'email' => 'Elektron pochta manzil',
        'phone' => 'Telefon raqami',
        'location' => 'Manzil',
        'map' => "Xaritada ko'rish"
    ],

    'slogan' => "Biz o'rganishni o'rgatamiz",

    'category' => [
        'more' => 'Barcha testlar',
        'title' => "Kategoriya bo'yicha testlar",
        'start_testing' => 'Test sinovni boshlang'
    ]
];
