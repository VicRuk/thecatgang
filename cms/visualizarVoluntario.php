<?php
session_start();
if(empty($_SESSION)) {
    header("Location: ../views/login.php");
    exit();
}
include ("../models/conexao.php");
include ("../views/blades/header4.php");
include ("../views/blades/sidebar.php");

$idb = $_GET["idb"];
$query = mysqli_query($conexao, "SELECT * FROM user WHERE id = $idb");
?>
<div class="main container-fluid p-5">
    <?php
        while ($exibe = mysqli_fetch_array($query)) {
        $Data = new DateTime($exibe[1]);
        $stringDate = $Data -> format('d/m/Y, H:i:s');
        $dataNascimento = new DateTime($exibe['data_nascimento']);
        $stringDataNascimento = $dataNascimento->format('d/m/Y');
    ?>
    <a href="gestaoVoluntarios.php"><i class="lni lni-chevron-left text-secondary mb-4" id="back"></i></a>
    <h1><?php echo $exibe[2]?></h1>
    <h3><?php echo $exibe[9]?></h3>

    <div class="mb-4">
        <p>Data Nascimento</p>
        <p><?php echo $stringDataNascimento?></p>
    </div>

    <div class="mb-4">
        <p><?php echo $exibe['email']?></p>
        <p><?php echo $exibe['celular']?></p>
        <p><?php echo $exibe['insta']?></p>
    </div>
    <div class="mb-4">
        <p>CPF</p>
        <p><?php echo $exibe['cpf']?></p>
    </div>
    <div class="mb-4">
        <p2>Tipo de Voluntário</p2>
        <p><?php echo $exibe['tipo']?></p>
    </div>

    <?php if($exibe['tipo'] == "Administrativo"){?>
        <div class="mb-4">
            <?php if($exibe['estudante'] == 1){?>
                <p>É estudante</p>
            <?php } else{ ?>
                <p>Não é estudante</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <p2>Escolaridade</p2>
            <p><?php echo $exibe['escolaridade']?></p>
        </div>

        <div class="mb-4">
            <p2>Curso de Graduação</p2>
            <p><?php echo $exibe['curso_graduacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Periodo atual na Graduação</p2>
            <p><?php echo $exibe['periodo_graduacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Área de Atuação</p2>
            <p><?php echo $exibe['area_atuacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Funções</p2>
            <p><?php echo $exibe['funcoes']?></p>
        </div>

        <div class="mb-4">
            <p2>Funções com mais interesse</p2>
            <p><?php echo $exibe['funcoes_interesse']?></p>
        </div>

        <div class="mb-4">
            <p2>Razão do porque quer ser um voluntário</p2>
            <p><?php echo $exibe['razao']?></p>
        </div>

        <div class="mb-4">
            <?php if($exibe['certificado'] == 1){?>
                <p>Precisa de certificado</p>
            <?php } else{ ?>
                <p>Não precisa de certificado</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <p2>Disponibilidade</p2>
            <p><?php echo $exibe['disponibilidade']?></p>
        </div>

        <div class="mb-4">
            <p2>Observação</p2>
            <p><?php echo $exibe['observacao']?></p>
        </div>

        <div class="mb-4">
            <p2>O quanto ama gatos</p2>
            <p><?php echo $exibe['amor']?></p>
        </div>

        <div class="mb-4">
            <?php if($exibe['newsletter'] == 1){?>
                <p>Aceita receber newsletter</p>
            <?php } else{ ?>
                <p>Não aceita receber newsletter</p>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if($exibe['tipo'] == "Carona"){?>
        <div class="mb-4">
            <?php if($exibe['estudante'] == 1){?>
                <p>É estudante</p>
            <?php } else{ ?>
                <p>Não é estudante</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <p2>Escolaridade</p2>
            <p><?php echo $exibe['escolaridade']?></p>
        </div>

        <div class="mb-4">
            <p2>Curso de Graduação</p2>
            <p><?php echo $exibe['curso_graduacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Periodo atual na Graduação</p2>
            <p><?php echo $exibe['periodo_graduacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Área de Atuação</p2>
            <p><?php echo $exibe['area_atuacao']?></p>
        </div>

        <div class="mb-4">
            <p2>Funções</p2>
            <p><?php echo $exibe['funcoes']?></p>
        </div>

        <div class="mb-4">
            <p2>Funções com mais interesse</p2>
            <p><?php echo $exibe['funcoes_interesse']?></p>
        </div>

        <div class="mb-4">
            <p2>Tempo de Disponibilidade de Carona</p2>
            <p><?php echo $exibe['carona_disponibilidade']?></p>
        </div>

        <div class="mb-4">
            <p2>Razão do porque quer ser um voluntário</p2>
            <p><?php echo $exibe['razao']?></p>
        </div>

        <div class="mb-4">
            <?php if($exibe['certificado'] == 1){?>
                <p>Precisa de certificado</p>
            <?php } else{ ?>
                <p>Não precisa de certificado</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <p2>Disponibilidade</p2>
            <p><?php echo $exibe['disponibilidade']?></p>
        </div>

        <div class="mb-4">
            <p2>Observação</p2>
            <p><?php echo $exibe['observacao']?></p>
        </div>

        <div class="mb-4">
            <p2>O quanto ama gatos</p2>
            <p><?php echo $exibe['amor']?></p>
        </div>

        <div class="mb-4">
            <?php if($exibe['newsletter'] == 1){?>
                <p>Aceita receber newsletter</p>
            <?php } else{ ?>
                <p>Não aceita receber newsletter</p>
            <?php } ?>
        </div>
    <?php } ?>
    <?php if($exibe['tipo'] == "Lar Voluntário"){?>
        <div class="mb-4">
            <p2>Mora em</p2>
            <p><?php echo $exibe['mora_em']?></p>
        </div>

        <div class="mb-4">
            <?php if($exibe['pets'] == 1){?>
                <p>Possui outros Pets</p>
            <?php } else{ ?>
                <p>Não possui outros Pets</p>
            <?php } ?>
        </div>

        <div class="mb-4">
            <p2>Pets que possui</p2>
            <p><?php echo $exibe['pets_quais']?></p>
        </div>

        <div class="mb-4">
            <p2>Informações sobre as vacinas de seus pets</p2>
            <p><?php echo $exibe['pets_vacinas']?></p>
        </div>
        
        <div class="mb-4">
            <p2>Informações sobre as castrações de seus pets</p2>
            <p><?php echo $exibe['pets_castrados']?></p>
        </div>

        <div class="mb-4">
            <p2>Informações sobre os testes de para fiv e felv em seus pets</p2>
            <p><?php echo $exibe['pets_testados']?></p>
        </div>

        <div class="mb-4">
            <p2>Bairro</p2>
            <p><?php echo $exibe['bairro']?></p>
        </div>

        <div class="mb-4">
            <p2>endereco</p2>
            <p><?php echo $exibe['endereco']?></p>
        </div>

    <?php } ?>

    <?php if($exibe['user_status'] == "Em análise"){?>
        <form name="atualizar" class="w-100" enctype="multipart/form-data" action="../controllers/aprovarVoluntario.php" method="post">
            <input type="hidden" name="userId" value="<?php echo $exibe[0] ?>">
            <div class="d-flex justify-content-between">
                <input class="btn fw-bold" id="button1" type="submit" value="Aprovar">
                <a class="btn btn-danger d-flex justify-content-center" href="../controllers/recusarVoluntario.php?idb=<?php echo $exibe[0]?>">Recusar</a>
            </div>
        </form>
        <?php }?>
    <?php if($exibe['user_status'] == "Recusado"){?>
        <form name="atualizar" class="w-100" enctype="multipart/form-data" action="../controllers/aprovarVoluntario.php" method="post">
            <input type="hidden" name="userId" value="<?php echo $exibe[0] ?>">
            <div class="d-flex justify-content-between">
                <input class="btn fw-bold" id="button1" type="submit" value="Aprovar">
                <a class="btn btn-danger d-flex justify-content-center" href="../controllers/excluirVoluntario.php?idb=<?php echo $exibe[0]?>">Excluir</a>
            </div>
        </form>
        <?php }?>

    <?php } ?>
</div>

<?php
include ("../views/blades/footer3.php");
?>