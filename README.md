# pagebrick.org

The theme of [pagebrick.org](https://pagebrick.org), the website of [PageBrick](https://github.com/PageBrick/pagebrick), built on PageBrick itself. It is a real, complete example of a theme: layout, templates, a replaced plugin stylesheet, ready-made content in English, Portuguese and Spanish, a language switcher and a bit of motion. Licensed under the GPL-3.0, like PageBrick.

O site do PageBrick, feito no próprio PageBrick. Esta pasta guarda só o **tema** do site (`pagebrick-org/`): o CMS fica no repositório `PageBrick/pagebrick`, e o conteúdo fica no banco de dados do site. As instruções abaixo estão em português.

- `pagebrick-org/`: o tema (layout, modelos, CSS, movimentos em `assets/site.js`, textos fixos em inglês e espanhol em `lang/` e o conteúdo pronto do site, nos três idiomas, em `demo.php`).
- `pagebrick-org.zip`: o tema empacotado, pronto para enviar pelo painel. Gere de novo depois de mudar o tema (ver "Atualizar o tema").

## Publicar na HostGator (primeira vez)

1. **PHP 8.2 ou mais novo.** No cPanel, abra "MultiPHP Manager" (ou "Selecionar versão do PHP") e escolha PHP 8.2+ para pagebrick.org.
2. **HTTPS.** No cPanel, em "SSL/TLS Status", confira se o pagebrick.org tem certificado (AutoSSL). Faça a instalação já pelo endereço `https://`, porque ele vira o endereço oficial do site.
3. **Banco de dados.** No cPanel, abra "Assistente de banco de dados MySQL": crie o banco, o usuário e a senha, e marque "Todos os privilégios". Anote os três.
4. **Arquivos.** Baixe o `pagebrick-1.0.0.zip` (ou mais novo) na página de Releases do GitHub. No "Gerenciador de arquivos", entre na pasta do domínio (normalmente `public_html`), envie o .zip e extraia. Mova o **conteúdo** da pasta `pagebrick/` para a pasta do domínio, incluindo o arquivo `.htaccess` (ative "Mostrar arquivos ocultos" nas configurações do gerenciador). Apague o .zip e qualquer `index.html` antigo.
5. **Instalador.** Abra https://pagebrick.org e siga as 4 telas: escolha **English**, confira o servidor, preencha o banco e, por fim, o nome do site (`PageBrick`), o seu e-mail e uma senha forte.
6. **Tema.** No painel: System → Themes → Upload theme (.zip) → envie `pagebrick-org.zip` → **Activate** → **Import the theme's content**. Isso cria o site em inglês e as versões em português (`/pt-br`) e espanhol (`/es-es`), e transforma a página Services do exemplo em Features.
7. **E-mail.** Em System → Email, configure uma conta de e-mail da HostGator (SMTP) e use "Send a test e-mail". Assim as mensagens do formulário de contato chegam.
8. **Revisão.** Se quiser revisar com calma antes de abrir ao público, deixe o site **Under construction** no início do painel e volte para **Live** quando estiver tudo certo.

Para o painel em português: Minha conta (seu nome no topo) → Idioma do painel → Português.

## Revisar antes de publicar

Os textos estão em `demo.php` e podem ser mudados depois no painel. Confira principalmente:

- **Features**: o que o CMS oferece, em cards que giram. A Alcateia Digital só aparece na política de privacidade.
- **Privacy policy**: diz quem é o responsável pelos dados, que o site não usa cookies nem ferramentas de rastreamento e que as mensagens do formulário são apagadas depois de 12 meses (a opção padrão do plugin de contato).
- **Contact**: o formulário manda as mensagens para o e-mail do administrador.

## Atualizar o tema

Depois de mudar arquivos em `pagebrick-org/`, aumente a versão em `theme.json`, gere o .zip de novo e envie em System → Themes → Upload theme. O tema anterior fica guardado nos backups, e o botão "Roll back" volta para ele.

Para gerar o .zip, rode a partir da pasta do CMS (com o Docker de desenvolvimento ligado):

```bash
docker run --rm -v "<pasta pagebrick.org>:/site" -v "<pasta pagebrick>:/app" pagebrick-app php -r 'define("PB_ROOT", "/app"); require "/app/core/bootstrap.php"; $z = new ZipArchive; $z->open("/site/pagebrick-org.zip", ZipArchive::CREATE | ZipArchive::OVERWRITE); pb_zip_add_folder($z, "/site/pagebrick-org", "pagebrick-org"); $z->close(); pb_inspect_package("/site/pagebrick-org.zip", "theme"); echo "ok\n";'
```

## Botão do GitHub

O número de estrelas no topo vem do repositório informado em Appearance & contact → Project → GitHub repository. O servidor do site consulta o GitHub no máximo a cada 6 horas e guarda a resposta: o navegador de quem visita nunca fala com o GitHub. Enquanto o repositório não existe ou não tem estrelas, o botão aparece sem número.
