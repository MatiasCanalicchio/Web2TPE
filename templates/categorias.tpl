{include file="header.tpl"}
<h1 class="list-group-item">Categorias</h1>
<ul>
    {foreach from=$categorias item=$categoria}
        <li class="list-group-item">nombre:{$categoria->nombre}</li>
        <li class="list-group-item">peso:{$categoria->peso}kg</li>
        <li class="list-group-item"></li>
        <button><a href="verCategoria/{$categoria->id}">visualizacion</a></button>
    {/foreach}
</ul>
{include file="footer.tpl"}