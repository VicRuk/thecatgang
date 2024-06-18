<?php
include ("../models/conexao.php");
include ("blades/header3.php");
?>
<div class="body-usuario">
    <div class="fixed-left">
        <img src="../files/images/sick.png" class="w-75">
    </div>
    <div class="scrollable-right">
        <div class="content-wrapper">
            <div class="form-part active p-3" id="part1">
                <h1 class="mb-3">Cadastro de voluntários CCG</h1>
                <p>Oi! Que legal que você quer fazer parte da Crazy Cat Gang e ajudar a cuidar de muitos gatinhos ❤ Se
                    você ainda não sabe, nós somos uma ONG de Curitiba e atuamos virtualmente, ou seja, não temos sede
                    física e nossos gatinhos ficam em lares temporários. Sendo assim, recrutamos lares temporários para
                    cuidar dos gatinhos, voluntários administrativos (remotos) e voluntários pontuais, como para caronas
                    ou eventos.<br><br></p>
                <p>O primeiro passo para ser nosso voluntário é contar um pouquinho mais sobre você, assim podemos saber
                    em qual vaga você se enquadraria melhor :) Nós não temos um quadro de vagas fixo, mas assim que
                    surgir uma oportunidade que seja a sua cara, vamos entrar em contato, tá bem?<br><br></p>
                <p>Como somos uma ONG séria, quem for nosso voluntário assina um contratinho de relação de voluntariado
                    oficial. O período mínimo para participação é de 3 meses, assim a gente consegue ver se rola um
                    match bem legal para uma relação de longo prazo de muito amor com os gatinhos que precisam de
                    ajuda.<br><br></p>
                <button type="button" class="btn btn-primary" id="button1" onclick="nextPart(2)">Continue</button>
                </form>
            </div>
            <form class="w-100" id="formulario" action="../controllers/cadastrarVoluntario.php" method="POST"
                onsubmit="return validateForm();">
                <div class="form-part p-3" id="part2">
                    <h2>Parte 1:</h2>
                    <h1 class="mb-3">Informações Básicas</h1>
                    <div class="mb-3">
                        <p>Nome Completo</p>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo"
                            required>
                    </div>
                    <div class="mb-3">
                        <p>Email</p>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <p>Data de Nascimento</p>
                        <input id="data" class="form-control" name="data_nascimento" type="date" required />
                    </div>
                    <div class="mb-3">
                        <p>CPF</p>
                        <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" required>
                    </div>
                    <div class="mb-3">
                        <p>Qual o seu @?</p>
                        <input type="text" class="form-control" name="insta" id="insta" placeholder="Exemplo: @vicruk_edits">
                    </div>
                    <div class="mb-3">
                        <p>Celular</p>
                        <input type="text" class="form-control" name="celular" id="phone"
                            placeholder="(22) 99812-5555" />
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="button2"
                            onclick="prevPart(1)">Voltar</button>
                        <button type="button" class="btn btn-primary" id="button1"
                            onclick="nextPart(3)">Continue</button>
                    </div>
                </div>
                <div class="form-part p-2" id="part3">
                    <h2>Parte 2:</h2>
                    <h1 class="mb-3">Tipo de Voluntário</h1>
                    <div class="volunteer-type flex-column p-3">
                        <div class="volunteer-container mb-3 w-100" onclick="setVolunteerType(1)">
                            <div class="row align-items-center justify-content-center m-2">
                                <div class="card-image2 col-md-3 d-flex flex-column justify-content-center">
                                    <img src="../files/images/catgang.png" class="img-fluid">
                                </div>
                                <div class="card-corpo col-md-9 d-flex flex-column">
                                    <h3>Voluntário administrativo</h3>
                                    <p2>Como somos uma ONG séria, quem for nosso voluntário assina um contratinho de
                                        relação de voluntariado oficial. O período mínimo para participação é de 3
                                        meses, assim a gente consegue ver se rola um match bem legal para uma relação de
                                        longo prazo de muito amor com os gatinhos que precisam de ajuda.</p2>
                                </div>
                            </div>
                        </div>
                        <div class="volunteer-container mb-3 w-100" onclick="setVolunteerType(2)">
                            <div class="row align-items-center justify-content-center m-2">
                                <div class="card-image2 col-md-3 d-flex flex-column justify-content-center">
                                    <img src="../files/images/lartemporario.png" class="img-fluid">
                                </div>
                                <div class="card-corpo col-md-9 d-flex flex-column">
                                    <h3>Lar Voluntário</h3>
                                    <p2>Por não possuirmos uma sede física, <b>nós dependemos de voluntários que cedem
                                            um cantinho dos seus lares</b> para alocar nossos pequenos até que eles
                                        encontrem uma casinha definitiva.<br>
                                        O lar temporário, não se engane, não é só brincar com o gatinho. É muito cuidado
                                        e trabalho também.</p2>
                                </div>
                            </div>
                        </div>
                        <div class="volunteer-container w-100" onclick="setVolunteerType(3)">
                            <div class="row align-items-center justify-content-center m-2">
                                <div class="card-image2 col-md-3 d-flex flex-column justify-content-center">
                                    <img src="../files/images/carona.png" class="img-fluid">
                                </div>
                                <div class="card-corpo col-md-9 d-flex flex-column">
                                    <h3>Carona</h3>
                                    <p2>Com frequência precisamos movimentar os gatinhos pela cidade da clínica para o
                                        LT e vice-versa, e contamos com a colaboração de <b>caronas</b> que podem nos
                                        ajudar levando bichinhos.<br>Vem ser Pet Taxi de gatinhos :)</p2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="button2"
                            onclick="prevPart(2)">Voltar</button>
                        <button type="button" class="btn btn1" onclick="nextPart(4)" id="continueButton"
                            disabled>Continue</button>
                    </div>


                </div>
                <div class="form-part p-3" id="part4">
                    <div id="additionalInfo"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let currentPart = 1;
    let volunteerType = '';
    document.getElementById('phone').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
    document.getElementById('cpf').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,3})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + (x[4] ? '-' + x[4] : '');
    });
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    function validarSenhas(event) {
        var tipo = document.querySelector('input[name="tipo"]').value;

        if (tipo === "Administrativo") {
            var senha = document.getElementById("senha").value;
            var senhaC = document.getElementById("senhaC").value;
            var erroSenha = document.getElementById("erro-senha");
            var regexSenha = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        
            if (senha !== senhaC) {
                erroSenha.style.display = "block";
                event.preventDefault();
            } else if (!regexSenha.test(senha)) {
                alert('A senha deve conter pelo menos 8 caracteres, incluindo pelo menos uma letra maiúscula e um número.');
                event.preventDefault();
            } else {
                erroSenha.style.display = "none";
            }

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert('Selecione pelo menos uma função.');
                event.preventDefault();
            }
        }
        if (tipo === "Carona") {
            var checkboxes = document.getElementsByName('funcoes[]');
            var isChecked = false;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                }
            }

            if (!isChecked) {
                alert('Selecione pelo menos uma função.');
                event.preventDefault();
            }
        }
    }


    document.addEventListener("DOMContentLoaded", function () {
        var form = document.getElementById("formulario");
        form.addEventListener("submit", validarSenhas);
    });

    function nextPart(part) {
        if (currentPart === 2) {
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const data = document.getElementById('data').value;
            const phone = document.getElementById('phone').value;
            const cpf = document.getElementById('cpf').value;

            if (!nome || !email || !data || !phone || phone.length !== 15 || cpf.length !== 14 || !validateEmail(email)) {
                alert('Por favor, preencha corretamente todos os campos.');
                return;
            }
        }

        const currentElement = document.getElementById(`part${currentPart}`);
        const nextElement = document.getElementById(`part${part}`);

        currentElement.classList.add('exit-left');
        nextElement.classList.add('enter-right');
        nextElement.style.display = 'block';

        setTimeout(() => {
            currentElement.classList.remove('active', 'exit-left');
            nextElement.classList.remove('enter-right');
            nextElement.classList.add('active');
            currentElement.style.display = 'none';
            currentPart = part;
        }, 500);
    }

    function prevPart(part) {
        const currentElement = document.getElementById(`part${currentPart}`);
        const prevElement = document.getElementById(`part${part}`);

        currentElement.classList.add('exit-right');
        prevElement.classList.add('enter-left');
        prevElement.style.display = 'block';

        setTimeout(() => {
            currentElement.classList.remove('active', 'exit-right');
            prevElement.classList.remove('enter-left');
            prevElement.classList.add('active');
            currentElement.style.display = 'none';
            currentPart = part;
        }, 500);
    }

    function setVolunteerType(type) {
        volunteerType = type;
        document.getElementById('continueButton').disabled = false;

        document.querySelectorAll('.volunteer-container').forEach(container => {
            container.classList.remove('selected');
        });

        document.querySelector(`.volunteer-container:nth-child(${type})`).classList.add('selected');

        document.getElementById('additionalInfo').innerHTML = '';

        if (volunteerType === 1) {
            document.getElementById('additionalInfo').innerHTML = `
                    <input type="hidden" name="tipo" value="Administrativo">
                    <h2>Parte 3:</h2>
                    <h1 class="mb-3">Diga mais sobre você!</h1>
                    <div class="mb-3">
                        <p>É estudante?</p>
                        <input type="radio" id="estudante_sim" name="estudante" value="1" required>
                        <label>Sim</label><br>
                        <input type="radio" id="estudante_nao" name="estudante" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Qual a sua escolaridade?</p>
                        <input type="radio" id="ensino_fundamental_completo" name="escolaridade" value="Ensino fundamental completo" required>
                        <label>Ensino fundamental completo</label><br>
                        <input type="radio" id="ensino_fundamental_imcompleto" name="escolaridade" value="Ensino fundamental imcompleto" required>
                        <label>Ensino fundamental imcompleto</label><br>
                        <input type="radio" id="ensino_medio_completo" name="escolaridade" value="Ensino médio completo" required>
                        <label>Ensino médio completo</label><br>
                        <input type="radio" id="ensino_medio_imcompleto" name="escolaridade" value="Ensino médio incompleto" required>
                        <label>Ensino médio incompleto</label><br>
                        <input type="radio" id="graduacao_andamento" name="escolaridade" value="Graduação universitária em andamento" required>
                        <label>Graduação universitária em andamento</label><br>
                        <input type="radio" id="graduacao_completa" name="escolaridade" value="Graduação universitária concluída" required>
                        <label>Graduação universitária concluída</label><br>
                        <input type="radio" id="pos_andamento" name="escolaridade" value="Pós-graduação em andamento" required>
                        <label>Pós-graduação em andamento</label><br>
                        <input type="radio" id="pos_completo" name="escolaridade" value="Pós-graduação concluída" required>
                        <label>Pós-graduação concluída</label><br>
                        <input type="radio" id="sem_escolaridade" name="escolaridade" value="Sem escolaridade" required>
                        <label>Sem escolaridade</label><br>
                    </div>
                    
                    <div class="mb-3">
                        <p>Qual é o curso de graduação universitária que você faz ou fez?</p>
                        <input type="text" class="form-control" name="curso_graduacao" id="curso_graduacao" placeholder="Curso de Graduação Universitária">
                    </div>

                    <div class="mb-3">
                        <p>Se ainda está na universidade, qual período está cursando?</p>
                        <input type="text" class="form-control" name="periodo_graduacao" id="periodo_graduacao" placeholder="Período da Graduação">
                    </div>

                    <div class="mb-3">
                        <p>Qual é sua área de atuação profissional?</p>
                        <p2>Com o que você trabalha? Quais experiências no mercado de trabalho você já teve? Assim a gente consegue ter uma ideia melhor sobre como você pode ajudar :)</p2>
                        <input type="text" class="form-control" name="area_atuacao" id="area_atuacao" placeholder="Área de Atuação" required>
                    </div>

                    <div class="mb-3">
                        <p>Por quais funções você se interessa? Vale marcar quantas quiser!</p>

                        <input type="checkbox" id="carona" name="funcoes[]" value="Carona">
                        <label for="carona"> Carona</label><br>
                        <input type="checkbox" id="organizacao_evento" name="funcoes[]" value="Organização de Evento">
                        <label for="organizacao_evento"> Organização de Evento</label><br>
                        <input type="checkbox" id="participacao" name="funcoes[]" value="Participação somente no dia do evento">
                        <label for="participacao"> Participação somente no dia do evento</label><br>
                        <input type="checkbox" id="fotografia" name="funcoes[]" value="Fotografia">
                        <label for="fotografia"> Fotografia</label><br>
                        <input type="checkbox" id="edicao_grafica" name="funcoes[]" value="Edição gráfica">
                        <label for="edicao_grafica"> Edição gráfica</label><br>
                        <input type="checkbox" id="edicao_evento" name="funcoes[]" value="Edição de vídeos">
                        <label for="edicao_evento"> Edição de vídeos</label><br>
                        <input type="checkbox" id="programacao" name="funcoes[]" value="Programação e desenvolvimento de site">
                        <label for="programacao"> Programação e desenvolvimento de site</label><br>
                        <input type="checkbox" id="producao_conteudo" name="funcoes[]" value="Produção de conteúdo">
                        <label for="producao_conteudo"> Produção de conteúdo</label><br>
                        <input type="checkbox" id="gerenciamento_redes" name="funcoes[]" value="Gerenciamento de redes sociais">
                        <label for="gerenciamento_redes"> Gerenciamento de redes sociais</label><br>
                        <input type="checkbox" id="atendimento_online" name="funcoes[]" value="Atendimento online das redes sociais">
                        <label for="atendimento_online"> Atendimento online das redes sociais (DM e realização dos processos de adoção)</label><br>
                        <input type="checkbox" id="criacao_acoes" name="funcoes[]" value="Criação e organização de ações para arrecadação de verba">
                        <label for="criacao_acoes"> Criação e organização de ações para arrecadação de verba</label><br>
                        <input type="checkbox" id="financeiro" name="funcoes[]" value="Financeiro">
                        <label for="financeiro"> Financeiro</label><br>
                        <input type="checkbox" id="administrativo" name="funcoes[]" value="Administrativo">
                        <label for="administrativo"> Administrativo</label><br>
                        <input type="checkbox" id="ced" name="funcoes[]" value="CED">
                        <label for="ced"> CED (Castração, Esterilização e Devolução)</label><br>
                        <input type="checkbox" id="sou_veterinario" name="funcoes[]" value="Sou veterinário">
                        <label for="sou_veterinario"> Sou veterinário, quero ajudar com serviços de vacinação, castração, cirurgias, etc.</label><br>
                        <input type="checkbox" id="sou_estudante" name="funcoes[]" value="Sou estudante de veterinária e quero ser auxiliar no atendimento dos gatinhos">
                        <label for="sou_estudante"> Sou estudante de veterinária e quero ser auxiliar no atendimento dos gatinhos</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Dessas funções, alguma te atrai mais do que as outras?</p>
                        <input type="text" class="form-control" id="funcoes_interesse" name="funcoes_interesse" placeholder="Funções de Interesse" required>
                    </div>

                    <div class="mb-3">
                        <p>Por que quer ser voluntário da Crazy Cat Gang?</p>
                        <input type="text" class="form-control" id="razao" name="razao" placeholder="Digite a sua justificativa" required>
                    </div>

                    <div class="mb-3">
                        <p>Precisa de certificado de horas complementares para a universidade?</p>
                        <input type="radio" id="certificado_sim" name="certificado" value="1" required>
                        <label>Sim</label><br>
                        <input type="radio" id="certificado_nao" name="certificado" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Qual a sua disponibilidade de tempo?</p>
                        <input type="text" class="form-control" id="disponibilidade" name="disponibilidade" placeholder="Disponibilidade" required>
                    </div>

                    <div class="mb-3">
                        <p>Tem alguma observação?</p>
                        <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Observação">
                    </div>

                    <div class="mb-3">
                        <p>Você sabia que nossa ONG NÃO tem sede física?</p>
                        <input type="radio" id="sede_sim" name="sede" value="1" required>
                        <label>Sim, sabia</label><br>
                        <input type="radio" id="sede_nao" name="sede" value="0" required>
                        <label>Não sabia, mas agora sei que não tem sede física</label><br>
                    </div>

                    <div class="mb-3">
                        <p>E por último e MUITO importante: o quanto você ama gatinhos?</p>
                        <input type="radio" id="amor_1" name="amor" value="Muito" required>
                        <label>Muito</label><br>
                        <input type="radio" id="amor_2" name="amor" value="Muito muito muito mesmo" required>
                        <label>Muito muito muito mesmo</label><br>
                        <input type="radio" id="amor_3" name="amor" value="Amo tanto que não sei nem contabilizar" required>
                        <label>Amo tanto que não sei nem contabilizar</label><br>
                        <input type="radio" id="amor_4" name="amor" value="Felícia é meu segundo nome" required>
                        <label>Felícia é meu segundo nome</label><br>
                    </div>
                    
                    <div class="mb-3">
                        <p>Caso seja aprovado, digite a senha da sua conta de acesso</p>
                        <input required class="form-control mb-1" type="password" name="senha" id="senha" placeholder="Senha">
                        <input required class="form-control" type="password" name="senhaC" id="senhaC" placeholder="Confirmar Senha">
                        <small id="erro-senha" class="error">As senhas não são iguais. Tente novamente.</small>
                    </div>
                    
                    <div class="mb-3">
                        <p2>Ao preencher o cadastro de voluntários, você concorda que está ciente que essa atividade não envolve cuidar de gatinhos ou se responsabilizar por receber algum felino em casa?</p2>
                        <input type="checkbox" id="consciencia" required>
                        <label for="consciencia"> Sim, estou ciente e concordo</label>
                    </div>
                    
                    <div class="mb-3">
                        <p2>Ao preencher o formulário você concorda que a ONG poderá entrar em contato através dos dados fornecidos, assim que houver disponibilidade de uma vaga que se enquadre no seu perfil?</p2>
                        <input type="checkbox" id="contato" required>
                        <label for="contato"> Concordo</label><br>
                    </div>

                    <div class="mb-3">
                        <p2>Você aceita receber nossa newsletter?</p2>
                        <input type="radio" id="news_sim" name="newsletter" value="1" required>
                        <label>Sim</label>
                        <input type="radio" id="news_nao" name="newsletter" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" id="button2"
                                onclick="prevPart(3)">Voltar</button>
                                <input class="fw-bold btn btn-success" id="button3" type="submit" value="Cadastrar">
                        </div>
                    
                `;
        } else if (volunteerType === 2) {
            document.getElementById('additionalInfo').innerHTML = `
                    <input type="hidden" name="tipo" value="Lar Voluntário">
                    <h1>Termos e condições - Lar Temporário</h1>
                    <p>Ser lar temporário parece uma tarefa fácil, mas não é!<br><br></p>
                    <p><b>PROSSIGA COM SUA INSCRIÇÃO SE:</b></p>
                    <p>- <b>sua casa possui tela nas janelas e não existe possíveis rotas de fuga</b>: os gatinhos quando chegam assustados procuram qualquer buraco pra poder escapar: churrasqueiras, frestas de janelas, ralos etc.<br><br>
                    - <b>você tem um espaço fechado para receber o gatinho</b>: os primeiros dias são determinantes para a adaptação deste gatinho em contato com humanos, é importante o espaço reduzido para o gatinho reconhecer o pequeno ambiente primeiro.<br><br>
                    - <b>você não vai soltar o gato pela casa no primeiro dia</b>: relacionado ao ponto acima, gatos precisam de um cantinho seguro. Mantenha-os separados, principalmente dos gatos já moradores da casa, conforme as instruções da sua coordenadora de LT.<br><br>
                    - <b>você não tem medo de pôr a mão na massa</b>: cuidar de gatinhos resgatados não é tarefa fácil, 90% dos resgatinhos chegam doentes e precisam passar por atendimentos veterinários que requerem tratamentos, como rinotraqueite, giárdia e fungo.<br><br>
                    - <b>você não se importa com a idade do gatinho que vai receber</b>: esteja aberto a receber filhotes fofinhos sim, mas também resgatamos gatinhos mais velhos que merecem uma segunda chance tanto quanto qualquer gatinho.<br><br>
                    - <b>você é uma pessoa paciente</b>: muitos gatinhos nunca tiveram afeto ou convivência com seres humanos, e precisam aprender a conviver com esse amor. Não force interações, siga sempre as indicações da coordenadora.<br><br>
                    - <b>e você tem tempo para isso</b>: ser LT não é só colocar um teto na cabeça do gatinho. Tempo e dedicação, brincadeiras e muito amor estão envolvidos nesse trabalho voluntário maravilhoso. Alguns gatinhos são adotados rapidinho, mas outros ficam meses. Esteja preparado para doar seu tempo e seu lar para abrigar estes barrigudinhos. Procuramos pessoas compromissadas com esse trabalho voluntário!<br><br>
                    Leia mais aqui: <a href="https://crazycatgang.com.br/?p=1394">crazycatgang.com.br</a><br><br></p>

                    <div class="mb-3">
                        <p>Você mora em:</p>
                        <input type="radio" id="mora_apartamento" name="mora_em" value="Apartamento" required>
                        <label>Apartamento</label><br>
                        <input type="radio" id="mora_casa" name="mora_em" value="Casa" required>
                        <label>Casa</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Tem tela de proteção? (Desde já, informamos que caso você não possua tela, não estará apto para ser LT de nossa ONG, sendo esse requisito imprescindível para ser voluntário neste setor)?</p>
                        <input type="checkbox" id="rede" required>
                        <label for="contato"> Sim</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Tem outros gatos/pets?</p>
                        <input type="radio" id="pets_sim" name="pets" value="1" required>
                        <label>Sim</label><br>
                        <input type="radio" id="pets_nao" name="pets" value="0" required>
                        <label>Não</label><br>
                    </div>
                    
                    <div class="mb-3">
                        <p>Se sim, quais animais possui?</p>
                        <input type="text" class="form-control" name="pets_quais" id="pets_quais" placeholder="Digite os animais que possui">
                    </div>

                    <div class="mb-3">
                        <p>Todos os animais da casa estão com vacinas em dia?</p>
                        <input type="text" class="form-control" name="pets_vacinas" id="pets_vacinas" placeholder="Digite as informações" required>
                    </div>

                    <div class="mb-3">
                        <p>Todos os animais da casa estão com vacinas em dia?</p>
                        <p2>O teste de fiv e felv pode ser feito em qualquer veterinário pelo valor aproximado de 100,00 e você pode ler mais infos sobre a felv no nosso blog <a href="www.crazycatgang.com.br">www.crazycatgang.com.br</a><br></p2>
                        <input type="radio" id="pets_testados" name="pets_testados" value="Sim, testado e negativo" required>
                        <label>Sim, testado e negativo</label><br>
                        <input type="radio" id="pets_testados_positivos" name="pets_testados" value="Sim, testado e positivo" required>
                        <label>Sim, testado e positivo</label><br>
                        <input type="radio" id="pets_naotestados" name="pets_testados" value="Não foi testado" required>
                        <label>Não foi testado</label><br>
                        <input type="radio" id="pets_naopets" name="pets_testados" value="Não possuo pets" required>
                        <label>Não possuo pets</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Estão todos devidamente castrados?</p>
                        <input type="text" class="form-control" name="pets_castrados" id="pets_castrados" placeholder="Digite as informações" required>
                    </div>

                    <div class="mb-3">
                        <p>Qual bairro você mora?</p>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required>
                    </div>

                    <div class="mb-3">
                        <p>Qual é o seu endereço completo?</p>
                        <p2>Não esquece de colocar o número do apartamento ou qualquer info adicional que precise :)</p2>
                        <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço Completo">
                    </div>

                    <div class="mb-3">
                        <p2>Ao preencher o formulário você concorda com os termos de uso?</p2>
                        <input type="checkbox" id="termos" required>
                        <label for="termos"> Concordo</label><br>
                    </div>

                    <div class="mb-3">
                        <p2>Ao preencher o formulário você concorda que a ONG poderá entrar em contato através dos dados fornecidos, assim que houver disponibilidade de uma vaga que se enquadre no seu perfil?</p2>
                        <input type="checkbox" id="contato" required>
                        <label for="contato"> Concordo</label><br>
                    </div>

                    <div class="mb-3">
                        <p2>Você aceita receber nossa newsletter?</p2>
                        <input type="radio" id="news_sim" name="newsletter" value="1" required>
                        <label>Sim</label>
                        <input type="radio" id="news_nao" name="newsletter" value="0" required>
                        <label>Não</label><br>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" id="button2"
                             onclick="prevPart(3)">Voltar</button>
                        <input class="fw-bold btn btn-success" id="button3" type="submit" value="Cadastrar">
                    </div>
                `;
        } else if (volunteerType === 3) {
            document.getElementById('additionalInfo').innerHTML = `
                    <input type="hidden" name="tipo" value="Carona">
                    <h2>Parte 3:</h2>
                    <h1 class="mb-3">Diga mais sobre você!</h1>
                    <div class="mb-3">
                        <p>É estudante?</p>
                        <input type="radio" id="estudante_sim" name="estudante" value="1" required>
                        <label>Sim</label><br>
                        <input type="radio" id="estudante_nao" name="estudante" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Qual a sua escolaridade?</p>
                        <input type="radio" id="ensino_fundamental_completo" name="escolaridade" value="Ensino fundamental completo" required>
                        <label>Ensino fundamental completo</label><br>
                        <input type="radio" id="ensino_fundamental_imcompleto" name="escolaridade" value="Ensino fundamental imcompleto" required>
                        <label>Ensino fundamental imcompleto</label><br>
                        <input type="radio" id="ensino_medio_completo" name="escolaridade" value="Ensino médio completo" required>
                        <label>Ensino médio completo</label><br>
                        <input type="radio" id="ensino_medio_imcompleto" name="escolaridade" value="Ensino médio incompleto" required>
                        <label>Ensino médio incompleto</label><br>
                        <input type="radio" id="graduacao_andamento" name="escolaridade" value="Graduação universitária em andamento" required>
                        <label>Graduação universitária em andamento</label><br>
                        <input type="radio" id="graduacao_completa" name="escolaridade" value="Graduação universitária concluída" required>
                        <label>Graduação universitária concluída</label><br>
                        <input type="radio" id="pos_andamento" name="escolaridade" value="Pós-graduação em andamento" required>
                        <label>Pós-graduação em andamento</label><br>
                        <input type="radio" id="pos_completo" name="escolaridade" value="Pós-graduação concluída" required>
                        <label>Pós-graduação concluída</label><br>
                        <input type="radio" id="sem_escolaridade" name="escolaridade" value="Sem escolaridade" required>
                        <label>Sem escolaridade</label><br>
                    </div>
                    
                    <div class="mb-3">
                        <p>Qual é o curso de graduação universitária que você faz ou fez?</p>
                        <input type="text" class="form-control" name="curso_graduacao" id="curso_graduacao" placeholder="Curso de Graduação Universitária">
                    </div>

                    <div class="mb-3">
                        <p>Se ainda está na universidade, qual período está cursando?</p>
                        <input type="text" class="form-control" name="periodo_graduacao" id="periodo_graduacao" placeholder="Período da Graduação">
                    </div>

                    <div class="mb-3">
                        <p>Qual é sua área de atuação profissional?</p>
                        <p2>Com o que você trabalha? Quais experiências no mercado de trabalho você já teve? Assim a gente consegue ter uma ideia melhor sobre como você pode ajudar :)</p2>
                        <input type="text" class="form-control" name="area_atuacao" id="area_atuacao" placeholder="Área de Atuação" required>
                    </div>

                    <div class="mb-3">
                        <p>Por quais funções você se interessa? Vale marcar quantas quiser!</p>

                        <input type="checkbox" id="carona" name="funcoes[]" value="Carona">
                        <label for="carona"> Carona</label><br>
                        <input type="checkbox" id="organizacao_evento" name="funcoes[]" value="Organização de Evento">
                        <label for="organizacao_evento"> Organização de Evento</label><br>
                        <input type="checkbox" id="participacao" name="funcoes[]" value="Participação somente no dia do evento">
                        <label for="participacao"> Participação somente no dia do evento</label><br>
                        <input type="checkbox" id="fotografia" name="funcoes[]" value="Fotografia">
                        <label for="fotografia"> Fotografia</label><br>
                        <input type="checkbox" id="edicao_grafica" name="funcoes[]" value="Edição gráfica">
                        <label for="edicao_grafica"> Edição gráfica</label><br>
                        <input type="checkbox" id="edicao_evento" name="funcoes[]" value="Edição de vídeos">
                        <label for="edicao_evento"> Edição de vídeos</label><br>
                        <input type="checkbox" id="programacao" name="funcoes[]" value="Programação e desenvolvimento de site">
                        <label for="programacao"> Programação e desenvolvimento de site</label><br>
                        <input type="checkbox" id="producao_conteudo" name="funcoes[]" value="Produção de conteúdo">
                        <label for="producao_conteudo"> Produção de conteúdo</label><br>
                        <input type="checkbox" id="gerenciamento_redes" name="funcoes[]" value="Gerenciamento de redes sociais">
                        <label for="gerenciamento_redes"> Gerenciamento de redes sociais</label><br>
                        <input type="checkbox" id="atendimento_online" name="funcoes[]" value="Atendimento online das redes sociais">
                        <label for="atendimento_online"> Atendimento online das redes sociais (DM e realização dos processos de adoção)</label><br>
                        <input type="checkbox" id="criacao_acoes" name="funcoes[]" value="Criação e organização de ações para arrecadação de verba">
                        <label for="criacao_acoes"> Criação e organização de ações para arrecadação de verba</label><br>
                        <input type="checkbox" id="financeiro" name="funcoes[]" value="Financeiro">
                        <label for="financeiro"> Financeiro</label><br>
                        <input type="checkbox" id="administrativo" name="funcoes[]" value="Administrativo">
                        <label for="administrativo"> Administrativo</label><br>
                        <input type="checkbox" id="ced" name="funcoes[]" value="CED">
                        <label for="ced"> CED (Castração, Esterilização e Devolução)</label><br>
                        <input type="checkbox" id="sou_veterinario" name="funcoes[]" value="Sou veterinário">
                        <label for="sou_veterinario"> Sou veterinário, quero ajudar com serviços de vacinação, castração, cirurgias, etc.</label><br>
                        <input type="checkbox" id="sou_estudante" name="funcoes[]" value="Sou estudante de veterinária e quero ser auxiliar no atendimento dos gatinhos">
                        <label for="sou_estudante"> Sou estudante de veterinária e quero ser auxiliar no atendimento dos gatinhos</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Dessas funções, alguma te atrai mais do que as outras?</p>
                        <input type="text" class="form-control" id="funcoes_interesse" name="funcoes_interesse" placeholder="Funções de Interesse" required>
                    </div>

                    <div class="mb-3">
                        <p>Caso você tenha marcado a opção caronas, tem disponibilidade em quais dias da semana? Em quais horários?</p>
                        <input type="radio" id="carona_seg-sexta" name="carona_disponibilidade" value="Segunda à sexta, em horário comercial" required>
                        <label>Segunda à sexta, em horário comercial</label><br>
                        <input type="radio" id="carona_final" name="carona_disponibilidade" value="Final de semana" required>
                        <label>Final de semana</label><br>
                        <input type="radio" id="carona_fora" name="carona_disponibilidade" value="Apenas final de semana ou dia de semana fora do horário comercial" required>
                        <label>Apenas final de semana ou dia de semana fora do horário comercial</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Por que quer ser voluntário da Crazy Cat Gang?</p>
                        <input type="text" class="form-control" id="razao" name="razao" placeholder="Digite a sua justificativa" required>
                    </div>

                    <div class="mb-3">
                        <p>Precisa de certificado de horas complementares para a universidade?</p>
                        <input type="radio" id="certificado_sim" name="certificado" value="1" required>
                        <label>Sim</label><br>
                        <input type="radio" id="certificado_nao" name="certificado" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="mb-3">
                        <p>Qual a sua disponibilidade de tempo?</p>
                        <input type="text" class="form-control" id="disponibilidade" name="disponibilidade" placeholder="Disponibilidade" required>
                    </div>

                    <div class="mb-3">
                        <p>Tem alguma observação?</p>
                        <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Observação">
                    </div>

                    <div class="mb-3">
                        <p>Você sabia que nossa ONG NÃO tem sede física?</p>
                        <input type="radio" id="sede_sim" name="sede" value="1" required>
                        <label>Sim, sabia</label><br>
                        <input type="radio" id="sede_nao" name="sede" value="0" required>
                        <label>Não sabia, mas agora sei que não tem sede física</label><br>
                    </div>

                    <div class="mb-3">
                        <p>E por último e MUITO importante: o quanto você ama gatinhos?</p>
                        <input type="radio" id="amor_1" name="amor" value="Muito" required>
                        <label>Muito</label><br>
                        <input type="radio" id="amor_2" name="amor" value="Muito muito muito mesmo" required>
                        <label>Muito muito muito mesmo</label><br>
                        <input type="radio" id="amor_3" name="amor" value="Amo tanto que não sei nem contabilizar" required>
                        <label>Amo tanto que não sei nem contabilizar</label><br>
                        <input type="radio" id="amor_4" name="amor" value="Felícia é meu segundo nome" required>
                        <label>Felícia é meu segundo nome</label><br>
                    </div>

                    <div class="mb-3">
                        <p2>Ao preencher o cadastro de voluntários, você concorda que está ciente que essa atividade não envolve cuidar de gatinhos ou se responsabilizar por receber algum felino em casa?</p2>
                        <input type="checkbox" id="consciencia" required>
                        <label for="consciencia"> Sim, estou ciente e concordo</label>
                    </div>

                    <div class="mb-3">
                        <p2>Ao preencher o formulário você concorda que a ONG poderá entrar em contato através dos dados fornecidos, assim que houver disponibilidade de uma vaga que se enquadre no seu perfil?</p2>
                        <input type="checkbox" id="contato" required>
                        <label for="contato"> Concordo</label><br>
                    </div>

                    <div class="mb-3">
                        <p2>Você aceita receber nossa newsletter?</p2>
                        <input type="radio" id="news_sim" name="newsletter" value="1" required>
                        <label>Sim</label>
                        <input type="radio" id="news_nao" name="newsletter" value="0" required>
                        <label>Não</label><br>
                    </div>

                    <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" id="button2"
                                onclick="prevPart(3)">Voltar</button>
                            <input class="fw-bold btn btn-success" id="button3" type="submit" value="Cadastrar">
                        </div>
                `;
        }
    }
</script>
</body>

</html>