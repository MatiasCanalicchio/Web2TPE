{include file="header.tpl"}
<h1 class="list-group-item">Peleadores</h1>
<ul>
    {foreach from=$peleadores item=$peleador }
        <li class="list-group-item">{$peleador->nombre}</li>
        <li class="list-group-item">{$peleador->peso}kg</li>
        <li class="list-group-item">{$peleador->nacionalidad}</li>
        <li class="list-group-item">(categoria: {$categoriasNombres[$peleador->id_categoria]})</li>
        <button><a href="verPeleador/{$peleador->id}">visualizacion</a></button>
    {/foreach}
</ul>
{include file="footer.tpl"}