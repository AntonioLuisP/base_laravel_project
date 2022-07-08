<?php

namespace App\Http\Controllers\SistemaControlls;

use App\Http\Controllers\Controller;
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
                return $query->where('users.name', "ilike", "%{$username}%");
            });

            $audits->when($auditable_type, function ($query, $auditable_type) {
                return $query->where('auditable_type', "ilike", "___________%{$auditable_type}%");
            });

            $audits->when($event, function ($query, $event) {
                return $query->where('event', "=", $event);
            });

            $audits->when($created_at, function ($query, $created_at) {
                return $query->where('audits.created_at', ">=", "%{$created_at}%");
            });
        } else {
            $audits->where('audits.id', "=", $id);
        }

        $audits->select('users.name as username', 'audits.*')
            ->orderBy('audits.created_at', 'desc');

        $audits = $audits->paginate(25);
        $links = $audits->appends($request->except('page'));

        return view('sistema.audit.index', compact('audits', 'links'));
    }
}
