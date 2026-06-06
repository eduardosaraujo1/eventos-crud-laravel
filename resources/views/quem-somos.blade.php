@extends('template')

@section('title', 'Quem Somos — Eventos Online')

@section('head')
    <style>
        .qs-hero {
            padding-top: 130px;
            padding-bottom: 80px;
            position: relative;
            overflow: hidden;
        }

        .qs-hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 50% 60% at 80% 30%, rgba(74, 29, 150, 0.18) 0%, transparent 70%);
        }

        .qs-hero-content {
            position: relative;
            z-index: 1;
            max-width: 640px;
        }

        .qs-hero h1 {
            margin-top: 12px;
            margin-bottom: 20px;
        }

        .qs-hero p {
            font-size: 1.05rem;
        }

        .story-section {
            background: var(--black);
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: start;
        }

        .story-text h2 {
            margin-bottom: 20px;
        }

        .story-text p {
            margin-bottom: 16px;
        }

        .story-visual {
            background: var(--black-card);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 36px;
            position: relative;
            overflow: hidden;
        }

        .story-visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--purple-deep), var(--purple-bright));
        }

        .story-visual-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--purple-light);
            margin-bottom: 20px;
        }

        .mission-item {
            display: flex;
            gap: 14px;
            margin-bottom: 22px;
        }

        .mission-num {
            width: 32px;
            height: 32px;
            background: rgba(109, 40, 217, 0.2);
            border: 1px solid rgba(109, 40, 217, 0.35);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-weight: 700;
            font-size: 0.85rem;
            color: var(--purple-bright);
            flex-shrink: 0;
        }

        .mission-item h4 {
            color: var(--white);
            margin-bottom: 4px;
        }

        .mission-item p {
            font-size: 0.88rem;
            color: var(--grey);
            line-height: 1.55;
        }

        .values-section {
            background: var(--black-soft);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 48px;
        }

        .value-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 32px 28px;
            transition: border-color var(--transition), transform var(--transition);
        }

        .value-card:hover {
            border-color: var(--purple-mid);
            transform: translateY(-4px);
        }

        .value-icon {
            width: 48px;
            height: 48px;
            background: rgba(109, 40, 217, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 18px;
        }

        .value-card h3 {
            color: var(--white);
            margin-bottom: 10px;
        }

        .value-card p {
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .cta-section {
            background: var(--black);
        }

        .cta-box {
            background: linear-gradient(135deg, var(--purple-deep) 0%, #1e0a3c 100%);
            border: 1px solid rgba(139, 92, 246, 0.3);
            border-radius: var(--radius-lg);
            padding: 64px 56px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-box::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 260px;
            height: 260px;
            background: rgba(139, 92, 246, 0.15);
            border-radius: 50%;
            filter: blur(60px);
        }

        .cta-box h2 {
            color: var(--white);
            margin-bottom: 14px;
            position: relative;
        }

        .cta-box p {
            margin-bottom: 32px;
            position: relative;
        }

        .cta-box .btn {
            position: relative;
        }

        @media (max-width: 768px) {

            .story-grid,
            .values-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <section class="qs-hero">
        <div class="qs-hero-bg"></div>
        <div class="container">
            <div class="qs-hero-content">
                <div class="section-label">Quem Somos</div>
                <h1>Conectamos pessoas<br />a experiências incríveis</h1>
                <p>Somos uma plataforma especializada na divulgação e gestão de eventos presenciais e online, conectando
                    organizadores e participantes com praticidade.</p>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="story-section">
        <div class="container">
            <div class="story-grid">
                <div class="story-text">
                    <div class="section-label">Nossa História</div>
                    <h2>Nascemos para simplificar eventos</h2>
                    <p>Somos uma plataforma dedicada a conectar organizadores de eventos e participantes em um ambiente
                        digital moderno e seguro.</p>
                    <p>Nossa missão é facilitar o acesso a conhecimento e experiências, tornando a gestão de eventos algo
                        simples e eficiente para todos.</p>
                    <p>Com tecnologia de ponta e um time dedicado, garantimos que cada evento seja uma experiência
                        inesquecível — do cadastro à participação.</p>
                    <div style="margin-top:28px; display:flex; gap:12px;">
                        <a href="{{ route('eventos') }}" class="btn btn-primary">Ver Eventos</a>
                        <a href="{{ route('contato') }}" class="btn btn-ghost">Fale Conosco</a>
                    </div>
                </div>
                <div class="story-visual">
                    <div class="story-visual-label">Nossos pilares</div>
                    <div class="mission-item">
                        <div class="mission-num">01</div>
                        <div>
                            <h4>Missão</h4>
                            <p>Facilitar o acesso a eventos de qualidade, conectando pessoas e conhecimento de forma simples
                                e eficiente.</p>
                        </div>
                    </div>
                    <div class="mission-item">
                        <div class="mission-num">02</div>
                        <div>
                            <h4>Visão</h4>
                            <p>Ser a principal plataforma de eventos do Brasil, reconhecida pela qualidade e pela
                                experiência do usuário.</p>
                        </div>
                    </div>
                    <div class="mission-item">
                        <div class="mission-num">03</div>
                        <div>
                            <h4>Valores</h4>
                            <p>Transparência, inovação, foco no cliente e comprometimento com resultados reais.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>
    <section class="values-section">
        <div class="container">
            <div class="section-label">O que nos diferencia</div>
            <h2>Por que escolher a gente?</h2>
            <div class="values-grid">
                <div class="value-card">
                    <h3>Foco em Resultados</h3>
                    <p>Cada funcionalidade foi pensada para garantir que organizadores e participantes tenham a melhor
                        experiência possível.</p>
                </div>
                <div class="value-card">
                    <h3>Segurança Total</h3>
                    <p>Utilizamos Laravel Breeze para autenticação segura, protegendo seus dados e garantindo acesso somente
                        autorizado.</p>
                </div>
                <div class="value-card">
                    <h3>Tecnologia Moderna</h3>
                    <p>Plataforma construída com Laravel, garantindo performance, escalabilidade e facilidade de manutenção.
                    </p>
                </div>
                <div class="value-card">
                    <h3>Dashboard Completo</h3>
                    <p>Gerencie todos os seus eventos em uma área administrativa intuitiva, com CRUD completo e visualização
                        clara dos dados.</p>
                </div>
                <div class="value-card">
                    <h3>Online e Presencial</h3>
                    <p>Suporte total para eventos presenciais e online, adaptando-se a qualquer formato e necessidade.</p>
                </div>
                <div class="value-card">
                    <h3>Suporte Dedicado</h3>
                    <p>Nossa equipe está disponível para ajudar em qualquer dúvida ou necessidade relacionada à plataforma.
                    </p>
                </div>
            </div>
        </div>
    </section>

    @guest
        <section class="cta-section">
            <div class="container">
                <div class="cta-box">
                    <h2>Pronto para começar?</h2>
                    <p>Crie sua conta agora e acesse todos os eventos disponíveis na plataforma.</p>
                    <a href="/register" class="btn btn-primary" style="background:white; color:var(--purple-deep);">Criar Conta
                        Gratuita</a>
                </div>
            </div>
        </section>
    @endguest

    <footer>
        <div class="container">
            <p>© 2026 Eventos Online — Todos os direitos reservados</p>
        </div>
    </footer>

@endsection
