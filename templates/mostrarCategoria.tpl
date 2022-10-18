{include file="header.tpl"}
    <h1 class="list-group-item">Categoria: {$categoria->nombre}</h1>
    <li class="list-group-item">Peso Categoria:{$categoria->peso}</li>
    {foreach from=$peleadores item=$peleador}
        h2
        <li class="list-group-item">nombre:{$peleador->nombre}</li>
        <li class="list-group-item">peso:{$peleador->peso}</li>
        <li class="list-group-item">nacionalidad:{$peleador->nacionalidad}</li>
    {/foreach}
{include file="footer.tpl"}