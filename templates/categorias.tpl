{include file="header.tpl"}
<ul class="list-group">
{foreach from=$categorias item=$categoria}
    <li class="list-group-item">nombre:{$categoria->nombre}</li>
    <li class="list-group-item">peso:{$categoria->peso}</li>
    <li class="list-group-item"></li>
    <button><a href="verCategoria/{$categoria->id}">visualizacion</a></button>
{/foreach}
{include file="footer.tpl"}