<?php
// The content of pagebrick.org, imported with "Importar o conteúdo do tema" (System → Themes) after installing in English.
// Format: see pb_import_content() in PageBrick's core/content.php. Everything here can be edited in the panel afterwards.
$repo = 'https://github.com/PageBrick/pagebrick';
$docs = "$repo/tree/main/docs/en";
$download = "$repo/releases/latest";

return [
    'media' => [
        'panel' => ['file' => 'panel.webp', 'alt' => 'The PageBrick panel, editing the home page of a site'],
    ],
    'pages' => [
        ['title' => 'Home', 'slug' => 'inicio', 'template' => 'home', 'home' => true,
            'seo_title' => 'PageBrick: the simple CMS for business websites',
            'seo_description' => 'A small, open-source CMS for company websites. Owners edit in a panel that fits on one screen, developers keep full control of the front end, and updates never break a site.',
            'data' => [
                'hero' => [
                    'title' => 'Business websites your clients can’t break.',
                    'text' => 'PageBrick is a small, open-source CMS for company websites. Owners edit texts and photos in a panel that fits on one screen. Developers keep full control of the front end. Updates check every page and undo themselves if anything breaks.',
                    'button_label' => 'Download PageBrick 1.0',
                    'button_link' => $download,
                    'image' => 'media:panel',
                ],
                'hero_secondary_label' => 'Read the docs',
                'hero_secondary_link' => $docs,
                'hero_note' => 'PHP 8.2+ · MySQL or MariaDB · Any cPanel hosting · GPL-3.0',
                'services' => [
                    'title' => 'For the people who run the business',
                    'intro' => 'Everything a company site needs, and nothing to learn.',
                    'items' => [
                        ['title' => 'Edit like a form', 'text' => 'Each page is a short form: a title, some text, a photo. The layout stays exactly as designed, whatever gets typed.'],
                        ['title' => 'Hide a section, bring back a version', 'text' => 'Sections switch off with one click. Every page keeps its last ten versions, ready to restore.'],
                        ['title' => 'Contact form and blog included', 'text' => 'Messages arrive by e-mail and stay in the panel. Spam stays out, with no captcha.'],
                        ['title' => 'Three languages', 'text' => 'English, Portuguese and Spanish, chosen at install. Each user can see the panel in their own.'],
                    ],
                ],
                'developers' => [
                    'title' => 'For the people who build the sites',
                    'text' => '<p>The front end is yours. PageBrick adds nothing you didn’t ask for: no CSS, no JavaScript, no cookies. Write plain PHP templates with any build tool, replace any plugin’s markup from your theme, or skip PHP entirely and read the content as JSON.</p>',
                    'code' => "<!-- templates/home.php -->\n<h1><?= \$page->hero->title ?></h1>\n<?php foreach (\$page->services->items as \$item): ?>\n    <h2><?= \$item->title ?></h2>\n<?php endforeach ?>\n\n# or headless, from Next.js, Astro or an app\ncurl https://example.com/api/v1/pages/about",
                    'link_label' => 'Build a theme',
                    'link' => "$docs/themes.md",
                ],
                'promise' => [
                    'title' => 'Updates that never break a site',
                    'intro' => 'Clicking Update in the panel is safe. Five guarantees, each one checked by automated tests on every release.',
                    'items' => [
                        ['title' => 'A frozen API', 'text' => 'Everything themes and plugins use is listed and versioned. Within a version, nothing is removed or changed.'],
                        ['title' => 'A frozen site', 'text' => 'A real agency site built on 1.0 must deliver the same HTML, byte for byte, on every new release.'],
                        ['title' => 'Checked before', 'text' => 'If an active plugin or the theme isn’t ready for the new version, the panel says which one and waits.'],
                        ['title' => 'Checked after', 'text' => 'The first visit after an update renders every page. If one fails, the previous version comes back on its own.'],
                        ['title' => 'Your files untouched', 'text' => 'Updates replace the core only. Themes, plugins, photos and settings stay exactly as they are.'],
                    ],
                ],
                'install' => [
                    'title' => 'Installed in five minutes',
                    'intro' => 'Upload, open the site, answer four short screens. If you have installed WordPress, you already know how.',
                    'steps' => [
                        ['title' => 'Download', 'text' => 'Get pagebrick-1.0.0.zip from GitHub.'],
                        ['title' => 'Upload', 'text' => 'Send what is inside its pagebrick folder to your hosting, with the cPanel file manager or FTP.'],
                        ['title' => 'Create a database', 'text' => 'In cPanel, the MySQL Database Wizard creates the database and its user in one go.'],
                        ['title' => 'Open your site', 'text' => 'The installer checks the server, connects to the database and creates a finished example site.'],
                    ],
                    'button_label' => 'Download PageBrick 1.0',
                    'button_link' => $download,
                ],
                'about' => ['_visible' => '0'],
                'numbers' => ['_visible' => '0'],
                'testimonials' => ['_visible' => '0'],
                'cta' => [
                    'title' => 'Free and open source',
                    'text' => 'Licensed under the GPL-3.0. Made in Brazil by Alcateia Digital and built in the open on GitHub.',
                    'button_label' => 'Star on GitHub',
                    'button_link' => $repo,
                ],
            ]],
        ['title' => 'About', 'slug' => 'sobre', 'template' => 'page',
            'seo_description' => 'Why PageBrick exists, who makes it and the principles behind it.',
            'data' => [
                'intro' => 'Most company websites need ten pages, a contact form and a way to change a phone number without calling a developer. PageBrick is built for exactly that.',
                'body' => '<h2>Why another CMS</h2><p>General-purpose systems grew to do everything, and their panels grew with them. A bakery, a law firm or a clinic doesn’t need that. They need their site to look right, stay up and be easy to update. Agencies need to build those sites quickly and know that an update won’t break them a year later.</p>'
                    . '<h2>Principles</h2><ul><li><strong>Simple for the owner.</strong> Every page is a short form. The layout can’t be broken by what gets typed.</li><li><strong>Free for the developer.</strong> The theme owns every byte of the front end, or the front end lives elsewhere and reads the content API.</li><li><strong>Safe to update.</strong> Compatibility is a promise enforced by tests, and a broken update undoes itself.</li><li><strong>Private by default.</strong> No cookies or trackers for visitors. Fonts and photos are served by the site itself.</li></ul>'
                    . '<h2>Who makes it</h2><p>PageBrick is made by Alcateia Digital, an agency in Brazil that builds websites for small and medium businesses. It is developed in the open on GitHub, and contributions are welcome.</p>'
                    . '<h2>License</h2><p>PageBrick is free software under the GNU General Public License, version 3 or later. You can use it for any site, change it and share it.</p>',
            ]],
        ['title' => 'Services', 'slug' => 'servicos', 'template' => 'services',
            'seo_description' => 'PageBrick is free. If you’d rather have someone build or look after your site, Alcateia Digital can help.',
            'data' => [
                'intro' => 'PageBrick is free to use. If you’d rather have someone do it for you, Alcateia Digital, the agency behind it, can help.',
                'items' => [
                    ['title' => 'A site built for you', 'text' => 'Your company site on PageBrick, with your brand, your texts and your photos, ready to edit.'],
                    ['title' => 'A theme for your agency', 'text' => 'A custom theme your team can reuse for its own clients, built on the standard content.'],
                    ['title' => 'Hosting and care', 'text' => 'Hosting, backups and updates handled for you, so the site just keeps working.'],
                ],
                'cta' => [
                    'title' => 'Tell us about your project',
                    'text' => 'A few lines about your company and what you need are enough to start.',
                    'button_label' => 'Get in touch',
                    'button_link' => 'page:contato',
                ],
            ]],
        ['title' => 'Contact', 'slug' => 'contato', 'template' => 'contact',
            'seo_description' => 'Questions about PageBrick, or a project in mind? Write to us.',
            'data' => [
                'intro' => 'Questions about PageBrick, or a project in mind? Write to us.',
                'body' => '<p>Found a bug or have an idea? Please <a href="' . $repo . '/issues">open an issue on GitHub</a>, so everyone can follow it.</p>',
            ]],
        ['title' => 'Privacy policy', 'slug' => 'politica-de-privacidade', 'template' => 'page',
            'data' => [
                'intro' => 'Short version: this site doesn’t track you.',
                'body' => '<h2>Who is responsible</h2><p>This site is run by Alcateia Digital, the agency that maintains PageBrick. To ask anything about your data, use the contact page.</p>'
                    . '<h2>No cookies, no trackers</h2><p>This site doesn’t set cookies in your browser and doesn’t use analytics, advertising or tracking tools. Fonts and images are served from this site.</p>'
                    . '<h2>The contact form</h2><p>If you write to us, we receive your name, e-mail address, phone number (if you give one) and message, plus the IP address the form was sent from, to stop abuse. We use them only to reply. Messages are deleted automatically after 12 months.</p>'
                    . '<h2>GitHub</h2><p>The star count at the top of the page is fetched by our server from GitHub a few times a day. Your browser only contacts GitHub if you follow a link to it.</p>'
                    . '<h2>Your rights</h2><p>You can ask to see, correct or delete your data at any time through the contact page, and we reply within 15 days. These rights are guaranteed by data protection laws such as Brazil’s LGPD and Europe’s GDPR.</p>',
            ]],
    ],
    'menus' => [
        'main' => [
            ['label' => '', 'link' => 'page:inicio'],
            ['label' => 'Docs', 'link' => $docs],
            ['label' => '', 'link' => 'page:servicos'],
            ['label' => '', 'link' => 'page:sobre'],
        ],
        'footer' => [
            ['label' => '', 'link' => 'page:sobre'],
            ['label' => '', 'link' => 'page:servicos'],
            ['label' => '', 'link' => 'page:contato'],
            ['label' => '', 'link' => 'page:politica-de-privacidade'],
            ['label' => 'GitHub', 'link' => $repo],
        ],
    ],
    'settings' => [
        'identity' => ['color' => '#d24e2b'],
        'footer' => ['text' => 'PageBrick is free software for business websites, licensed under the GPL-3.0.', 'credit' => 'show'],
        'project' => ['github' => $repo],
    ],
];
