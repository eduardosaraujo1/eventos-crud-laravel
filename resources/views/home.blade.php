@extends('template')

@section('title', 'Eventos Online — Participe dos Melhores Eventos')

@section('head')
    <style>
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 68px;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 70% 40%, rgba(74, 29, 150, 0.22) 0%, transparent 70%),
                radial-gradient(ellipse 40% 40% at 20% 70%, rgba(109, 40, 217, 0.1) 0%, transparent 60%);
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(109, 40, 217, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(109, 40, 217, 0.05) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 680px;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: rgba(109, 40, 217, 0.15);
            border: 1px solid rgba(139, 92, 246, 0.3);
            border-radius: 100px;
            padding: 6px 16px;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--purple-light);
            margin-bottom: 28px;
            letter-spacing: 0.04em;
        }

        .hero-eyebrow::before {
            content: '';
            width: 7px;
            height: 7px;
            background: var(--purple-bright);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--purple-bright);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.8);
            }
        }

        .hero h1 {
            margin-bottom: 22px;
            color: var(--white);
        }

        .hero h1 em {
            font-style: normal;
            background: linear-gradient(135deg, var(--purple-bright), var(--purple-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--grey-light);
            margin-bottom: 38px;
            max-width: 520px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            align-items: center;
        }

        .hero-stats {
            display: flex;
            gap: 36px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid var(--border);
        }

        .stat-item span {
            display: block;
        }

        .stat-num {
            font-family: var(--font-display);
            font-size: 1.7rem;
            font-weight: 800;
            color: var(--white);
        }

        .stat-label {
            font-size: 0.82rem;
            color: var(--grey);
            margin-top: 2px;
        }

        .stat-accent {
            color: var(--purple-bright) !important;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-top: 48px;
        }

        .event-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: border-color var(--transition), transform var(--transition), box-shadow var(--transition);
            display: flex;
            flex-direction: column;
        }

        .event-card:hover {
            border-color: var(--purple-mid);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(109, 40, 217, 0.2);
        }

        .event-card-top {
            background: linear-gradient(135deg, var(--purple-deep), #1e0a3c);
            padding: 28px 24px 22px;
            position: relative;
            overflow: hidden;
        }

        .event-card-top::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 32px;
            background: var(--black-card);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        .event-tag,
        .event-card-top h3 {
            position: relative;
            z-index: 2;
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
            margin-bottom: 12px;
        }

        .event-card-top h3 {
            color: var(--white);
            font-size: 1.15rem;
        }

        .event-card-body {
            padding: 20px 24px 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
            flex: 1;
        }

        .meta-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.88rem;
        }

        .meta-row .label {
            color: var(--grey);
        }

        .meta-row .value {
            color: var(--white);
            font-weight: 500;
        }

        .price-value {
            color: var(--purple-light) !important;
            font-family: var(--font-display);
            font-size: 1rem !important;
        }

        .vagas-bar {
            height: 4px;
            background: var(--border);
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .vagas-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--purple-mid), var(--purple-bright));
            border-radius: 2px;
        }

        .about-section {
            background: var(--black-soft);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .about-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 72px;
            align-items: center;
        }

        .about-features {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 32px;
        }

        .feature-item {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
            transition: border-color var(--transition);
        }

        .feature-item:hover {
            border-color: var(--purple-mid);
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(109, 40, 217, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .feature-item h4 {
            font-size: 0.88rem;
            color: var(--white);
            margin-bottom: 4px;
        }

        .feature-item p {
            font-size: 0.8rem;
            color: var(--grey);
            line-height: 1.5;
        }

        .about-visual {
            position: relative;
        }

        .about-card-stack {
            position: relative;
            height: 340px;
        }

        .stack-card {
            position: absolute;
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
        }

        .stack-card:nth-child(1) {
            bottom: 0;
            right: 0;
            width: 80%;
            border-color: var(--border-light);
            transform: rotate(3deg);
        }

        .stack-card:nth-child(2) {
            bottom: 40px;
            right: 20px;
            width: 82%;
            border-color: var(--purple-deep);
            transform: rotate(-1.5deg);
        }

        .stack-card:nth-child(3) {
            bottom: 80px;
            right: 40px;
            width: 84%;
            border-color: var(--purple-mid);
            z-index: 3;
            transform: rotate(0deg);
        }

        .stack-card-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--purple-light);
            margin-bottom: 10px;
        }

        .stack-card-title {
            font-family: var(--font-display);
            font-weight: 700;
            color: var(--white);
            font-size: 1rem;
            margin-bottom: 12px;
        }

        .stack-progress {
            height: 3px;
            background: var(--border);
            border-radius: 2px;
            overflow: hidden;
        }

        .stack-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--purple-mid), var(--purple-bright));
            border-radius: 2px;
        }

        .contact-section {
            background: var(--black);
        }

        .contact-inner {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-card {
            background: var(--black-card);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 52px 48px;
            margin-top: 48px;
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--purple-deep), var(--purple-bright), var(--purple-deep));
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 32px;
            text-align: left;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .contact-icon {
            width: 38px;
            height: 38px;
            background: rgba(109, 40, 217, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .contact-item-text span {
            display: block;
        }

        .contact-item-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--grey);
            margin-bottom: 3px;
        }

        .contact-item-value {
            font-size: 0.92rem;
            color: var(--white);
        }
    </style>
@endsection

