<div class="form-group col-sm-4">
    <label class="form-label">Método:</label>
    <select class="form-control form-select" name="sort" required>
        <option value="desc" {{ isset($_GET['sort']) ? ($_GET['sort'] === 'desc' ? 'selected' : '') : '' }}>
            Descendente
        </option>
        <option value="asc" {{ isset($_GET['sort']) ? ($_GET['sort'] === 'asc' ? 'selected' : '') : '' }}>
            Ascendente
        </option>
    </select>
</div>
<div class="form-group col-sm-3">
    <label class="form-label">Qtd:</label>
    <select class="form-control form-select" name="quantidade">
        <option value="25" @if ($list->perPage() == '25') selected @endif>25</option>
        <option value="50" @if ($list->perPage() == '50') selected @endif>50</option>
        <option value="100" @if ($list->perPage() == '100') selected @endif>100</option>
        <option value="200" @if ($list->perPage() == '200') selected @endif>200</option>
    </select>
</div>
