{include file="header.tpl"}
<div class="card" style="width: 18rem;">
    {if $error}
        <div class="alert alert-danger" role="alert">
            <p>{$error}</p>
        </div>
    {/if}
    <div class="card-header">
    HOME
    </div>
    <h1>Categoria</h1>
    <ul class="list-group list-group-flush">
        {foreach from=$categorias item=$categoria }
            <li class="list-group-item"> nombre: {$categoria->nombre} peso: {$categoria->peso} </li>
            {if $loggeado == true}
            <button><a href="editarCategoria/{$categoria->id}">editar</a></button>
            <button><a href="borrarCategoria/{$categoria->id}">borrar</a></button>
            {/if}
        {/foreach}
    </ul>
        {if $loggeado == true}
        <form action="agregarCategoria" method="post">
            <legend>Agregar Categoria</legend>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Peso</label>
                <input type="text" name="peso" class="form-control">
            </div>
            <button type="text" class="btn btn-primary">Submit</button>
        </form>
        {/if}
    <h2>Peleadores</h2>
    <ul class="list-group list-group-flush">
        {foreach from=$peleadores item=$peleador }
            <li class="list-group-item"> nombre: {$peleador->nombre} peso: {$peleador->peso} nacionalidad: {$peleador->nacionalidad} (categoria: {$categoriasNombres[$peleador->id_categoria]}) </li>
            {if $loggeado == true}
            <button><a href="editarPeleador/{$peleador->id}">editar</a></button>
            <button><a href="borrarPeleador/{$peleador->id}">borrar</a></button>
            {/if}
        {/foreach}
    </ul>
    {if $loggeado == true}
    <form action="agregarPeleador" method="post">
        <legend>Agregar Peleador</legend>
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Nacionalidad</label>
            <input type="text" name="nacionalidad" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Peso</label>
            <input type="text" name="peso" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria">
                {foreach from=$categorias item=$categoria}
                    <option value="{$categoria->id}">
                    {$categoria->nombre}
                    </option>
                {/foreach}
            </select>
        </div>
        <button type="text" class="btn btn-primary">Submit</button>
    </form>
    {/if}
</div>
{include file="footer.tpl"}