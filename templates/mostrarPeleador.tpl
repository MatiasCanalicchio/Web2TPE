{include file="header.tpl"}
    <h1 class="list-group-item">Peleador</h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">nombre:{$peleador->nombre}</li>
        <li class="list-group-item">peso:{$peleador->peso}kg</li>
        <li class="list-group-item">nacionalidad:{$peleador->nacionalidad}</li>
    </ul>
    <h2>su categoria:</h2>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">nombre:{$categoria->nombre}</li>
        <li class="list-group-item">peso:{$categoria->peso}kg</li>
    </ul>
{include file="footer.tpl"}