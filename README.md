# pagebrick.org

The theme of [pagebrick.org](https://pagebrick.org), the website of [PageBrick](https://github.com/PageBrick/pagebrick), built on PageBrick itself. It is a real, complete example of a theme: layout, templates, a replaced plugin stylesheet, ready-made content in English, Portuguese and Spanish, a language switcher and a bit of motion. Licensed under the MIT License, like PageBrick.

O site do PageBrick, feito no próprio PageBrick. Esta pasta guarda só o **tema** do site (`pagebrick-org/`): o CMS fica no repositório `PageBrick/pagebrick`, e o conteúdo fica no banco de dados do site. As instruções abaixo estão em português.

- `pagebrick-org/`: o tema (layout, modelos, CSS, movimentos em `assets/site.js`, textos fixos em inglês e espanhol em `lang/` e o conteúdo pronto do site, nos três idiomas, em `demo.php`).
- `pagebrick-org.zip`: o tema empacotado, pronto para enviar pelo painel. Gere de novo depois de mudar o tema (ver "Atualizar o tema").

## O visual

Fundo grafite, laranja de destaque, títulos em serifada leve, com a palavra de destaque em laranja (em pé, sem itálico), botões retangulares pequenos e cartões brancos suaves. Fontes Newsreader (títulos e números grandes, bem leve) e Inter Tight (o resto), hospedadas no próprio tema (licença OFL). No cabeçalho vai só o ícone do PageBrick; o logotipo completo fica no rodapé, ao lado da assinatura "Mantido pela" (lobo da Alcateia Digital). As linhas tracejadas (as laterais do destaque e do rodapé, as duas faixas e os círculos atrás da figura do topo) são a `.guides` e a `.hero-geo` do CSS.

Nos títulos da página inicial, uma palavra entre `*asteriscos*` aparece em laranja (função `pborg_em`). O painel avisa isso nos campos de título.

**As figuras.** No topo da página inicial há um legionário romano e, na faixa laranja do fim, um filósofo, ambos desenhados a lápis, cada um usando um notebook. O painel do PageBrick já vem aplicado na tela do notebook, em perspectiva, e existe nos três idiomas: `assets/hero-en|pt|es.webp` e `assets/closing-en|pt|es.webp` (o tema escolhe pelo idioma da página). Por isso a foto do campo "Destaque" da página inicial não é mais usada. Os cartões que "saem da tela" são HTML (`.pop` na página inicial), com os textos em `lang/`; entram com um movimento curto e depois flutuam devagar, e ficam parados para quem pediu menos movimento no sistema. A foto das colunas na faixa laranja do meio (`assets/columns.webp`) foi enviada pelos mantenedores e recolorida no laranja da faixa; ela some nas bordas para se fundir ao fundo (veja `assets/PICTURES.txt`).

## Publicar na HostGator (primeira vez)

1. **PHP 8.2 ou mais novo.** No cPanel, abra "MultiPHP Manager" (ou "Selecionar versão do PHP") e escolha PHP 8.2+ para pagebrick.org.
2. **HTTPS.** No cPanel, em "SSL/TLS Status", confira se o pagebrick.org tem certificado (AutoSSL). Faça a instalação já pelo endereço `https://`, porque ele vira o endereço oficial do site.
3. **Banco de dados.** No cPanel, abra "Assistente de banco de dados MySQL": crie o banco, o usuário e a senha, e marque "Todos os privilégios". Anote os três.
4. **Arquivos.** Baixe o `pagebrick-1.0.0.zip` (ou mais novo) na página de Releases do GitHub. No "Gerenciador de arquivos", entre na pasta do domínio (normalmente `public_html`), envie o .zip e extraia. Mova o **conteúdo** da pasta `pagebrick/` para a pasta do domínio, incluindo o arquivo `.htaccess` (ative "Mostrar arquivos ocultos" nas configurações do gerenciador). Apague o .zip e qualquer `index.html` antigo.
5. **Instalador.** Abra https://pagebrick.org e siga as 4 telas: escolha **English**, confira o servidor, preencha o banco e, por fim, o nome do site (`PageBrick`), o seu e-mail e uma senha forte.
6. **Tema.** No painel: Settings (gear icon) → Themes → Upload theme (.zip) → envie `pagebrick-org.zip` → **Activate** → **Import the theme's content**. Isso cria o site em inglês e as versões em português (`/pt-br`) e espanhol (`/es-es`), e transforma a página Services do exemplo em Features.
7. **E-mail.** Em Settings (gear icon) → Email, configure uma conta de e-mail da HostGator (SMTP) e use "Send a test e-mail". Assim as mensagens do formulário de contato chegam.
8. **Revisão.** Se quiser revisar com calma antes de abrir ao público, deixe o site **Under construction** no início do painel e volte para **Live** quando estiver tudo certo.

Para o painel em português: Minha conta (seu nome no topo) → Idioma do painel → Português.

## Revisar antes de publicar

Os textos estão em `demo.php` e podem ser mudados depois no painel. Confira principalmente:

- **Features**: o que o CMS oferece, em cards que giram.
- **Rodapé**: a assinatura "Mantido pela" (com o lobo da Alcateia Digital) abre alcateia.digital em outra aba, com `?utm=pagebrick.org`. O nome da empresa também aparece na política de privacidade.
- **Privacy policy**: diz quem é o responsável pelos dados, que o site não usa cookies nem ferramentas de rastreamento e que as mensagens do formulário são apagadas depois de 12 meses (a opção padrão do plugin de contato).
- **Contact**: o formulário manda as mensagens para o e-mail do administrador.

## Atualizar o tema

Depois de mudar arquivos em `pagebrick-org/`, aumente a versão em `theme.json`, gere o .zip de novo e envie em Settings (gear icon) → Themes → Upload theme. O tema anterior fica guardado nos backups, e o botão "Roll back" volta para ele.

**Imagens do conteúdo pronto** (`pagebrick-org/demo/`): se uma imagem mudar, troque também o nome do arquivo (e a chave em `demo.php`). Ao importar, o PageBrick reaproveita uma foto que já está na biblioteca com o mesmo nome e a mesma descrição, e o site ficaria com a imagem antiga. Por isso a imagem do painel se chama `dashboard-dark*`, e os nomes `panel*.webp` e `editor*.webp` das versões antigas não devem ser usados de novo.

Para gerar o .zip, rode a partir da pasta do CMS (com o Docker de desenvolvimento ligado):

```bash
docker run --rm -v "<pasta pagebrick.org>:/site" -v "<pasta pagebrick>:/app" pagebrick-app php -r 'define("PB_ROOT", "/app"); require "/app/core/bootstrap.php"; $z = new ZipArchive; $z->open("/site/pagebrick-org.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE); pb_zip_add_folder($z, "/site/pagebrick-org", "pagebrick-org"); $z->close(); pb_inspect_package("/site/pagebrick-org.zip", "theme"); echo "ok\n";'
```

## A linha de leitura

No lugar da barra de rolagem do navegador (escondida só quando o JavaScript do tema roda) há um fio de 2 px na borda direita da tela, que se enche de laranja conforme a página é lida. Ele é decorativo (`aria-hidden`, sem foco, sem clique); a rolagem por roda, teclado e toque continua sendo a do navegador, suave para quem não pediu menos movimento. Os blocos de código com rolagem própria mantêm uma barra fina nas mesmas cores. Para voltar à barra de sempre, apague as duas regras `html.js` e o `.scroll-line` no começo do `assets/style.css`.

## Endereço do GitHub

O topo do site não tem botão do GitHub. O endereço do repositório, em Contact → Project → GitHub repository, continua sendo usado pela página de download: se o GitHub não responder, o botão leva para a página de versões do projeto.

## Página de download

A página **Download** (`templates/download.php`) tem o botão que baixa o `pagebrick-x.y.z.zip` da versão mais nova direto do GitHub: a pessoa continua no pagebrick.org, sem passar por nenhuma página do GitHub. O número da versão e a soma de verificação (SHA-256) vêm do catálogo do projeto (`PageBrick/catalog`): o servidor do site consulta no máximo uma vez por hora e guarda a resposta, então a página não precisa ser editada quando sai uma versão nova. O botão só aceita o arquivo de release do próprio PageBrick; se o GitHub não responder, o site mostra a última versão que conheceu, e, se nunca conheceu nenhuma, o botão leva para a página de releases.

O botão **Download** do topo leva para essa página: escolha-a em Contact → Project → Download page (o link acompanha o idioma de quem visita). Os textos da página se editam no painel, como os das outras. O download vem do GitHub, e a política de privacidade diz isso.

Os ícones de linha dos cartões (e alguns outros) vêm do [Lucide](https://lucide.dev), licença ISC, em `pagebrick-org/assets/LUCIDE-LICENSE`.
