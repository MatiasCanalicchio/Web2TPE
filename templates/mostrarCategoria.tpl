{include file="header.tpl"}
    <h1>Categoria</h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{$categoria->nombre} de {$categoria->peso}kg</li>
    </ul>
    <h2 class="list-group-item">peleadores:</h2>
    <ul class="list-group list-group-flush">
        {foreach from=$peleadores item=$peleador}
            <li class="list-group-item">nombre:{$peleador->nombre}</li>
            <li class="list-group-item">peso:{$peleador->peso}kg</li>
            <li class="list-group-item">nacionalidad:{$peleador->nacionalidad}</li>
            <li></li>
        {/foreach}
    </ul>
{include file="footer.tpl"}