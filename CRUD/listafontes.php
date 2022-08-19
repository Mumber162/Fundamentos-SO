<?php 
include("../config.php");
if(isset($_POST['nome'])){
    extract($_POST);
    if($consulta = $conexao->query("insert into tb_fontes (fon_nome, fon_logo, fon_confiabilidade, fon_website, fon_pol_codigo) values ('$nome','$logo','$confiabilidade','$website','$polarizacao');")) {
        header("Location: listafontes.php");
	} else {
		echo "Erro no cadastro";
	}
}

$consulta2 = $conexao->query("select * from tb_fontes join tb_polarizacoes on fon_pol_codigo = pol_codigo");
if(isset($_GET['excluir'])){
    $codigo = $_GET['excluir'];
    if($consulta = $conexao->query("delete from tb_fontes where fon_codigo = $codigo")) {
        header("Location: listafontes.php");
	} else {
		echo "Erro na exclusão";
	}
}
$consulta = $conexao->query("select * from tb_fontes join tb_polarizacoes on fon_pol_codigo = pol_codigo order by fon_codigo");
$consulta3 = $conexao -> query("select * from tb_polarizacoes;");
?>

<!DOCTYPE html>
<html lang="pt-br">

 <!--≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ HEAD ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡-->
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <!--============ Importação de Estilos ============-->
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
    />
    <!-- Header -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- CSS -->
    <link rel="stylesheet" href="../ffn-style.css" />
    <!--==================================================-->

    <!----------------- Biblioteca FONT AWESOME ------------------------>
    <script src="https://kit.fontawesome.com/12523f43c4.js" crossorigin="anonymous"></script>


    <!-- Ícone da Janela -->
    <link rel="icon" href="https://i.imgur.com/RJoR7Ng.png" type="image/x-icon">

    <title>Resultados da Pesquisa</title>

  </head>

  <!--≡≡≡≡≡≡ BODY ≡≡≡≡≡≡≡≡≡-->
  <body id="body-search-result">

    <!--== Toda a Barra de Navegação ==-->
    <header class= "sticky-top">
      <div class="shadow-lg rounded">
        <div class="container"> <!--- DIV da Barra de Navegação ---->
          <nav class="navbar navbar-expand-md navbar-dark">
            
          <a class="navbar-brand" href="../index.php">
              <!--LOGO-->
              <img
                src="https://i.imgur.com/ZB9JOd9.png"
                alt="logo"
                width="125px"
                class="image-fluid"
              />
            </a>
  
            <div style="font-family: 'Libre Franklin', sans-serif;" class="navbar-slotext">
              <!--= Slogan e Subslogan =-->
              <span class="navbar-text pb-0" style="color:white; font-weight: 460;"
                >A melhor plataforma para comparação&nbsp;de notícias!
              </span>
              <br>
              <span class="navbar-text pt-0" id="subslogan"
                >Tire suas próprias conclusões.
              </span>
            </div>          
  
  
            <!--======= Configura o toggler: Botão de 'MAIS OPÇÕES' ========-->
            <!-- Head-div é pra configurar o toggle pra collapsar e expandir os elementos da barra de naveg -->
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#head-div"
              aria-controls="head-div"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <span><i class="fas fa-bars"></i></span>
            </button>
  
            <!-- Div referenciada no toggler que faz ele funcionar
                 (esconde esta seção dentro do toggler) -->
            <div class="collapse navbar-collapse" id="head-div">
              <!--dificil de explicar, mas é a nav da barra de navegação-->
              <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link" href="lcpalavra.php">
                  Palavras Chave</a>
                  
                <a class="nav-item nav-link" href="lcredes.php">
                  Redes
                </a>

                <a class="nav-item nav-link" href="lctemas.php">
                  Tópicos</a>
                  
                <a class="nav-item nav-link" href="lcpolarizacao.php">
                  Polarizações</a>
                  
                <a class="nav-item nav-link" href="listanoticias.php">
                  Noticias</a>
                  
                <a class="nav-item nav-link" href="listafontes.php">
                  Fontes</a>
  
                <!-------- Botão ENTRAR ---------->
                <!-- <div class="barnaveg-btn">
                  <a class="nav-item btn" role= "button" href="index.html" id="barnaveg-btn">
                    Inicio
                  </a>
                </div> -->
                <!-------------------------------->

              </div>
            </div>
          </nav>
        </div>
      </div>

    </header>
    <!--≡≡≡≡≡=== Fim do HEader (navbar) ====≡≡≡≡≡≡≡-->

    <!--≡≡≡≡≡≡==== DIV da ÁREA do "formulário" de PESQUISA ====≡≡≡-->
    <div class="container mt-3" id="area-pesquisa"
      style="color: #66209e; border-bottom: 1px solid #66209e">

      <form class="form" action="?" method="POST" id="form-search">
        <div class="form-group">

          <!--======----- Área de PESQUISA -----======-->
          <label for="search">Cadastrar nova fonte:</label>
          <input 
          type="text" 
          name="nome"
          class="form-control" 
          id="pesquisa" 
          autofocus
          style="font-family: Libre Franklin;"/>

          Link da imagem (logo):<input type="text" name="logo" required class= "form-control" id= "pesquisa" style="font-family: Libre Franklin;">
          Confiabilidade: <input type="number" name="confiabilidade" required class= "form-control" id= "pesquisa" style="font-family: Libre Franklin;">
          Website:<input type="text" name="website" required class= "form-control" id= "pesquisa" style="font-family: Libre Franklin;">
          Polarização:
          <select name="polarizacao">
		    <?php while($resultado3 = $consulta3->fetch_assoc()) { ?>
			    <option value="<?php echo $resultado3['pol_codigo']?>"><?php echo $resultado3['pol_polarizacao']?></option>
		    <?php } ?>
		  </select>
    <br>
          
        </div>
          <!--- Botão de "FILTRAR" --->
          <div class="form-group" style="margin-bottom: 5px;">
            <input type="submit" value="Finalizar" id="enviar2" />
          </div>

        </div>
        <!--=======-- fim cx filtro --===========-->

      </form>
      <!--===≡≡≡ # fim area form # ≡≡≡≡≡-->
      <br>
    </div>

    <!--≡≡≡====== TABELA DE RESULTADOS =======≡≡≡-->
    <div class="container">
      <table class="table table-sm">
        <!--------- INSTRUÇÕES da Tabela ----------->
        <tr class="instrucoes">
          <th class="col-xs-2 col-sm-2 col-md-2" scope="col">Código</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Nome</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Logo</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Confiabiliade</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Website</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Polarização</th>

          <th class="col-xs-8 col-sm-8 col-md-2" scope="col">Ações</th>
          
        </tr><!------------------------------------->

        <!--========= Exemplo 1 de RESULTADO ==========-->
       
      
        <?php while($resultado = $consulta->fetch_assoc()){ ?>
            <tr class="result">
                <td><?php echo $resultado['fon_codigo']?></td>
                <td><?php echo $resultado['fon_nome']?></td>
                <td><?php echo $resultado['fon_logo']?></td>
                <td><?php echo $resultado['fon_confiabilidade']?></td>
                <td><?php echo $resultado['fon_website']?></td>
                <td><?php echo $resultado['pol_polarizacao']?></td>
                <td class="editar" >
                    <a href="editar_fonte.php?codigo=<?php echo $resultado['fon_codigo'];?>">Editar</a>
                    <a href="?excluir=<?php echo $resultado['fon_codigo'];?>">Excluir</a>
                </td>
            </tr>            
        <?php } ?>
         <!--======-- fim ex 1 --=======-->
      </table>
    </div>
    <!--≡≡≡≡≡=====- # fim tbl de result # -=======≡≡≡≡≡-->


    <div class="footer-dark">
      <!--=========== FOOTER ===============-->
      <footer>
        <div class="container" style="font-family: sans-serif;">

          <div class="row">

            <!-- > SEÇÃO 1_UM do Footer -->
            <div class="col-sm-6 col-md-3 item">
              <h3>Sobre nós</h3>
              <ul>
                <li><a href="#">Quem Somos</a></li>
                <li><a href="#">Central de Ajuda</a></li>
                <li><a href="#">Como Funciona o FFN</a></li>
              </ul>
            </div>

            <!-- > SEÇÃO 2_DOIS do Footer -->
            <div class="col-sm-6 col-md-3 item">
              <h3>Privacidade</h3>
              <ul>
                <li><a href="#">Condições de Uso</a></li>
                <li><a href="#">Informações Legais</a></li>
                <li><a href="#">Aviso de Privacidade</a></li>
              </ul>
            </div>

            <!-- > SEÇÃO 3_TRÊS do Footer -->
            <div class="col-md-6 item text">
              <h3>FFN - Fighting Fake News</h3>
              <p>
                O projeto se propõe a pesquisar, selecionar, filtrar e avaliar
                notícias e jornais eletrônicos, no intuito de fornecer ao usuário
                referências úteis para o julgamento individual da veracidade presente nelas.
              </p>
            </div>

            <!-- > REDES SOCIAIS no Footer -->
            <div class="col item social">
              <a href="#"><i class="icon ion-social-facebook"></i></a>
              <a href="#"><i class="icon ion-social-twitter"></i></a>
              <a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>

          </div>

          <!-------- Direitos Reservados ao FFN 2021 ---------->
          <p class="copyright">
            FFN © 2021</p>

        </div>
      </footer>
      <!--===========- fim footer -==============-->
    </div>


    <!--=========== IMPORTAÇÃO DO BOOTSTRAP ===========-->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script><!------== Fim da Importação =------->

  </body>
 <!--≡≡≡≡≡≡≡≡≡≡=-# fim body #-=≡≡≡≡≡≡≡≡≡≡≡≡-->
</html>