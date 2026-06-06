@extends('template')

@section('title', 'Editar Evento — Eventos Online')

@section('head')
    <style>
        .edit-layout {
            padding-top: 110px;
            padding-bottom: 80px;
            min-height: 100vh;
            background: var(--black);
        }

        .edit-inner {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            align-items: start;
        }

        .edit-sidebar {
            position: sticky;
            top: 90px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sidebar-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 28px;
        }

        .sidebar-title {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--white);
            font-size: 1rem;
            margin-bottom: 14px;
        }

        .sidebar-meta-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 9px 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.85rem;
        }

        .sidebar-meta-item:last-child {
            border-bottom: none;
        }

        .sidebar-meta-item .sm-label {
            color: var(--grey);
        }

        .sidebar-meta-item .sm-value {
            color: var(--white);
            font-weight: 500;
        }

        .danger-zone {
            background: rgba(239, 68, 68, 0.06);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .danger-zone .sidebar-title {
            color: #f87171;
        }

        .danger-zone p {
            font-size: 0.82rem;
            color: var(--grey);
            margin-bottom: 14px;
            line-height: 1.5;
        }

        .form-main {
            background: var(--black-card);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .form-main-header {
            padding: 28px 36px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(90deg, rgba(109, 40, 217, 0.1), transparent);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-main-header h2 {
            font-size: 1.35rem;
        }

        .form-main-body {
            padding: 36px;
        }

        .section-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 30px 0 24px;
        }

        .section-divider-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--purple-light);
            white-space: nowrap;
        }

        .section-divider-line {
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-main-footer {
            padding: 24px 36px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.82rem;
            color: var(--grey);
            margin-bottom: 28px;
        }

        .breadcrumb a {
            color: var(--grey);
            text-decoration: none;
            transition: color var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--purple-light);
        }

        .breadcrumb-sep {
            color: var(--border-light);
        }

        .breadcrumb span {
            color: var(--white);
        }

        @media (max-width: 900px) {
            .edit-inner {
                grid-template-columns: 1fr;
            }

            .edit-sidebar {
                position: static;
            }

            .form-row-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <div class="edit-layout">
        <div class="container">

            <div class="breadcrumb">
                <a href="{{ route("home") }}">Início</a>
                <span class="breadcrumb-sep">›</span>
                <a href="{{ route("eventos") }}">Eventos</a>
                <span class="breadcrumb-sep">›</span>
                <a href="#">Laravel Nível Básico</a>
                <span class="breadcrumb-sep">›</span>
                <span>Editar</span>
            </div>

            <div class="edit-inner">
                <div class="edit-sidebar">
                    <div class="sidebar-card">
                        <div class="sidebar-title">Detalhes do Evento</div>
                        <div class="sidebar-meta-item">
                            <span class="sm-label">ID</span>
                            <span class="sm-value">#{{ $evento->id }}</span>
                        </div>
                        <div class="sidebar-meta-item">
                            <span class="sm-label">Criado em</span>
                            <span class="sm-value">{{ $evento->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="sidebar-card danger-zone">
                        <div class="sidebar-title">Zona de Risco</div>
                        <p>A exclusão é permanente e não pode ser desfeita.</p>
                        <form action="{{ route('eventos_destroy', $evento->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                onclick="return confirm('Tem certeza que deseja excluir \'{{ $evento->nome }}\'?')"
                                class="btn btn-danger" style="width:100%; justify-content:center;">
                                🗑 Excluir Evento
                            </button>
                        </form>
                    </div>
                </div>

                <form action="{{ route('eventos_update', $evento->id) }}" method="post" class="form-main">
                    @csrf
                    @method('put')
                    <div class="form-main-header">
                        <div>
                            <div class="section-label" style="margin-bottom:6px;">Editando</div>

                            <h2>{{ $evento->nome }}</h2>
                        </div>
                        <a href="{{ route("eventos") }}" class="btn btn-ghost btn-sm">← Voltar</a>
                    </div>

                    <div class="form-main-body">

                        <div class="section-divider">
                            <div class="section-divider-label">Informações</div>
                            <div class="section-divider-line"></div>
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome do evento *</label>
                            <input type="text" value="{{ $evento->nome }}" name="nome" id="nome"
                                placeholder="Ex: Laravel do Zero ao Avançado" required />
                        </div>


                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="preco">Preço (R$) *</label>
                                <input type="number" name="preco" id="preco" value="{{ $evento->preco }}" placeholder="0,00"
                                    step="0.01" min="0" required />
                            </div>
                            <div class="form-group">
                                <label for="quantidade">Vagas disponíveis *</label>
                                <input type="number" name="quantidade" id="quantidade" value="{{ $evento->quantidade }}"
                                    placeholder="Ex: 40" min="1" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-main-footer">
                        <a href="{{ route("dashboard") }}" class="btn btn-ghost">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Evento </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>© 2026 Eventos Online — Todos os direitos reservados</p>
        </div>
    </footer>

@endsection
