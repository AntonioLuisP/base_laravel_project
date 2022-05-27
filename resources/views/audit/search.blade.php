@extends('layout.utils.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-10">
            <label class="form-label">Operado por</label>
            <input type="text" name="username" class="form-control" maxlength="45" placeholder="Nome do usuário"
                value="{{ $_GET['username'] ?? '' }}">
        </div>
        <div class="form-group col-sm-2">
            <label class="form-label">Audit ID:</label>
            <input type="number" name="id" class="form-control" step="1" placeholder="ID"
                value="{{ $_GET['id'] ?? '' }}">
        </div>
        <div class="form-group col-sm-4">
            <label class="form-label">Model Operada</label>
            <input type="text" name="auditable_type" class="form-control" maxlength="45" placeholder="Exemplo: User"
                value="{{ $_GET['auditable_type'] ?? '' }}">
        </div>
        <div class="form-group col-sm-4">
            <label class="form-label">Operação</label>
            <select class="form-control form-select" name="event">
                <option value="">
                </option>
                <option value="created"
                    {{ isset($_GET['event']) ? ($_GET['event'] === 'created' ? 'selected' : '') : '' }}>
                    Created
                </option>
                <option value="updated"
                    {{ isset($_GET['event']) ? ($_GET['event'] === 'updated' ? 'selected' : '') : '' }}>
                    Updated
                </option>
                <option value="deleted"
                    {{ isset($_GET['event']) ? ($_GET['event'] === 'deleted' ? 'selected' : '') : '' }}>
                    Deleted
                </option>
                <option value="restored"
                    {{ isset($_GET['event']) ? ($_GET['event'] === 'restored' ? 'selected' : '') : '' }}>
                    Restored
                </option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label class="form-label">Ocorido a partir do dia:</label>
            <input type="date" name="created_at" class="form-control" value="{{ $_GET['created_at'] ?? '' }}">
        </div>
    </div>
@stop
