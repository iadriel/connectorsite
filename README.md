# Connector Site

### Cores do site

As cores dos elementos são em sua maioria definida pelas seguintes class adicionadas ao body:
- `.yellow-theme`
- `.magenta-theme`
- `.green-theme`

(ver os arquivos dentro de `_layout` para exemplo)

O CSS responsável por elas é o `/scss/_theme.scss`. Dentro dele existem diversas mixins que servem para mudar as cores dos elementos. Por isso caso queira trocar as cores dos elementos basta editar ou adicionar novas mixins.
Na falta das classes de tema no body, a cor "magenta" será utilizada como default.

# Hero

### Para adicionar video

Dentro do hero adicione o element <video></video>

### Aspect ratio

Para adicionar aspect-ratio aos videos, adicione essas classes no elemento pai do video:

- .aspect-16-9
- .aspect-4-3
- .aspect-3-2
- .aspect-8-5

### Full screen

Para deixar fullscreen adicione a classe: .full

### Remove background

Para remover background adicione a classe: .remove-bg


# Filtros

Para usar os filtros, precisa adicionar no elemento `.grid-item` a classe a ser filtrada (ex: web) e no button de filtro (dentro de `.menu-cateory`) um data-attribute com a classe (ex:`data-filter="web`)

# Icones

Os ícones foram gerados via https://icomoon.io/app/

Para editalos basta importar o arquivo `/fonts/icommon.svg` e substituir os arquivos gerados.

# Prepros

Para compilar os arquivos SCSS, é necessário o app Prepros (https://prepros.io/). O arquivo de configuração dele já esta versionado.

# Slide de videos

Agora os slides de video precisam ficar dentro de um elemento com a clase `.media`.