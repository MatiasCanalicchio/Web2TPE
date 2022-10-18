{include file="header.tpl"}
<form action="{BASE_URL}finalizarCategoria/{$id}" method="post">
    <label  class="form-label">peso</label>
    <input type="text" name="peso" class="form-control">
    <label class="form-label">nombre</label>
    <input type="text" name="nombre" class="form-control">
    <button type="submit">submit</button>
</form>
{include file="footer.tpl"}