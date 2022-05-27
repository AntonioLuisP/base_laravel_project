<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller
{
    protected $audit;

    public function __construct(Audit $audit)
    {
        $this->audit = $audit;
    }

    public function index(Request $request)
    {
        $id = $request->id ?? null;

        $audits = $this->audit->leftJoin('users', 'users.id', '=', 'audits.user_id');

        if (!$id) {
            $username = $request->username ?? null;
            $auditable_type = $request->auditable_type ?? null;
            $event = $request->event ?? null;
            $created_at = $request->created_at ?? null;

            $audits->when($username, function ($query, $username) {
                return $query->where('users.name', "ilike", "%{$username}%"); //busca pelo nome do user
            });

            $audits->when($auditable_type, function ($query, $auditable_type) {
                return $query->where('auditable_type', "ilike", "___________%{$auditable_type}%"); //busca pela model
            });

            $audits->when($event, function ($query, $event) {
                return $query->where('event', "=", $event); //busca pelo evento
            });

            $audits->when($created_at, function ($query, $created_at) {
                return $query->where('audits.created_at', ">=", "%{$created_at}%"); //busca pela data(a partir do dia passado)
            });
        } else {
            $audits->where('audits.id', "=", $id); //busca pelo id
        }

        $audits->select('users.name as username', 'audits.*')
            ->orderBy('audits.created_at', 'desc');

        $audits = $audits->paginate(25);
        $links = $audits->appends($request->except('page'));

        return view('audit.index', compact('audits', 'links'));
    }
}
