@extends('template')

@section('title', 'Contato — Eventos Online')

@section('head')
    <style>
        .contact-hero {
            padding-top: 130px;
            padding-bottom: 80px;
            position: relative;
            overflow: hidden;
        }

        .contact-hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse 50% 60% at 20% 50%, rgba(74, 29, 150, 0.18) 0%, transparent 70%);
        }

        .contact-hero-content {
            position: relative;
            z-index: 1;
            max-width: 560px;
        }

        .contact-hero h1 {
            margin-top: 12px;
            margin-bottom: 18px;
        }

        .contact-main {
            background: var(--black);
            padding-bottom: 100px;
        }

        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 48px;
            align-items: start;
        }

        .info-block {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .info-card {
            background: var(--black-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            display: flex;
            gap: 16px;
            align-items: flex-start;
            transition: border-color var(--transition), transform var(--transition);
        }

        .info-card:hover {
            border-color: var(--purple-mid);
            transform: translateX(4px);
        }

        .info-card-icon {
            width: 44px;
            height: 44px;
            background: rgba(109, 40, 217, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .info-card-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--purple-light);
            margin-bottom: 4px;
        }

        .info-card-value {
            font-size: 0.95rem;
            color: var(--white);
            font-weight: 500;
        }

        .info-card-desc {
            font-size: 0.82rem;
            color: var(--grey);
            margin-top: 2px;
        }

        .social-row {
            display: flex;
            gap: 10px;
            margin-top: 4px;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(109, 40, 217, 0.12);
            border: 1px solid rgba(109, 40, 217, 0.25);
            color: var(--purple-light);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 5px 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: background var(--transition);
        }

        .social-btn:hover {
            background: rgba(109, 40, 217, 0.25);
        }

        .form-card {
            background: var(--black-card);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--purple-deep), var(--purple-bright), var(--purple-deep));
        }

        .form-card h3 {
            color: var(--white);
            margin-bottom: 6px;
        }

        .form-card>p {
            color: var(--grey);
            font-size: 0.9rem;
            margin-bottom: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .contact-layout {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <section class="contact-hero">
        <div class="contact-hero-bg"></div>
        <div class="container">
            <div class="contact-hero-content">
                <div class="section-label">Contato</div>
                <h1>Garanta sua vaga<br />agora mesmo!</h1>
                <p>Entre em contato conosco para tirar dúvidas, solicitar informações ou garantir sua participação nos
                    nossos eventos.</p>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <section class="contact-main">
        <div class="container">
            <div class="contact-layout">

                <div class="info-block">
                    <div class="info-card">
                        <div class="info-card-text">
                            <div class="info-card-label">E-mail</div>
                            <div class="info-card-value">contato@eventos.com.br</div>
                            <div class="info-card-desc">Respondemos em até 24h</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-text">
                            <div class="info-card-label">Telefone</div>
                            <div class="info-card-value">(13) 99999-9999</div>
                            <div class="info-card-desc">Seg–Sex, 9h às 18h</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-text">
                            <div class="info-card-label">Endereço</div>
                            <div class="info-card-value">São Paulo, SP</div>
                            <div class="info-card-desc">Brasil</div>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-text">
                            <div class="info-card-label">Redes Sociais</div>
                            <div class="social-row">
                                <a href="#" class="social-btn">Instagram</a>
                                <a href="#" class="social-btn">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <h3>Envie uma mensagem</h3>
                    <p>Preencha o formulário e entraremos em contato em breve.</p>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" id="nome" placeholder="Seu nome" />
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" placeholder="seu@email.com" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="assunto">Assunto</label>
                        <input type="text" id="assunto" placeholder="Sobre o que você quer falar?" />
                    </div>

                    <div class="form-group">
                        <label for="mensagem">Mensagem</label>
                        <textarea id="mensagem" rows="5" placeholder="Escreva sua mensagem aqui..."></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            Enviar Mensagem
                        </button>
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
