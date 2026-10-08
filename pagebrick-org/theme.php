<?php
// The pagebrick.org theme: the project's own website, built on PageBrick like any other site.
// It adds to the standard content the home page sections a product site needs, and the GitHub link of the header.
require_once __DIR__ . '/functions.php';

$list = fn(string $label, string $item, string $add, array $fields) => ['type' => 'list', 'label' => $label, 'item_label' => $item, 'add_label' => $add, 'fields' => $fields];
$items = [
    'title' => ['type' => 'text', 'label' => __('Título')],
    'text' => ['type' => 'textarea', 'label' => __('Texto')],
];

return [
    'templates' => [
        'home' => ['fields' => [
            'hero_secondary_label' => ['type' => 'text', 'label' => __('Texto do segundo botão do destaque')],
            'hero_secondary_link' => ['type' => 'link', 'label' => __('O segundo botão leva para')],
            'hero_note' => ['type' => 'text', 'label' => __('Linha embaixo dos botões'), 'help' => __('Fatos curtos separados por ·, por exemplo: PHP 8.2 · MySQL · GPL-3.0')],
            'developers' => ['type' => 'group', 'label' => __('Para desenvolvedores'), 'toggle' => true, 'fields' => [
                'title' => ['type' => 'text', 'label' => __('Título')],
                'text' => ['type' => 'richtext', 'label' => __('Texto')],
                'code' => ['type' => 'textarea', 'label' => __('Exemplo de código')],
                'link_label' => ['type' => 'text', 'label' => __('Texto do link')],
                'link' => ['type' => 'link', 'label' => __('O link leva para')],
            ]],
            'promise' => ['type' => 'group', 'label' => __('A promessa'), 'toggle' => true, 'fields' => [
                'title' => ['type' => 'text', 'label' => __('Título')],
                'intro' => ['type' => 'textarea', 'label' => __('Introdução')],
                'items' => $list(__('Garantias'), __('Garantia'), __('Adicionar garantia'), $items),
            ]],
            'install' => ['type' => 'group', 'label' => __('Instalação'), 'toggle' => true, 'fields' => [
                'title' => ['type' => 'text', 'label' => __('Título')],
                'intro' => ['type' => 'textarea', 'label' => __('Introdução')],
                'steps' => $list(__('Passos'), __('Passo'), __('Adicionar passo'), $items),
                'button_label' => ['type' => 'text', 'label' => __('Texto do botão')],
                'button_link' => ['type' => 'link', 'label' => __('O botão leva para')],
            ]],
        ]],
    ],
    'settings' => [
        'project' => ['type' => 'group', 'label' => __('Projeto'), 'fields' => [
            'github' => ['type' => 'url', 'label' => __('Repositório no GitHub'), 'help' => __('Mostra no topo o botão do GitHub com o número de estrelas.')],
        ]],
    ],
];
