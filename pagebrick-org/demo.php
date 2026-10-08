<?php
// The content of pagebrick.org, imported with "Import the theme's content" (System → Themes) after installing in English.
// Portuguese (/pt-br) and Spanish (/es-es) come as translations and get switched on by the import.
// Format: see pb_import_content() in PageBrick's core/content.php. Everything here can be edited in the panel afterwards.
$repo = 'https://github.com/PageBrick/pagebrick';
$docs = "$repo/tree/main/docs";
$download = "$repo/releases/latest";
$code = fn(string $comment) => "<!-- templates/home.php -->\n<h1><?= \$page->hero->title ?></h1>\n<?php foreach (\$page->services->items as \$item): ?>\n    <h2><?= \$item->title ?></h2>\n<?php endforeach ?>\n\n# $comment\ncurl https://example.com/api/v1/pages/about";

return [
    'media' => [
        'panel' => ['file' => 'panel.webp', 'alt' => 'The PageBrick panel, editing the home page of a site'],
        'panel-pt' => ['file' => 'panel-pt.webp', 'alt' => 'O painel do PageBrick editando a página inicial de um site'],
        'panel-es' => ['file' => 'panel-es.webp', 'alt' => 'El panel de PageBrick editando la página de inicio de un sitio'],
    ],
    'pages' => [
        ['title' => 'Home', 'slug' => 'inicio', 'template' => 'home', 'home' => true,
            'seo_title' => 'PageBrick: the simple CMS for business websites',
            'seo_description' => 'A small, open-source CMS for company websites. Owners edit in a panel that fits on one screen, developers keep full control of the front end, and updates never break a site.',
            'data' => [
                'hero' => [
                    'title' => 'Business websites your clients can’t break.',
                    'text' => 'PageBrick is a small, open-source CMS for company websites. Owners edit texts and photos in a panel that fits on one screen. Developers keep full control of the front end. Updates check every page and undo themselves if anything breaks.',
                    'button_label' => 'Download PageBrick',
                    'button_link' => $download,
                    'image' => 'media:panel',
                ],
                'hero_secondary_label' => 'Read the docs',
                'hero_secondary_link' => "$docs/en",
                'hero_note' => 'PHP 8.2+ · MySQL or MariaDB · Any cPanel hosting · GPL-3.0',
                'hero_button_hover' => 'Free and open source',
                'cta_button_hover' => 'Help others find it',
                'services' => [
                    'title' => 'For the people who run the business',
                    'intro' => 'Everything a company site needs, and nothing to learn.',
                    'items' => [
                        ['title' => 'Edit like a form', 'text' => 'Each page is a short form: a title, some text, a photo. The layout stays exactly as designed, whatever gets typed.'],
                        ['title' => 'Hide a section, bring back a version', 'text' => 'Sections switch off with one click. Every page keeps its last ten versions, ready to restore.'],
                        ['title' => 'Contact form and blog included', 'text' => 'Messages arrive by e-mail and stay in the panel. Spam stays out, with no captcha.'],
                        ['title' => 'More than one language', 'text' => 'English, Portuguese and Spanish, for the panel and for the site. Each page can have its translations.'],
                    ],
                ],
                'developers' => [
                    'title' => 'For the people who build the sites',
                    'text' => '<p>The front end is yours. PageBrick adds nothing you didn’t ask for: no CSS, no JavaScript, no cookies. Write plain PHP templates with any build tool, replace any plugin’s markup from your theme, or skip PHP entirely and read the content as JSON.</p>',
                    'code' => $code('or headless, from Next.js, Astro or an app'),
                    'link_label' => 'Build a theme',
                    'link' => "$docs/en/themes.md",
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
                    'intro' => 'Upload, open the site, answer four short screens. No terminal, no command line.',
                    'button_hover' => 'Ready in five minutes',
                    'steps' => [
                        ['title' => 'Download', 'text' => 'Get the latest pagebrick zip from GitHub.'],
                        ['title' => 'Upload', 'text' => 'Send what is inside its pagebrick folder to your hosting, with the cPanel file manager or FTP.'],
                        ['title' => 'Create a database', 'text' => 'In cPanel, the MySQL Database Wizard creates the database and its user in one go.'],
                        ['title' => 'Open your site', 'text' => 'The installer checks the server, connects to the database and creates a finished example site.'],
                    ],
                    'button_label' => 'Download PageBrick',
                    'button_link' => $download,
                ],
                'about' => ['_visible' => '0'],
                'numbers' => ['_visible' => '0'],
                'testimonials' => ['_visible' => '0'],
                'cta' => [
                    'title' => 'Free and open source',
                    'text' => 'Licensed under the GPL-3.0. Made in Brazil and built in the open on GitHub.',
                    'button_label' => 'Star on GitHub',
                    'button_link' => $repo,
                ],
            ],
            'translations' => [
                'pt-BR' => ['title' => 'Início', 'slug' => 'inicio',
                    'seo_title' => 'PageBrick: o CMS simples para sites de empresas',
                    'seo_description' => 'Um CMS pequeno e de código aberto para sites institucionais. O dono edita num painel que cabe numa tela, o desenvolvedor tem controle total do front-end e as atualizações nunca quebram o site.',
                    'data' => [
                        'hero' => [
                            'title' => 'Sites de empresa que o cliente não consegue quebrar.',
                            'text' => 'O PageBrick é um CMS pequeno e de código aberto para sites institucionais. Quem é dono do site edita textos e fotos num painel que cabe numa tela. Quem desenvolve tem controle total do front-end. E cada atualização confere todas as páginas e se desfaz sozinha se algo quebrar.',
                            'button_label' => 'Baixar o PageBrick',
                            'button_link' => $download,
                            'image' => 'media:panel-pt',
                        ],
                        'hero_secondary_label' => 'Ler a documentação',
                        'hero_secondary_link' => "$docs/pt-BR",
                        'hero_note' => 'PHP 8.2+ · MySQL ou MariaDB · Qualquer hospedagem com cPanel · GPL-3.0',
                        'hero_button_hover' => 'Grátis e de código aberto',
                        'cta_button_hover' => 'Ajude outros a encontrar',
                        'services' => [
                            'title' => 'Para quem cuida do negócio',
                            'intro' => 'Tudo o que um site de empresa precisa, sem nada para aprender.',
                            'items' => [
                                ['title' => 'Editar como quem preenche um formulário', 'text' => 'Cada página é um formulário curto: título, texto, foto. O layout fica exatamente como foi desenhado, seja lá o que for digitado.'],
                                ['title' => 'Ocultar uma seção, voltar uma versão', 'text' => 'As seções se desligam com um clique. Cada página guarda as últimas dez versões, prontas para restaurar.'],
                                ['title' => 'Formulário de contato e blog incluídos', 'text' => 'As mensagens chegam por e-mail e ficam guardadas no painel. O spam fica de fora, sem captcha.'],
                                ['title' => 'Mais de um idioma', 'text' => 'Português, inglês e espanhol, no painel e no site. Cada página pode ter as suas traduções.'],
                            ],
                        ],
                        'developers' => [
                            'title' => 'Para quem constrói os sites',
                            'text' => '<p>O front-end é seu. O PageBrick não coloca nada que você não pediu: nada de CSS, JavaScript ou cookies. Escreva templates em PHP puro com qualquer ferramenta de build, troque o HTML de qualquer plugin pelo seu tema, ou dispense o PHP e leia o conteúdo em JSON.</p>',
                            'code' => $code('ou headless, a partir de Next.js, Astro ou um aplicativo'),
                            'link_label' => 'Criar um tema',
                            'link' => "$docs/pt-BR/temas.md",
                        ],
                        'promise' => [
                            'title' => 'Atualizações que nunca quebram um site',
                            'intro' => 'Clicar em Atualizar no painel é seguro. São cinco garantias, todas conferidas por testes automáticos a cada versão.',
                            'items' => [
                                ['title' => 'Uma API congelada', 'text' => 'Tudo o que temas e plugins usam está listado e tem versão. Dentro de uma versão, nada é removido nem muda.'],
                                ['title' => 'Um site congelado', 'text' => 'Um site real de agência feito na 1.0 precisa entregar o mesmo HTML, byte por byte, em toda versão nova.'],
                                ['title' => 'Conferido antes', 'text' => 'Se um plugin ativo ou o tema não estiver pronto para a versão nova, o painel diz qual e espera.'],
                                ['title' => 'Conferido depois', 'text' => 'A primeira visita depois da atualização abre todas as páginas. Se uma falhar, a versão anterior volta sozinha.'],
                                ['title' => 'Seus arquivos intactos', 'text' => 'A atualização troca só o núcleo. Temas, plugins, fotos e configurações ficam exatamente como estão.'],
                            ],
                        ],
                        'install' => [
                            'title' => 'Instalado em cinco minutos',
                            'intro' => 'Subir os arquivos, abrir o site e responder quatro telas curtas. Sem terminal e sem linha de comando.',
                            'button_hover' => 'Pronto em cinco minutos',
                            'steps' => [
                                ['title' => 'Baixar', 'text' => 'Pegue o zip mais recente do PageBrick no GitHub.'],
                                ['title' => 'Enviar', 'text' => 'Envie o que está dentro da pasta pagebrick para a hospedagem, pelo gerenciador de arquivos do cPanel ou por FTP.'],
                                ['title' => 'Criar um banco de dados', 'text' => 'No cPanel, o Assistente de banco de dados MySQL cria o banco e o usuário de uma vez.'],
                                ['title' => 'Abrir o site', 'text' => 'O instalador confere o servidor, conecta ao banco e cria um site de exemplo pronto.'],
                            ],
                            'button_label' => 'Baixar o PageBrick',
                            'button_link' => $download,
                        ],
                        'about' => ['_visible' => '0'],
                        'numbers' => ['_visible' => '0'],
                        'testimonials' => ['_visible' => '0'],
                        'cta' => [
                            'title' => 'Livre e de código aberto',
                            'text' => 'Licença GPL-3.0. Feito no Brasil e desenvolvido abertamente no GitHub.',
                            'button_label' => 'Dar uma estrela no GitHub',
                            'button_link' => $repo,
                        ],
                    ]],
                'es' => ['title' => 'Inicio', 'slug' => 'inicio',
                    'seo_title' => 'PageBrick: el CMS simple para sitios de empresas',
                    'seo_description' => 'Un CMS pequeño y de código abierto para sitios corporativos. El dueño edita en un panel que cabe en una pantalla, el desarrollador tiene control total del front-end y las actualizaciones nunca rompen el sitio.',
                    'data' => [
                        'hero' => [
                            'title' => 'Sitios de empresa que tus clientes no pueden romper.',
                            'text' => 'PageBrick es un CMS pequeño y de código abierto para sitios corporativos. Quien es dueño del sitio edita textos y fotos en un panel que cabe en una pantalla. Quien desarrolla tiene control total del front-end. Y cada actualización revisa todas las páginas y se deshace sola si algo falla.',
                            'button_label' => 'Descargar PageBrick',
                            'button_link' => $download,
                            'image' => 'media:panel-es',
                        ],
                        'hero_secondary_label' => 'Leer la documentación',
                        'hero_secondary_link' => "$docs/es",
                        'hero_note' => 'PHP 8.2+ · MySQL o MariaDB · Cualquier alojamiento con cPanel · GPL-3.0',
                        'hero_button_hover' => 'Gratis y de código abierto',
                        'cta_button_hover' => 'Ayuda a otros a encontrarlo',
                        'services' => [
                            'title' => 'Para quien lleva el negocio',
                            'intro' => 'Todo lo que necesita un sitio de empresa, y nada que aprender.',
                            'items' => [
                                ['title' => 'Editar como un formulario', 'text' => 'Cada página es un formulario corto: un título, un texto, una foto. El diseño queda tal como se pensó, se escriba lo que se escriba.'],
                                ['title' => 'Ocultar una sección, recuperar una versión', 'text' => 'Las secciones se apagan con un clic. Cada página guarda sus últimas diez versiones, listas para restaurar.'],
                                ['title' => 'Formulario de contacto y blog incluidos', 'text' => 'Los mensajes llegan por correo y quedan en el panel. El spam se queda afuera, sin captcha.'],
                                ['title' => 'Más de un idioma', 'text' => 'Español, inglés y portugués, en el panel y en el sitio. Cada página puede tener sus traducciones.'],
                            ],
                        ],
                        'developers' => [
                            'title' => 'Para quien construye los sitios',
                            'text' => '<p>El front-end es tuyo. PageBrick no agrega nada que no pidas: nada de CSS, JavaScript ni cookies. Escribe plantillas en PHP puro con cualquier herramienta de build, reemplaza el HTML de cualquier plugin desde tu tema, o deja PHP de lado y lee el contenido en JSON.</p>',
                            'code' => $code('o headless, desde Next.js, Astro o una app'),
                            'link_label' => 'Crear un tema',
                            'link' => "$docs/es/temas.md",
                        ],
                        'promise' => [
                            'title' => 'Actualizaciones que nunca rompen un sitio',
                            'intro' => 'Hacer clic en Actualizar en el panel es seguro. Son cinco garantías, todas comprobadas por pruebas automáticas en cada versión.',
                            'items' => [
                                ['title' => 'Una API congelada', 'text' => 'Todo lo que usan los temas y plugins está listado y versionado. Dentro de una versión, nada se quita ni cambia.'],
                                ['title' => 'Un sitio congelado', 'text' => 'Un sitio real de agencia hecho con la 1.0 debe entregar el mismo HTML, byte por byte, en cada versión nueva.'],
                                ['title' => 'Revisado antes', 'text' => 'Si un plugin activo o el tema no está listo para la versión nueva, el panel dice cuál y espera.'],
                                ['title' => 'Revisado después', 'text' => 'La primera visita tras la actualización abre todas las páginas. Si una falla, la versión anterior vuelve sola.'],
                                ['title' => 'Tus archivos intactos', 'text' => 'La actualización reemplaza solo el núcleo. Temas, plugins, fotos y configuración quedan tal como están.'],
                            ],
                        ],
                        'install' => [
                            'title' => 'Instalado en cinco minutos',
                            'intro' => 'Subir los archivos, abrir el sitio y responder cuatro pantallas cortas. Sin terminal ni línea de comandos.',
                            'button_hover' => 'Listo en cinco minutos',
                            'steps' => [
                                ['title' => 'Descargar', 'text' => 'Baja el zip más reciente de PageBrick desde GitHub.'],
                                ['title' => 'Subir', 'text' => 'Sube lo que está dentro de la carpeta pagebrick a tu alojamiento, con el administrador de archivos de cPanel o por FTP.'],
                                ['title' => 'Crear una base de datos', 'text' => 'En cPanel, el Asistente de bases de datos MySQL crea la base de datos y su usuario de una vez.'],
                                ['title' => 'Abrir tu sitio', 'text' => 'El instalador revisa el servidor, se conecta a la base de datos y crea un sitio de ejemplo listo.'],
                            ],
                            'button_label' => 'Descargar PageBrick',
                            'button_link' => $download,
                        ],
                        'about' => ['_visible' => '0'],
                        'numbers' => ['_visible' => '0'],
                        'testimonials' => ['_visible' => '0'],
                        'cta' => [
                            'title' => 'Libre y de código abierto',
                            'text' => 'Licencia GPL-3.0. Hecho en Brasil y desarrollado abiertamente en GitHub.',
                            'button_label' => 'Dar una estrella en GitHub',
                            'button_link' => $repo,
                        ],
                    ]],
            ]],
        ['title' => 'About', 'slug' => 'sobre', 'template' => 'page',
            'seo_description' => 'Why PageBrick exists, who makes it and the principles behind it.',
            'data' => [
                'intro' => 'Most company websites need ten pages, a contact form and a way to change a phone number without calling a developer. PageBrick is built for exactly that.',
                'body' => '<h2>Why another CMS</h2><p>General-purpose systems grew to do everything, and their panels grew with them. A bakery, a law firm or a clinic doesn’t need that. They need their site to look right, stay up and be easy to update. Agencies need to build those sites quickly and know that an update won’t break them a year later.</p>'
                    . '<h2>Principles</h2><ul><li><strong>Simple for the owner.</strong> Every page is a short form. The layout can’t be broken by what gets typed.</li><li><strong>Free for the developer.</strong> The theme owns every byte of the front end, or the front end lives elsewhere and reads the content API.</li><li><strong>Safe to update.</strong> Compatibility is a promise enforced by tests, and a broken update undoes itself.</li><li><strong>Private by default.</strong> No cookies or trackers for visitors. Fonts and photos are served by the site itself.</li></ul>'
                    . '<h2>How it is made</h2><p>PageBrick is made in Brazil and developed in the open on GitHub. Anyone can read the code, report a problem or suggest an improvement, and contributions are welcome.</p>'
                    . '<h2>License</h2><p>PageBrick is free software under the GNU General Public License, version 3 or later. You can use it for any site, change it and share it.</p>',
            ],
            'translations' => [
                'pt-BR' => ['title' => 'Sobre', 'slug' => 'sobre',
                    'seo_description' => 'Por que o PageBrick existe, quem faz e os princípios por trás dele.',
                    'data' => [
                        'intro' => 'A maioria dos sites de empresa precisa de dez páginas, um formulário de contato e um jeito de trocar o telefone sem ligar para o desenvolvedor. O PageBrick foi feito exatamente para isso.',
                        'body' => '<h2>Por que mais um CMS</h2><p>Os sistemas de uso geral cresceram para fazer de tudo, e os painéis cresceram junto. Uma padaria, um escritório de advocacia ou uma clínica não precisam disso. Eles precisam que o site fique bonito, fique no ar e seja fácil de atualizar. E as agências precisam montar esses sites rápido e saber que uma atualização não vai quebrá-los daqui a um ano.</p>'
                            . '<h2>Princípios</h2><ul><li><strong>Simples para quem é dono.</strong> Cada página é um formulário curto. O que for digitado não quebra o layout.</li><li><strong>Livre para quem desenvolve.</strong> O tema é dono de cada byte do front-end, ou o front-end fica em outro lugar e lê a API de conteúdo.</li><li><strong>Seguro de atualizar.</strong> A compatibilidade é uma promessa garantida por testes, e uma atualização que quebra se desfaz sozinha.</li><li><strong>Privado por padrão.</strong> Nada de cookies ou rastreadores para quem visita. Fontes e fotos vêm do próprio site.</li></ul>'
                            . '<h2>Como é feito</h2><p>O PageBrick é feito no Brasil e desenvolvido abertamente no GitHub. Qualquer pessoa pode ler o código, relatar um problema ou sugerir uma melhoria, e contribuições são bem-vindas.</p>'
                            . '<h2>Licença</h2><p>O PageBrick é software livre, sob a GNU General Public License, versão 3 ou posterior. Você pode usar em qualquer site, modificar e compartilhar.</p>',
                    ]],
                'es' => ['title' => 'Nosotros', 'slug' => 'nosotros',
                    'seo_description' => 'Por qué existe PageBrick, quién lo hace y los principios detrás de él.',
                    'data' => [
                        'intro' => 'La mayoría de los sitios de empresa necesitan diez páginas, un formulario de contacto y una forma de cambiar el teléfono sin llamar a un desarrollador. PageBrick está hecho justo para eso.',
                        'body' => '<h2>Por qué otro CMS</h2><p>Los sistemas de uso general crecieron para hacer de todo, y sus paneles crecieron con ellos. Una panadería, un estudio jurídico o una clínica no necesitan eso. Necesitan que su sitio se vea bien, esté en línea y sea fácil de actualizar. Y las agencias necesitan armar esos sitios rápido y saber que una actualización no los va a romper dentro de un año.</p>'
                            . '<h2>Principios</h2><ul><li><strong>Simple para el dueño.</strong> Cada página es un formulario corto. Lo que se escriba no rompe el diseño.</li><li><strong>Libre para el desarrollador.</strong> El tema es dueño de cada byte del front-end, o el front-end vive en otro lugar y lee la API de contenido.</li><li><strong>Seguro de actualizar.</strong> La compatibilidad es una promesa garantizada por pruebas, y una actualización que falla se deshace sola.</li><li><strong>Privado por defecto.</strong> Sin cookies ni rastreadores para los visitantes. Las fuentes y las fotos las sirve el propio sitio.</li></ul>'
                            . '<h2>Cómo se hace</h2><p>PageBrick se hace en Brasil y se desarrolla abiertamente en GitHub. Cualquiera puede leer el código, reportar un problema o sugerir una mejora, y las contribuciones son bienvenidas.</p>'
                            . '<h2>Licencia</h2><p>PageBrick es software libre bajo la GNU General Public License, versión 3 o posterior. Puedes usarlo en cualquier sitio, modificarlo y compartirlo.</p>',
                    ]],
            ]],
        // Takes the place of the standard Services page, at its own address. Card order follows the mosaic: big first.
        ['title' => 'Features', 'slug' => 'features', 'replaces' => 'servicos', 'template' => 'features',
            'seo_description' => 'What PageBrick gives you: a panel anyone can use, themes without limits, updates that don’t break the site, several languages and a content API.',
            'data' => [
                'intro' => 'Everything a business website needs, in a CMS that is free, open source and runs on ordinary hosting.',
                'items' => [
                    ['title' => 'Updates that don’t break', 'summary' => 'Tested page by page, rolled back on their own', 'text' => 'Every update is signed, backed up and tested against every page of your site. If one page fails, the previous version comes back on its own.'],
                    ['title' => 'More than one language', 'summary' => 'English, Portuguese and Spanish', 'text' => 'The panel speaks English, Portuguese and Spanish. A site can too, with its own addresses like /pt-br and /es-es and the tags search engines need.'],
                    ['title' => 'A content API', 'summary' => 'Your content as JSON', 'text' => 'The same content as JSON, read-only, for an app or a front end in another stack. No extra setup.'],
                    ['title' => 'A panel anyone can use', 'summary' => 'Fields made for each section', 'text' => 'Each page has fields made for its sections: titles, texts, photos and buttons. Drafts, preview and history come with every page.'],
                    ['title' => 'Your front end, your way', 'summary' => 'Plain PHP, HTML and CSS', 'text' => 'Themes are plain PHP, HTML and CSS. Use any design, framework or build tool; the panel never rewrites your markup.'],
                    ['title' => 'Plugins included', 'summary' => 'Contact form and blog', 'text' => 'A contact form that stops spam without a captcha, and a blog with categories. Write your own with hooks, routes and panel screens.'],
                    ['title' => 'A contract that holds', 'summary' => 'Stable within each major version', 'text' => 'Content fields and theme functions don’t change within a major version, and automated tests check that. A theme written today keeps working.'],
                    ['title' => 'Photos and SEO handled', 'summary' => 'WebP, titles and sitemap', 'text' => 'Photos are resized and saved as WebP. Every page gets its title, description and place in the sitemap.'],
                    ['title' => 'Installs in minutes', 'summary' => 'Four short screens', 'text' => 'Upload the files, open the site and answer four short screens. Any cPanel hosting with PHP 8.2 and MySQL or MariaDB will do.'],
                ],
                'cta' => [
                    'title' => 'Try it on your hosting',
                    'text' => 'Download the latest version and have a site running in a few minutes. It is free, under the GPL-3.0.',
                    'button_label' => 'Download PageBrick',
                    'button_hover' => 'No account, no license key',
                    'button_link' => $download,
                ],
            ],
            'translations' => [
                'pt-BR' => ['title' => 'Recursos', 'slug' => 'recursos',
                    'seo_description' => 'O que o PageBrick oferece: um painel que qualquer pessoa usa, temas sem limites, atualizações que não quebram o site, vários idiomas e uma API de conteúdo.',
                    'data' => [
                        'intro' => 'Tudo o que um site de empresa precisa, num CMS gratuito, de código aberto e que roda em hospedagem comum.',
                        'items' => [
                            ['title' => 'Atualizações que não quebram', 'summary' => 'Testadas página por página, com volta automática', 'text' => 'Toda atualização é assinada, ganha backup e é testada em todas as páginas do seu site. Se uma página falhar, a versão anterior volta sozinha.'],
                            ['title' => 'Mais de um idioma', 'summary' => 'Português, inglês e espanhol', 'text' => 'O painel fala português, inglês e espanhol. O site também pode falar, com endereços próprios como /pt-br e /es-es e as marcações que os buscadores pedem.'],
                            ['title' => 'Uma API de conteúdo', 'summary' => 'O seu conteúdo em JSON', 'text' => 'O mesmo conteúdo em JSON, só leitura, para um aplicativo ou um front end em outra tecnologia. Sem configuração extra.'],
                            ['title' => 'Um painel que qualquer pessoa usa', 'summary' => 'Campos feitos para cada seção', 'text' => 'Cada página tem campos feitos para as suas seções: títulos, textos, fotos e botões. Rascunho, prévia e histórico vêm em todas as páginas.'],
                            ['title' => 'O seu front end, do seu jeito', 'summary' => 'PHP, HTML e CSS puros', 'text' => 'Temas são PHP, HTML e CSS puros. Use qualquer design, framework ou ferramenta de build; o painel nunca reescreve o seu HTML.'],
                            ['title' => 'Plugins inclusos', 'summary' => 'Formulário de contato e blog', 'text' => 'Um formulário de contato que barra spam sem captcha e um blog com categorias. Crie os seus com ganchos, rotas e telas no painel.'],
                            ['title' => 'Um contrato que se mantém', 'summary' => 'Estável em cada versão principal', 'text' => 'Os campos de conteúdo e as funções de tema não mudam dentro de uma versão principal, e testes automáticos conferem isso. Um tema feito hoje continua funcionando.'],
                            ['title' => 'Fotos e SEO resolvidos', 'summary' => 'WebP, títulos e sitemap', 'text' => 'As fotos são redimensionadas e salvas em WebP. Cada página ganha título, descrição e lugar no sitemap.'],
                            ['title' => 'Instala em minutos', 'summary' => 'Quatro telas curtas', 'text' => 'Suba os arquivos, abra o site e responda quatro telas curtas. Qualquer hospedagem com cPanel, PHP 8.2 e MySQL ou MariaDB serve.'],
                        ],
                        'cta' => [
                            'title' => 'Experimente na sua hospedagem',
                            'text' => 'Baixe a versão mais recente e tenha um site no ar em poucos minutos. É gratuito, sob a licença GPL-3.0.',
                            'button_label' => 'Baixar o PageBrick',
                            'button_hover' => 'Sem cadastro, sem licença',
                            'button_link' => $download,
                        ],
                    ]],
                'es' => ['title' => 'Funciones', 'slug' => 'funciones',
                    'seo_description' => 'Lo que PageBrick ofrece: un panel que cualquiera usa, temas sin límites, actualizaciones que no rompen el sitio, varios idiomas y una API de contenido.',
                    'data' => [
                        'intro' => 'Todo lo que necesita el sitio de una empresa, en un CMS gratis, de código abierto y que funciona en un alojamiento común.',
                        'items' => [
                            ['title' => 'Actualizaciones que no rompen', 'summary' => 'Probadas página por página, con vuelta atrás automática', 'text' => 'Cada actualización está firmada, tiene copia de seguridad y se prueba en todas las páginas de tu sitio. Si una página falla, la versión anterior vuelve sola.'],
                            ['title' => 'Más de un idioma', 'summary' => 'Español, inglés y portugués', 'text' => 'El panel habla español, inglés y portugués. El sitio también puede, con direcciones propias como /pt-br y /es-es y las etiquetas que piden los buscadores.'],
                            ['title' => 'Una API de contenido', 'summary' => 'Tu contenido en JSON', 'text' => 'El mismo contenido en JSON, solo lectura, para una app o un front end en otra tecnología. Sin configuración extra.'],
                            ['title' => 'Un panel que cualquiera usa', 'summary' => 'Campos hechos para cada sección', 'text' => 'Cada página tiene campos hechos para sus secciones: títulos, textos, fotos y botones. Borradores, vista previa e historial vienen en todas las páginas.'],
                            ['title' => 'Tu front end, a tu manera', 'summary' => 'PHP, HTML y CSS puros', 'text' => 'Los temas son PHP, HTML y CSS puros. Usa cualquier diseño, framework o herramienta de build; el panel nunca reescribe tu HTML.'],
                            ['title' => 'Plugins incluidos', 'summary' => 'Formulario de contacto y blog', 'text' => 'Un formulario de contacto que frena el spam sin captcha y un blog con categorías. Crea los tuyos con hooks, rutas y pantallas en el panel.'],
                            ['title' => 'Un contrato que se cumple', 'summary' => 'Estable en cada versión principal', 'text' => 'Los campos de contenido y las funciones de tema no cambian dentro de una versión principal, y pruebas automáticas lo comprueban. Un tema hecho hoy sigue funcionando.'],
                            ['title' => 'Fotos y SEO resueltos', 'summary' => 'WebP, títulos y sitemap', 'text' => 'Las fotos se redimensionan y se guardan en WebP. Cada página recibe su título, descripción y lugar en el sitemap.'],
                            ['title' => 'Se instala en minutos', 'summary' => 'Cuatro pantallas cortas', 'text' => 'Sube los archivos, abre el sitio y responde cuatro pantallas cortas. Sirve cualquier alojamiento con cPanel, PHP 8.2 y MySQL o MariaDB.'],
                        ],
                        'cta' => [
                            'title' => 'Pruébalo en tu alojamiento',
                            'text' => 'Descarga la versión más reciente y ten un sitio funcionando en pocos minutos. Es gratis, bajo la licencia GPL-3.0.',
                            'button_label' => 'Descargar PageBrick',
                            'button_hover' => 'Sin registro, sin licencia',
                            'button_link' => $download,
                        ],
                    ]],
            ]],
        ['title' => 'Contact', 'slug' => 'contato', 'template' => 'contact',
            'seo_description' => 'Questions about PageBrick, or a project in mind? Write to us.',
            'data' => [
                'intro' => 'Questions about PageBrick, or a project in mind? Write to us.',
                'body' => '<p>Found a bug or have an idea? Please <a href="' . $repo . '/issues">open an issue on GitHub</a>, so everyone can follow it.</p>',
            ],
            'translations' => [
                'pt-BR' => ['title' => 'Contato', 'slug' => 'contato',
                    'seo_description' => 'Dúvidas sobre o PageBrick ou um projeto em mente? Escreva para a gente.',
                    'data' => [
                        'intro' => 'Dúvidas sobre o PageBrick ou um projeto em mente? Escreva para a gente.',
                        'body' => '<p>Achou um erro ou tem uma ideia? <a href="' . $repo . '/issues">Abra uma issue no GitHub</a>, assim todo mundo acompanha.</p>',
                    ]],
                'es' => ['title' => 'Contacto', 'slug' => 'contacto',
                    'seo_description' => '¿Preguntas sobre PageBrick o un proyecto en mente? Escríbenos.',
                    'data' => [
                        'intro' => '¿Preguntas sobre PageBrick o un proyecto en mente? Escríbenos.',
                        'body' => '<p>¿Encontraste un error o tienes una idea? <a href="' . $repo . '/issues">Abre un issue en GitHub</a>, así todos pueden seguirlo.</p>',
                    ]],
            ]],
        ['title' => 'Privacy policy', 'slug' => 'politica-de-privacidade', 'template' => 'page',
            'data' => [
                'intro' => 'Short version: this site doesn’t track you.',
                'body' => '<h2>Who is responsible</h2><p>This site is run by Alcateia Digital, the agency that maintains PageBrick. To ask anything about your data, use the contact page.</p>'
                    . '<h2>No cookies, no trackers</h2><p>This site doesn’t set cookies in your browser and doesn’t use analytics, advertising or tracking tools. Fonts and images are served from this site.</p>'
                    . '<h2>The contact form</h2><p>If you write to us, we receive your name, e-mail address, phone number (if you give one) and message, plus the IP address the form was sent from, to stop abuse. We use them only to reply. Messages are deleted automatically after 12 months.</p>'
                    . '<h2>GitHub</h2><p>The star count at the top of the page is fetched by our server from GitHub a few times a day. Your browser only contacts GitHub if you follow a link to it.</p>'
                    . '<h2>Your rights</h2><p>You can ask to see, correct or delete your data at any time through the contact page, and we reply within 15 days. These rights are guaranteed by data protection laws such as Brazil’s LGPD and Europe’s GDPR.</p>',
            ],
            'translations' => [
                'pt-BR' => ['title' => 'Política de privacidade', 'slug' => 'politica-de-privacidade',
                    'data' => [
                        'intro' => 'Versão curta: este site não rastreia você.',
                        'body' => '<h2>Quem é o responsável</h2><p>Este site é mantido pela Alcateia Digital, a agência que mantém o PageBrick. Para perguntar qualquer coisa sobre os seus dados, use a página de contato.</p>'
                            . '<h2>Sem cookies, sem rastreadores</h2><p>Este site não coloca cookies no seu navegador e não usa ferramentas de estatística, publicidade ou rastreamento. Fontes e imagens vêm do próprio site.</p>'
                            . '<h2>O formulário de contato</h2><p>Se você escrever para a gente, recebemos seu nome, e-mail, telefone (se informar) e a mensagem, além do endereço IP de onde o formulário foi enviado, para evitar abusos. Usamos esses dados só para responder. As mensagens são apagadas automaticamente depois de 12 meses.</p>'
                            . '<h2>GitHub</h2><p>O número de estrelas no topo da página é buscado pelo nosso servidor no GitHub algumas vezes por dia. O seu navegador só fala com o GitHub se você clicar num link para lá.</p>'
                            . '<h2>Seus direitos</h2><p>Você pode pedir a qualquer momento para ver, corrigir ou apagar os seus dados pela página de contato, e respondemos em até 15 dias. Esses direitos são garantidos pela LGPD.</p>',
                    ]],
                'es' => ['title' => 'Política de privacidad', 'slug' => 'politica-de-privacidad',
                    'data' => [
                        'intro' => 'Versión corta: este sitio no te rastrea.',
                        'body' => '<h2>Quién es el responsable</h2><p>Este sitio lo mantiene Alcateia Digital, la agencia que mantiene PageBrick. Para preguntar cualquier cosa sobre tus datos, usa la página de contacto.</p>'
                            . '<h2>Sin cookies ni rastreadores</h2><p>Este sitio no guarda cookies en tu navegador y no usa herramientas de estadísticas, publicidad ni rastreo. Las fuentes y las imágenes las sirve el propio sitio.</p>'
                            . '<h2>El formulario de contacto</h2><p>Si nos escribes, recibimos tu nombre, correo, teléfono (si lo das) y mensaje, además de la dirección IP desde donde se envió el formulario, para evitar abusos. Los usamos solo para responderte. Los mensajes se eliminan automáticamente después de 12 meses.</p>'
                            . '<h2>GitHub</h2><p>Nuestro servidor consulta en GitHub, algunas veces al día, el número de estrellas que aparece arriba. Tu navegador solo se conecta con GitHub si sigues un enlace hacia allá.</p>'
                            . '<h2>Tus derechos</h2><p>Puedes pedir en cualquier momento ver, corregir o eliminar tus datos desde la página de contacto, y respondemos en un plazo de 15 días. Estos derechos están garantizados por leyes de protección de datos como la LGPD de Brasil y el RGPD europeo.</p>',
                    ]],
            ]],
    ],
    'menus' => [
        'main' => [
            ['label' => '', 'link' => 'page:inicio'],
            ['label' => 'Docs', 'link' => "$docs/en"],
            ['label' => '', 'link' => 'page:features'],
            ['label' => '', 'link' => 'page:sobre'],
        ],
        'footer' => [
            ['label' => '', 'link' => 'page:sobre'],
            ['label' => '', 'link' => 'page:features'],
            ['label' => '', 'link' => 'page:contato'],
            ['label' => '', 'link' => 'page:politica-de-privacidade'],
            ['label' => 'GitHub', 'link' => $repo],
        ],
    ],
    'settings' => [
        'identity' => ['color' => '#d24e2b'],
        'footer' => ['text' => 'PageBrick is free software for websites, licensed under the GPL-3.0.', 'credit' => 'show'],
        'project' => ['github' => $repo],
    ],
    'settings_translations' => [
        'pt-BR' => ['footer' => ['text' => 'O PageBrick é software livre para sites, sob a licença GPL-3.0.']],
        'es' => ['footer' => ['text' => 'PageBrick es software libre para sitios web, bajo la licencia GPL-3.0.']],
    ],
];
