@extends('template')

@section('title', 'Eventos — Eventos Online')

@section('head')
    <style>
        .events-hero {
            padding-top: 130px;
            padding-bottom: 64px;
            position: relative;
            overflow: hidden;
        }

        .events-hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 60% 50% at 50% 30%, rgba(74, 29, 150, 0.15) 0%, transparent 70%);
        }

        .events-hero-inner {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            flex-wrap: wrap;
            gap: 24px;
        }

        .events-hero h1 {
            margin-top: 12px;
        }

        .filters-bar {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .filter-btn {
            background: var(--black-card);
            border: 1.5px solid var(--border);
            color: var(--grey-light);
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 100px;
            cursor: pointer;
            transition: all var(--transition);
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: rgba(109, 40, 217, 0.15);
            border-color: var(--purple-mid);
            color: var(--purple-light);
        }

        .events-section {
            background: var(--black);
            padding-top: 20px;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            margin-top: 0;
        }

        .event-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
        }

        .event-card:hover {
            border-color: var(--purple-mid);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(109, 40, 217, 0.2);
        }

        .event-card-header {
            background: linear-gradient(135deg, var(--purple-deep) 0%, #1e0a3c 100%);
            padding: 28px 26px 24px;
            position: relative;
            overflow: hidden;
        }

        .event-card-header::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 120px;
            height: 120px;
            background: rgba(139, 92, 246, 0.12);
            border-radius: 50%;
            filter: blur(30px);
        }

        .event-card-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 32px;
            background: var(--black-card);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .event-tag {
            display: inline-block;
            background: rgba(139, 92, 246, 0.25);
            border: 1px solid rgba(139, 92, 246, 0.4);
            color: var(--purple-light);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .event-card-header h3 {
            color: var(--white);
            position: relative;
            z-index: 1;
        }

        .event-card-body {
            padding: 20px 26px 26px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .event-info-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            flex: 1;
        }

        .event-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.88rem;
        }

        .event-info-row:last-child {
            border-bottom: none;
        }

        .event-info-row .ev-label {
            color: var(--grey);
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .ev-icon {
            font-size: 0.9rem;
        }

        .event-info-row .ev-value {
            color: var(--white);
            font-weight: 500;
        }

        .ev-price {
            color: var(--purple-light) !important;
            font-family: var(--font-display);
            font-size: 1rem !important;
        }

        .vagas-wrapper {
            width: 100%;
        }

        .vagas-bar {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            overflow: hidden;
            margin-top: 6px;
        }

        .vagas-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--purple-mid), var(--purple-bright));
            border-radius: 2px;
        }

        .vagas-pct {
            font-size: 0.75rem;
            color: var(--grey);
            margin-top: 4px;
            text-align: right;
        }

        .event-card-footer {
            display: flex;
            gap: 10px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1 / -1;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            color: var(--white);
            margin-bottom: 8px;
        }

        .empty-state p {
            margin-bottom: 24px;
        }

        .table-section {
            background: var(--black-soft);
            border-top: 1px solid var(--border);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .table-wrapper {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
        }

        .text-center {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section class="events-hero">
        <div class="events-hero-bg"></div>
        <div class="container">
            <div class="events-hero-inner">
                <div>
                    <div class="section-label">Catálogo</div>
                    <h1>Todos os Eventos</h1>
                    <p style="margin-top:10px; max-width:480px;">Encontre o evento perfeito para o seu perfil e garanta sua
                        vaga agora.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="events-section">
        <div class="container">
            @if($eventos->isEmpty())
                <h3 class="text-center">Não há eventos agendados no momento.</h3>
            @else
                <div class="events-grid">
                    @foreach ($eventos as $e)
                        <div class="event-card">
                            <div class="event-card-header">
                                <div class="event-tag">Evento</div>
                                <h3>{{ $e->nome }}</h3>
                            </div>
                            <div class="event-card-body">
                                <div class="event-info-list">
                                    <div class="event-info-row">
                                        <span class="ev-label"><span>Preço</span>
                                            <span class="ev-value ev-price">R$ {{ number_format($e->preco, 2, ',', '.') }}</span>
                                    </div>
                                    <div class="event-info-row">
                                        <span class="ev-label"><span>Vagas</span>
                                            <div class="vagas-wrapper">
                                                <div style="display:flex;justify-content:space-between;">
                                                    <span class="ev-value">{{ $e->quantidade }} vagas</span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="event-card-footer">
                                    <a href="#" class="btn btn-primary btn-sm"
                                        style="flex:1; justify-content:center;">Inscrever-se</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <footer>
        <div class="container">
            <p>© 2026 Eventos Online — Todos os direitos reservados</p>
        </div>
    </footer>

@endsection
