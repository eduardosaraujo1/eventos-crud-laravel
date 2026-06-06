@extends('template')

@section('title', 'Novo Evento — Eventos Online')

@section('head')
    <style>
        .create-layout {
            padding-top: 110px;
            padding-bottom: 80px;
            min-height: 100vh;
            background: var(--black);
        }

        .create-inner {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            align-items: start;
        }

        .create-sidebar {
            position: sticky;
            top: 90px;
        }

        .sidebar-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 28px;
            margin-bottom: 16px;
        }

        .sidebar-title {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--white);
            font-size: 1rem;
            margin-bottom: 16px;
        }

        .sidebar-steps {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.88rem;
            color: var(--grey);
            padding: 8px 12px;
            border-radius: var(--radius);
            transition: background var(--transition);
        }

        .step-item.active {
            background: rgba(109, 40, 217, 0.12);
            color: var(--purple-light);
        }

        .step-num {
            width: 24px;
            height: 24px;
            background: var(--border);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
            flex-shrink: 0;
        }

        .step-item.active .step-num {
            background: var(--purple-mid);
            color: var(--white);
        }

        .sidebar-tip {
            font-size: 0.82rem;
            color: var(--grey);
            line-height: 1.6;
        }

        .sidebar-tip strong {
            color: var(--purple-light);
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
            background: linear-gradient(90deg, rgba(74, 29, 150, 0.12), transparent);
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

        .form-row-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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
            .create-inner {
                grid-template-columns: 1fr;
            }

            .create-sidebar {
                position: static;
            }

            .form-row-2,
            .form-row-3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <div class="create-layout">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route("home") }}">Início</a>
                <span class="breadcrumb-sep">›</span>
                <a href="{{ route("dashboard") }}">Dashboard</a>
                <span class="breadcrumb-sep">›</span>
                <span>Novo Evento</span>
            </div>

            <div class="create-inner">

                <div class="create-sidebar">

                    <div class="sidebar-card">
                        <div class="sidebar-title">Dica</div>
                        <p class="sidebar-tip">Preencha todos os campos para garantir que seu evento apareça corretamente na
                            listagem pública. <strong>Campos obrigatórios</strong> são marcados com *.</p>
                    </div>
                </div>

                <form method="post" action="{{ route('eventos_store') }}" class="form-main">
                    @csrf
                    <div class="form-main-header">
                        <div>
                            <div class="section-label" style="margin-bottom:6px;">Novo Registro</div>
                            <h2>Cadastrar Evento</h2>
                        </div>
                        <a href="{{ route("dashboard") }}" class="btn btn-ghost btn-sm">← Voltar</a>
                    </div>

                    <div class="form-main-body">

                        <div class="section-divider">
                            <div class="section-divider-label">Informações</div>
                            <div class="section-divider-line"></div>
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome do evento *</label>
                            <input type="text" name="nome" id="nome" placeholder="Ex: Laravel do Zero ao Avançado"
                                required />
                        </div>


                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="preco">Preço (R$) *</label>
                                <input type="number" name="preco" id="preco" placeholder="0,00" step="0.01" min="0"
                                    required />
                            </div>
                            <div class="form-group">
                                <label for="quantidade">Vagas disponíveis *</label>
                                <input type="number" name="quantidade" id="quantidade" placeholder="Ex: 40" min="1"
                                    required />
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