@section('content')
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-grid"></div>
        <div class="container">
            <div class="hero-content">
                <div class="hero-eyebrow">Plataforma de Eventos #1</div>
                <h1>Participe dos<br /><em>melhores eventos</em><br />do Brasil</h1>
                <p>Encontre e cadastre-se em cursos, workshops e eventos presenciais e online. Tudo em um só lugar.</p>
                <div class="hero-actions">
                    <a href="/register" class="btn btn-primary">Cadastre-se Grátis</a>
                    <a href="{{ route('eventos') }}" class="btn btn-outline">Ver Eventos</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-num stat-accent">{{ $eventos->count() }}+</span>
                        <span class="stat-label">Eventos ativos</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num">120+</span>
                        <span class="stat-label">Participantes</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-num stat-accent">100%</span>
                        <span class="stat-label">Online e presencial</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section>
        <div class="container">
            <div class="section-label">Próximos Eventos</div>
            <h2>Eventos em destaque</h2>
            <div class="events-grid">

                @for ($i = 0; $i < 3; $i++)
                    <div class="event-card">
                        <div class="event-card-top">
                            <div class="event-tag">Evento</div>
                            <h3>{{ isset($eventos[$i]) ? $eventos[$i]->nome : 'Estamos preparando algo incrível...' }}</h3>
                        </div>
                        <div class="event-card-body">
                            <div class="event-meta">
                                <div class="meta-row">
                                    <span class="label">Preço</span>
                                    <span class="value price-value">R$
                                        {{ isset($eventos[$i]) ? number_format($eventos[$i]->preco, 2, ',', '.') : '???' }}</span>
                                </div>
                                <div class="meta-row">
                                    <span class="label">Vagas</span>
                                    <span class="value">{{ isset($eventos[$i]) ? $eventos[$i]->quantidade : '???' }}</span>
                                </div>
                            </div>
                            <a href="{{ route('eventos') }}" class="btn btn-outline btn-sm">Ver mais</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="about-section">
        <div class="container">
            <div class="about-inner">
                <div>
                    <div class="section-label">Quem Somos</div>
                    <h2>Somos especialistas em eventos</h2>
                    <p style="margin-top:16px;">Somos uma plataforma especializada na divulgação e gestão de eventos
                        presenciais e online. Conectamos organizadores e participantes com praticidade e eficiência.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <h4>Gestão Simples</h4>
                            <p>Crie e gerencie seus eventos com poucos cliques.</p>
                        </div>
                        <div class="feature-item">
                            <h4>Acesso Seguro</h4>
                            <p>Área restrita com autenticação via Laravel Breeze.</p>
                        </div>
                        <div class="feature-item">
                            <h4>Dashboard</h4>
                            <p>Visualize todos os eventos cadastrados em uma tabela.</p>
                        </div>
                        <div class="feature-item">
                            <h4>Tempo Real</h4>
                            <p>Dados sempre atualizados direto do banco de dados.</p>
                        </div>
                    </div>
                    <div style="margin-top:28px;">
                        <a href="{{ route('quem-somos') }}" class="btn btn-ghost">Saiba mais </a>
                    </div>
                </div>
                <div class="about-visual">
                    <div class="about-card-stack">
                        <div class="stack-card">
                            <div class="stack-card-label">Evento</div>
                            <div class="stack-card-title">Laravel Nível Básico</div>
                            <div class="stack-progress">
                                <div class="stack-progress-fill" style="width:40%"></div>
                            </div>
                        </div>
                        <div class="stack-card">
                            <div class="stack-card-label">Evento</div>
                            <div class="stack-card-title">Laravel Nível Intermediário</div>
                            <div class="stack-progress">
                                <div class="stack-progress-fill" style="width:65%"></div>
                            </div>
                        </div>
                        <div class="stack-card">
                            <div class="stack-card-label">Evento em destaque</div>
                            <div class="stack-card-title">Laravel Nível Avançado</div>
                            <div class="stack-progress">
                                <div class="stack-progress-fill" style="width:25%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="contact-section">
        <div class="container">
            <div class="contact-inner">
                <div class="section-label">Contato</div>
                <h2>Garanta sua vaga<br />agora mesmo!</h2>
                <p style="margin-top:12px;">Entre em contato conosco para mais informações sobre nossos eventos e cursos.
                </p>
                <div class="contact-card">
                    <h3 style="color:var(--white); margin-bottom:8px;">Fale Conosco</h3>
                    <p style="font-size:0.9rem;">Estamos prontos para te ajudar.</p>
                    <div class="contact-grid">
                        <div class="contact-item">
                            <div class="contact-item-text">
                                <span class="contact-item-label">E-mail</span>
                                <span class="contact-item-value">contato@eventos.com.br</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-text">
                                <span class="contact-item-label">Telefone</span>
                                <span class="contact-item-value">(13) 99999-9999</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-text">
                                <span class="contact-item-label">Endereço</span>
                                <span class="contact-item-value">São Paulo, SP</span>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-text">
                                <span class="contact-item-label">Redes Sociais</span>
                                <span class="contact-item-value">@eventosonline</span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:28px;">
                        <a href="{{ route('contato') }}" class="btn btn-primary"
                            style="width:100%; justify-content:center;">Ver
                            página de contato</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>© 2026 Eventos Online — Todos os direitos reservados</p>
        </div>
    </footer>

@endsection
