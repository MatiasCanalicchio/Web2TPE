{include file="header.tpl"}
<ul>
{foreach from=$peleadores item=$peleador }
    <li class="list-group-item">{$peleador->nombre}</li>
    <li class="list-group-item">{$peleador->peso}</li>
    <li class="list-group-item">{$peleador->nacionalidad}</li>
    <li class="list-group-item">(categoria: {$categoriasNombres[$peleador->id_categoria]})</li>
    <button><a href="verPeleador/{$peleador->id}">visualizacion</a></button>
{/foreach}
</ul>
{include file="footer.tpl"}