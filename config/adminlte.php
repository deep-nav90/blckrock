<?php

return [

    'admin_url' => env('ADMIN_URL'),
    'website_url' => env('WEBSITE_URL'),
    'email_verify_url' => env('EMAIL_VERIFY_URL'),
    'email_verify_url_mobile' => env('EMAIL_VERIFY_URL_MOBILE'),
    'default_avatar' => env('DEFAULT_AVATAR'),
    'from_email' => env('FROM_EMAIL', 'admin@centralmotor.com'),
    'logo_path' => env('LOGO_PATH'),
    'ticket_images_path' => env('TICKET_IMAGES_PATH'),

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'image_tooltip' => 'Upload max 2 MB file. Only .jpg .svg and .png files are allowed to upload.',
    'docs_tooltip' => 'Upload max 2 MB file. Only .jpg .gif .png .svg .doc .docx .xls .xlsx .ods .pdf files are allowed to upload.',
    'whichvocation' => 'Central Motor',
    'set_password' => 'Central Motor Approved | Set Password',
    'title_prefix' => '',
    'title_postfix' => '',

    'title' => 'Central Motor',
    'title_prefix' => '',
    'title_postfix' => '',

    'ticket_acknowledgement_subject' => 'Central Motor Ticket Updates',
    'ticket_acknowledgement_message_sender' => 'You have replied to a ticket',
    'ticket_acknowledgement_message_receiver' => 'You have received a new message on a ticket',
    'thanks_footer' => 'Thank you for using our application!',
    'not_clickable_message' => 'If you’re having trouble clicking the button, copy and paste the URL below into your web browser:',
    'copyright' => 'Copyright © 2021 Central Motor',
    'hello' => 'Hello!',
    'view_ticket' => 'View Ticket',
    'regards' => 'Regards',
    'team' => 'Team',
    'title' => 'Central Motor',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b></b>',
    // 'logo_img' => 'images/logo.svg',
    'logo_img' => 'images/Logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Central Motor',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin/dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [

        [
            'text' => 'dashboard',
            'url'  => 'admin/dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],

        ['header' => 'management'],

        [
            'text' => 'User Management',
            'icon' => 'fas fa-users',
            'active' => ['admin/users*'],
            'can' => ['view_user', 'block_unblock_user', 'delete_user', 'add_admin', 'view_admin', 'edit_admin', 'delete_admin'],
            'submenu' => [
                [
                    'text' => 'Users',
                    'icon' => 'fas fa-user-friends',
                    'url'  => 'admin/users/list',
                    'active' => ['admin/users*'],
                    'can' => ['view_user', 'block_unblock_user', 'delete_user'],
                ],
                [
                    'text' => 'admins',
                    'icon' => 'fas fa-user-shield',
                    'url'  => 'admin/admins/list',
                    'active' => ['admin/admins*'],
                    'can' => ['add_admin', 'view_admin', 'edit_admin', 'delete_admin'],

                ],
            ],
        ],

        [
            'text' => 'Category Management',
            'icon' => 'fas fa-paper-plane',
            'active' => ['admin/categories*'],
            'can' => ['view_category','delete_category','add_category','edit_category', 'view_sub_category','delete_sub_category','add_sub_category','edit_sub_category'],
            'submenu' => [
                [
                    'text' => 'Categories',
                    'icon' => 'fas fa-paper-plane',
                    'url'  => 'admin/categories/list',
                    'active' => ['admin/categories*'],
                    'can' => ['view_category','delete_category','add_category','edit_category'],

                ],
                [
                    'text' => 'Sub-categories',
                    'icon' => 'fas fa-venus',
                    'url'  => 'admin/sub-categories/list',
                    'active' => ['admin/sub-categories*'],
                    'can' => ['view_sub_category','delete_sub_category','add_sub_category','edit_sub_category'],

                ],

            ],
        ],


        [
            'text' => 'Attribute Management',
            'icon' => 'fas fa-won-sign',
            'active' => ['admin/attributes*'],
            'can' => ['view_attribute','delete_attribute','add_attribute','edit_attribute'],
            'submenu' => [
                [
                    'text' => 'Attributes',
                    'icon' => 'fas fa-won-sign',
                    'url'  => 'admin/attributes/list',
                    'active' => ['admin/attributes*'],
                    'can' => ['view_attribute','delete_attribute','add_attribute','edit_attribute'],

                ],
                

            ],
        ],

        [
            'text' => 'Coupon Management',
            'icon' => 'fab fa-cc-discover',
            'active' => ['admin/coupons*'],
            'can' => ['view_coupon','delete_coupon','add_coupon','edit_coupon'],
            'submenu' => [
                [
                    'text' => 'Coupons',
                    'icon' => 'fab fa-cc-discover',
                    'url'  => 'admin/coupons/list',
                    'active' => ['admin/coupons*'],
                    'can' => ['view_coupon','delete_coupon','add_coupon','edit_coupon'],

                ],
                

            ],
        ],



        [
            'text' => 'Product Management',
            'icon' => 'fas fa-suitcase',
            'url'  => '#',
            'can' => ['view_product','delete_product','add_product','edit_product'],
            'submenu' => [
                [
                    'text' => 'Products',
                    'icon' => 'fas fa-suitcase',
                    'url'  => 'admin/products/list',
                    'active' => ['admin/products*'],
                    'can' => ['view_product','delete_product','add_product','edit_product'],
                ],
            ]
        ],


        [
            'text' => 'Order Management',
            'icon' => 'fas fa-suitcase',
            'url'  => '#',
            'can' => ['view_order','accept_order','reject_order','complete_order','payment_received'],
            'submenu' => [
                [
                    'text' => 'Orders',
                    'icon' => 'fas fa-suitcase',
                    'url'  => 'admin/orders/list',
                    'active' => ['admin/orders*'],
                    'can' => ['view_order','accept_order','reject_order','complete_order','payment_received'],
                ],
            ]
        ],

        [
            'text' => 'Payment Management',
            'icon' => 'fas fa-rupee-sign',
            'url'  => '#',
            'can' => ['view_payment'],
            'submenu' => [
                [
                    'text' => 'Payments',
                    'icon' => 'fas fa-rupee-sign',
                    'url'  => 'admin/payments/list',
                    'active' => ['admin/payments*'],
                    'can' => ['view_payment'],
                ],
            ]
        ],

        [
            'text' => 'Our Client Management',
            'icon' => 'fas fa-users',
            'active' => ['admin/our-clients*'],
            'can' => ['view_our_client','delete_our_client','add_our_client','edit_our_client'],
            'submenu' => [
                [
                    'text' => 'Our Clients',
                    'icon' => 'fas fa-users',
                    'url'  => 'admin/our-clients/list',
                    'active' => ['admin/our-clients*'],
                    'can' => ['view_our_client','delete_our_client','add_our_client','edit_our_client'],

                ],
                

            ],
        ],

        [
            'text' => 'Contact Us',
            'icon' => 'fas fa-users',
            'active' => ['admin/contact-us*'],
            'can' => ['view_contact_us','delete_contact_us','reply_contact_us'],
            'submenu' => [
                [
                    'text' => 'Contact Us',
                    'icon' => 'fas fa-users',
                    'url'  => 'admin/contact-us/list',
                    'active' => ['admin/contact-us*'],
                    'can' => ['view_contact_us','delete_contact_us','reply_contact_us'],

                ],
                

            ],
        ],



        [
            'text' => 'access_control',
            'icon'    => 'fas fa-users-cog',
            'url'  => '#',
            'active' => ['admin/roles*'],
            'can' => ['view_role', 'add_permissions'],
            'submenu' => [
                [
                    'text' => 'roles',
                    'icon'    => 'fas fa-user-tag',
                    'url'  => 'admin/roles/list',
                    'active' => ['admin/roles/list*', 'admin/roles/add*', 'admin/roles/edit*', 'admin/roles/view*'],
                    'can' => ['view_role','delete_role','add_role','edit_role'],
                ],
                [
                    'text' => 'permissions',
                    'icon'    => 'fas fa-key',
                    'url'  => 'admin/roles/role_permissions',
                    'active' => ['admin/roles/role_permissions*'],
                    'can' => ['add_permissions']
                ]
            ],
        ],


        


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'DateRangePicker' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/daterangepicker/daterangepicker.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
