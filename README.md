# 🎬 PyCine 🍿
![](https://i.imgur.com/rZkNahQ.jpg)

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O projeto desenvolvido em Python é um sistema de gerenciamento para um cinema local, que busca **automatizar** e **digitalizar** os processos relacionados à administração do estabelecimento. Através deste programa, é possível realizar operações básicas de CRUD (criação, leitura, atualização e exclusão) para diferentes entidades, como filmes, clientes, ingressos e *outros (sobre isso, mais adiante)*. O objetivo principal é fornecer um controle eficiente e preciso das atividades que ocorrem no cinema, permitindo que a equipe tenha uma visão abrangente e organizada das informações.
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Além disso, o sistema também visa atender a **requisitos acadêmicos**, servindo como uma avaliação para a disciplina "DCT1101 - Alg. Lógica de Programação" da faculdade de Bacharelado em Sistemas de Informação - UFRN.

## Funcionalidades

O **PyCine** oferece as seguintes funcionalidades principais:

- Controle de ingressos, sessões, e poltronas;
- Cadastro e gerenciamento de filmes e clientes;

## Subprogramas

O PyCine é dividido em módulos que correspondem às diferentes entidades do sistema:

### Filmes

Permite cadastrar e gerenciar as informações relacionadas aos filmes exibidos no cinema. Cada filme é caracterizado por atributos como:
1. **título, gênero(s),**
2. **diretor(es)** e **data de lançamento,**
3. **classificação indicativa,** e **duração**

### Ingressos

O subprograma *"Ingressos"* possibilita o controle dos ingressos vendidos para as sessões de filmes. Cada ingresso é identificado por um **ID único** que corresponderá à convenção de cada cinema. Há uma sugestão exemplo de modelo:
> **`"A3S4"`**: Poltrona na fileira A cadeira 4, quarta "S" sala/sessão (4)<br>
> **`"H1S2"`**: Poltrona na fileira H cadeira 1, segunda "S" sala/sessão (2)

Dessa forma, é gerado um código único que é utilizado como identificador do ingresso.

![](https://i.imgur.com/7capjUH.jpg)

O restante das propriedades do ingresso inclui: 
1. **nome do cliente** (que adquiriu o ingresso),
2. **data e hora da sessão,** e
3. **filme em exibição.**

### Clientes

Permite cadastrar e gerenciar informações dos clientes do cinema. É possível armazenar dados como **nome, idade, telefone, CPF** e outras informações.

## Banco de Dados
![](https://i.imgur.com/UzaVnkT.png)

&nbsp;&nbsp;&nbsp; O projeto utiliza um banco de dados local em formato binário ".dat" para armazenar e gerenciar as informações relacionadas aos filmes, ingressos e clientes do cinema. Esse banco de dados é manipulado por meio das operações básicas de abertura (open), escrita (write) e carregamento (load) de dados nos arquivos correspondentes.<br>
&nbsp;&nbsp;&nbsp; Cada entidade do sistema, como filmes, ingressos e clientes, possui seu próprio arquivo ".dat", no qual as informações são armazenadas de forma estruturada. Essa abordagem permite o armazenamento persistente dos dados, garantindo que as informações sejam preservadas mesmo após o encerramento do programa.<br>
&nbsp;&nbsp;&nbsp; As operações CRUD (Create, Read, Update, Delete) são implementadas para permitir a criação, leitura, atualização e exclusão de registros no banco de dados. Essas operações são realizadas diretamente nos arquivos ".dat" correspondentes, proporcionando a manipulação eficiente e precisa dos dados.

*É importante ressaltar que o banco de dados atual é local e específico para cada instalação do programa. Caso seja necessário compartilhar os dados entre diferentes instâncias do sistema, será necessário adotar uma abordagem de banco de dados centralizado ou utilizar tecnologias de sincronização de dados adequadas.*

## Updates Futuros
> Para os próximos updates do projeto, estou planejando desenvolver um sistema adicional destinado exclusivamente aos funcionários e gerentes do cinema local. Esse sistema terá recursos avançados de permissões e autenticações para garantir a segurança e a privacidade das informações sensíveis.

### PyCine Manager

> O módulo *"Managing"* possibilitará o gerenciamento dos usuários que controlam o sistema. Existem dois tipos de usuários: **administradores**, responsáveis pela gestão global do sistema *(permissão total)*, e **funcionários comuns**, que possuem *permissões limitadas*. O controle de acesso e autenticação serão implementados para garantir a segurança do sistema.

### 🎥 Permissões de Filmes
|              | ➕ CRIAR | 🔁 ATUALIZAR | 🔍 BUSCAR | 🗑️ REMOVER | 👁️ VER |
| ------------ | --------- | ------------ | ---------- | ---------- | ------- |
| **ADMIN**     |   ✔     |     ✔        |     ✔      |     ✔      |    ✔   |
| **Func. Comum** |        |      ✔      |       ✔     |            |    ✔   |
| **Cliente**   |          |              |      ✔     |            |    ✔   |


### 🎟️ Permissões de Ingressos
|              | ➕ CRIAR | 🔁 ATUALIZAR | 🔍 BUSCAR | 🗑️ REMOVER | 👁️ VER |
| ------------ | --------- | ------------ | ---------- | ---------- | ------- |
| **ADMIN**     |   ✔     |     ✔        |     ✔      |     ✔     |    ✔   |
| **Func. Comum** |   ✔   |      ✔      |       ✔     |     ✔     |    ✔   |
| **Cliente**   |    ✔    |              |      ✔     |     ✔      |    ✔   |

### 👤 Permissões de Clientes
|               |    ➕ CRIAR      |     🔁 ATUALIZAR    | 🔍 BUSCAR |     🗑️ REMOVER      | 👁️ VER |
| ------------- | ---------------- | -------------------- | ---------- | ------------------- | ------- |
| **ADMIN**     |         ✔        |          ✔          |     ✔      |          ✔         |    ✔   |
| **Func. Comum** |        ✔        |          ✔         |      ✔     |          ✔         |    ✔   |
| **Cliente**   | (apenas o próprio) | (apenas o próprio) |      ✔     | (apenas o próprio) |    ✔   |

Essa adição funcionará como um complemento da versão padrão para clientes, e proporcionará uma melhor organização interna e agilidade nas operações diárias, contribuindo para uma experiência ainda mais satisfatória tanto para os clientes quanto para os profissionais envolvidos.

## Contribuição

Este projeto foi desenvolvido como parte de um trabalho acadêmico e não possui suporte ou manutenção contínua. No entanto, sinta-se à vontade para usar o código como referência ou fazer melhorias por conta própria. Se você encontrar algum problema, pode tentar solucioná-lo e entrar em contato.
