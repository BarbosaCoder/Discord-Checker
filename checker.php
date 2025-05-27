<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nitro Suite | barbosa.dev</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        :root {
            --gradient-primary: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            --dark-1: #1a1a2e;
            --dark-2: #16213e;
            --accent: #7f00ff;
            --error-color: #ff467e;
            --valid-color: #00ff88;
            --warn-color: #ffd700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--dark-1);
            color: white;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 300px;
            background: linear-gradient(45deg,rgb(34, 2, 49),rgb(0, 28, 105),rgb(39, 12, 192), rgb(18, 8, 75));
            background-size: cover, cover;
            animation: waveAnimation 30s infinite linear;
        }

        @keyframes waveAnimation {
            0% { background-position: 0 0; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0 0; }
        }

        .main-panel {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .control-card {
            background: var(--dark-2);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .input-group {
            margin: 1rem 0;
        }

        input {
            width: 100%;
            padding: 12px;
            background: rgba(0, 0, 0, 0.3);
            border: 2px solid var(--accent);
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        button {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s;
        }

        button:active {
            transform: scale(0.98);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: rgba(127, 0, 255, 0.1);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: left;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .result-item {
            background: rgba(0, 0, 0, 0.2);
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border-left: 4px solid var(--accent);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .results-panel {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            overflow-y: auto;
            padding: 1rem;
            flex: 1;
        }

        @media (max-width: 768px) {
            body {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .results-panel {
                margin-top: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-card h3 {
                font-size: 1.5rem;
            }
        }

        .credits {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            opacity: 0.8;
            font-size: 0.9rem;
            background: rgba(0, 0, 0, 0.5);
            padding: 8px 12px;
            border-radius: 8px;
        }
    </style>
</head>
<div class="popup" id="popupInfo">
    <div class="popup-content">
        <div class="popup-header">
            <i class="mdi mdi-information-outline neon-icon"></i>
            <h3>Atenção</h3>
        </div>
        <div class="popup-body">
            <p><i class="mdi mdi-currency-usd-off"></i> <span>Este sistema é <strong class="neon-text">gratuito</strong>! Em breve teremos uma versão <strong class="neon-text">premium</strong> com recursos extras.</span></p>
            <p><i class="mdi mdi-alert-circle-outline"></i> <span>Encontrou algum erro? Fale com <strong class="neon-text">barbosa.dev</strong> no Discord:</span></p>
            <p class="discord-contact"><i class="mdi mdi-discord neon-discord"></i> <code>barbosa.dev</code></p>
        </div>
        <button class="neon-button" onclick="document.getElementById('popupInfo').style.display='none'">
            <i class="mdi mdi-close"></i> Fechar
        </button>
    </div>
</div>

<style>
@import url('https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css');

.popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.85);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999;
    backdrop-filter: blur(5px);
    padding: 20px;
    box-sizing: border-box;
}

.popup-content {
    background: #111;
    border-radius: 16px;
    padding: 1.5rem;
    width: 100%;
    max-width: 400px;
    color: #e0e0e0;
    box-shadow: 0 0 25px rgba(138, 43, 226, 0.3);
    border: 1px solid #4a1a7a;
    position: relative;
    overflow: hidden;
}

.popup-content::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border-radius: 18px;
    background: linear-gradient(45deg, #8a2be2, #9400d3, #4b0082);
    z-index: -1;
    animation: borderGlow 3s linear infinite;
}

.popup-header {
    margin-bottom: 1rem;
    text-align: center;
}

.popup-header i {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.popup-header h3 {
    margin: 0;
    font-size: 1.5rem;
    background: linear-gradient(to right, #b721ff, #8a2be2);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 0 8px rgba(138, 43, 226, 0.4);
}

.popup-body {
    margin-bottom: 1.5rem;
}

.popup-body p {
    margin-bottom: 1rem;
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.95rem;
    line-height: 1.5;
}

.popup-body i {
    font-size: 1.2rem;
    color: #8a2be2;
    flex-shrink: 0;
    margin-top: 2px;
}

.popup-body span {
    display: inline-block;
    text-align: left;
}

.discord-contact {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: rgba(114, 137, 218, 0.1);
    padding: 8px 12px;
    border-radius: 8px;
    margin: 1.5rem 0;
}

.discord-contact code {
    background: rgba(0,0,0,0.3);
    padding: 4px 8px;
    border-radius: 4px;
    font-family: monospace;
    font-size: 0.9rem;
    word-break: break-all;
}

.neon-icon {
    color: #8a2be2;
    text-shadow: 0 0 10px #b721ff, 0 0 20px #8a2be2;
}

.neon-text {
    color: #b721ff;
    text-shadow: 0 0 5px rgba(183, 33, 255, 0.7);
}

.neon-discord {
    color: #7289da;
    text-shadow: 0 0 8px rgba(114, 137, 218, 0.7);
}

.neon-button {
    margin-top: 1rem;
    background: linear-gradient(45deg, #6a0dad, #8a2be2);
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    color: white;
    cursor: pointer;
    font-weight: bold;
    font-size: 0.9rem;
    width: 100%;
    max-width: 200px;
    transition: all 0.3s ease;
    box-shadow: 0 0 15px rgba(138, 43, 226, 0.5);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.neon-button:hover {
    background: linear-gradient(45deg, #8a2be2, #6a0dad);
    box-shadow: 0 0 20px rgba(138, 43, 226, 0.8);
    transform: translateY(-2px);
}

.neon-button:active {
    transform: translateY(0);
}

@keyframes borderGlow {
    0% { opacity: 0.7; }
    50% { opacity: 1; }
    100% { opacity: 0.7; }
}

/* Responsividade para telas pequenas */
@media (max-width: 480px) {
    .popup-content {
        padding: 1.2rem;
    }
    
    .popup-header i {
        font-size: 2rem;
    }
    
    .popup-header h3 {
        font-size: 1.3rem;
    }
    
    .popup-body p {
        font-size: 0.85rem;
        gap: 8px;
    }
    
    .discord-contact {
        margin: 1rem 0;
        padding: 6px 10px;
    }
    
    .neon-button {
        padding: 8px 16px;
        font-size: 0.8rem;
    }
}
</style>
<body>
<main class="main-panel">
    <div class="control-card">
        <h2><i class="mdi mdi-rocket"></i> Gerador Automático</h2>
        <div class="input-group">
            <input type="number" id="qtd" min="1" max="100" value="5" placeholder="Quantidade de códigos">
        </div>
        <button id="generateBtn">
            <i class="mdi mdi-play"></i>
            Iniciar Processo
        </button>
    </div>

    <div class="control-card">
        <h2><i class="mdi mdi-magnify"></i> Verificação Manual</h2>
        <div class="input-group">
            <input type="text" id="codigoManual" placeholder="Insira o código manualmente">
        </div>
        <button id="manualCheckBtn">
            <i class="mdi mdi-shield-check"></i>
            Verificar Código
        </button>
    </div>

    <div class="stats-grid">
        <div class="stat-card" onclick="toggleSection('validosList', this)">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <i class="mdi mdi-check-circle"></i>
                    <h3 id="validos">0</h3>
                    <p>Válidos</p>
                </div>
                <i class="mdi mdi-eye" style="font-size: 1.5rem;"></i>
            </div>
        </div>
        <div class="stat-card" onclick="toggleSection('invalidosList', this)">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <i class="mdi mdi-alert-circle"></i>
                    <h3 id="invalidos">0</h3>
                    <p>Inválidos</p>
                </div>
                <i class="mdi mdi-eye" style="font-size: 1.5rem;"></i>
            </div>
        </div>
        <div class="stat-card" onclick="toggleSection('errosList', this)">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <i class="mdi mdi-close-circle"></i>
                    <h3 id="erros">0</h3>
                    <p>Erros</p>
                </div>
                <i class="mdi mdi-eye" style="font-size: 1.5rem;"></i>
            </div>
        </div>
    </div>
</main>

<aside class="results-panel">
    <div id="validosList" style="display: none;"></div>
    <div id="invalidosList" style="display: none;"></div>
    <div id="errosList" style="display: none;"></div>
</aside>

<div class="credits">
    Desenvolvido por <strong>barbosa.dev</strong><br>
    <small>Gratuito - Versão paga em breve | <i class="mdi mdi-discord"></i> barbosa.dev</small>
</div>

<script>
    const saidaMap = {
        valido: document.getElementById("validosList"),
        invalido: document.getElementById("invalidosList"),
        erro: document.getElementById("errosList")
    };

    const validos = document.getElementById("validos");
    const invalidos = document.getElementById("invalidos");
    const erros = document.getElementById("erros");

    function createResultEntry(code, response) {
        const item = document.createElement('div');
        item.className = 'result-item';

        const statusIcon = response.includes("✅") ? 'mdi-check' :
                         response.includes("❌") ? 'mdi-close' : 'mdi-alert';
        const statusColor = response.includes("✅") ? '#00ff88' :
                          response.includes("❌") ? '#ff467e' : '#ffd700';

        item.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                <i class="mdi ${statusIcon}" style="color: ${statusColor}; font-size: 1.2em;"></i>
                <strong>${code}</strong>
            </div>
            <div style="color: ${statusColor}; font-size: 0.9em;">${response}</div>
            <div style="margin-top: 8px; font-size: 0.8em; color: #666;">
                ${new Date().toLocaleTimeString()}
            </div>
        `;

        return item;
    }

    function atualizarContadores(tipo) {
        const counters = {
            valido: validos,
            invalido: invalidos,
            erro: erros
        };
        if (counters[tipo]) {
            counters[tipo].textContent = parseInt(counters[tipo].textContent) + 1;
        }
    }

    function toggleSection(id, card) {
        const section = document.getElementById(id);
        const icon = card.querySelector(".mdi-eye, .mdi-eye-off");

        const isVisible = section.style.display === 'block';
        section.style.display = isVisible ? 'none' : 'block';

        if (icon) {
            icon.classList.toggle("mdi-eye");
            icon.classList.toggle("mdi-eye-off");
        }
    }

    function gerarCodigoAleatorio() {
        return Array.from({length: 16}, () =>
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'
                [Math.floor(Math.random() * 62)]).join('');
    }

    async function testarCodigo(code) {
        try {
            const response = await fetch(`dcchecker.php?lista=${code}`);
            const text = await response.text();
            const resultEntry = createResultEntry(code, text);

            if (text.includes("✅")) {
                saidaMap.valido.prepend(resultEntry);
                atualizarContadores("valido");
            } else if (text.includes("❌")) {
                saidaMap.invalido.prepend(resultEntry);
                atualizarContadores("invalido");
            } else {
                saidaMap.erro.prepend(resultEntry);
                atualizarContadores("erro");
            }
        } catch (error) {
            const errorEntry = createResultEntry(code, "Erro de conexão");
            saidaMap.erro.prepend(errorEntry);
            atualizarContadores("erro");
        }
    }

    document.getElementById("generateBtn").addEventListener("click", async (e) => {
        e.preventDefault();
        const qtd = parseInt(document.getElementById("qtd").value);
        for (let i = 0; i < qtd; i++) {
            await testarCodigo(gerarCodigoAleatorio());
            await new Promise(r => setTimeout(r, 800));
        }
    });

    document.getElementById("manualCheckBtn").addEventListener("click", async (e) => {
        e.preventDefault();
        const code = document.getElementById("codigoManual").value.trim();
        if (code) await testarCodigo(code);
    });
</script>
</body>
</html>
