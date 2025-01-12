@extends('layouts.dashboard')

@section('title', 'Gestion des Professeurs')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <div class="header-wrapper">
            <div class="header-content">
                <h1>Gestion des Professeurs</h1>
                <p class="text-subtitle">Gérez les professeurs de l'établissement</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('professors.create') }}" class="btn-primary">
                    <i class="fas fa-plus"></i>
                    <span>Nouveau Professeur</span>
                </a>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>EMAIL</th>
                    <th>SPÉCIALITÉ</th>
                    <th>TYPE</th>
                    <th>STATUT</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($professors as $professor)
                    <tr>
                        <td>{{ $professor->name }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ json_decode($professor->specialty)->name ?? $professor->specialty }}</td>
                        <td>{{ $professor->type }}</td>
                        <td>
                            <span class="status-badge {{ $professor->is_active ? 'active' : 'inactive' }}">
                                {{ $professor->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('professors.edit', $professor) }}" class="btn-action edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('professors.destroy', $professor) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="empty-state">Aucun professeur trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<style>
.table-container {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    margin-bottom: 2rem;
}

.table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.table th {
    background: #f8fafc;
    padding: 1rem 1.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    color: #64748b;
    border-bottom: 1px solid #e2e8f0;
    text-align: left;
}

.table td {
    padding: 1rem 1.5rem;
    color: #334155;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.actions {
    display: flex;
    gap: 0.5rem;
    justify-content: flex-end;
}

.btn-action {
    width: 2rem;
    height: 2rem;
    border: none;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    background: none;
}

.btn-action.edit {
    color: #0369a1;
}

.btn-action.edit:hover {
    background: #f0f9ff;
}

.btn-action.delete {
    color: #991b1b;
}

.btn-action.delete:hover {
    background: #fef2f2;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
}

.status-badge.active {
    background: #f0fdf4;
    color: #166534;
}

.status-badge.inactive {
    background: #fef2f2;
    color: #991b1b;
}

.empty-state {
    text-align: center;
    color: #6B7280;
    padding: 2rem;
}

.btn-add {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: var(--primary);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 9999px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.btn-add:hover {
    transform: translateY(-2px);
    background: var(--primary-dark);
    color: white;
    text-decoration: none;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table {
        min-width: 600px;
    }

    .table-container {
        overflow-x: auto;
    }

    .btn-add span {
        display: none;
    }

    .btn-add {
        width: 3rem;
        height: 3rem;
        padding: 0;
        justify-content: center;
    }
}
</style>
@endpush
@endsection