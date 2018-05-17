# DESAFIOREDEHOST
Projeto Ansible para testar conhecimentos.

# Período para realização do projeto:
Entre os dias 11 e 17 de maio de 2018.

# Escopo do projeto:

<li>Desenvolver playbooks Ansible, que sejam capazes de provisionar um ambiente de Hospedagem Linux.</li>
<li>Deve conter dois sites com conexão ao banco de dados, desenvolvido em PHP.</li>
<li>Os sites devem ser acessíveis via endereço DNS (crie domínios com extensão gratuita).</li>
<li>Tecnologias obrigatórios: Ansible, Apache, MySQL e PHP.</li>

# Passo a passo do projeto:

Devido ao tempo, precisei me organizar entre as tarefas já agendadas e o projeto.
Para não deixar recurso parado desnecessáriamente, resolvi deixar apenas para os últimos dias para solicitar os equipamentos.

As tarefas foram organizadas da seguinte maneira:
Período: dias 11 e 13
- Estudar a tecnologia a ser utilizada (ansible) e realizar outras tarefas;
Período: dias 13 e 14
- Montar um ambiente de teste;
- Implementar o projeto no ambiete de teste;
- Testar no ambiente de teste; 
Período: dia 15
- Solicitar a infraestrutura necessária e corrigir algum erro no código.
Período: dias 16 e 17
- Implementar o projeto na infraestrutura final;
- Testar;
- Escrever este README; ;)
- Enviar por email para o solicitante.

# INFRAESTUTURA UTILIZADA:
>> Para o ambiente de teste foram utilizados:

Hardware: Notebook Asus Celeron 8gb ram, 500hd.
Software: VirtualBox com 3 maquinas virtuais, configuradas cada uma com 1gb de ram e 8gb de hd.


>> Para o projeto final foram utilizados:
Devido ao pedido ser de apenas 2 sites funcionais e apenas um playbook ansible, foi solicitada a menor configuração disponível no site:
<li>Sistema operacional CentOS 7 64-bit</li>
<li>1GB Memória</li>
<li>VCPU</li>
<li>40GB Block Storage</li>
<li>1MB Link Dedicado</li>

Para melhor entendimento e organização, foram solicitadas 3 maquinas:
HOST1: ANSIBLECONTROL
Para operação do Ansible.

HOST2: CENTOSWEBPHP
Para servir como Webserver.

HOST3: CENTOMYSQL
Para servir como DB Server.

# TECNOLOGIAS SOLICITADAS:

>> ANSIBLE
Ansible é uma plataforma de automação simples de usar, robusta e totalmente de código aberto. 
Devido a sua facilidade de entendimento mas complexidade da sua capacidade em seu uso é amplamente utilizada e estudada
Possui farto material de estudos e exemplos.
Para este projeto vamos utilizar o repositório como base:
https://github.com/ansible/ansible

Devemos utilizar as tecnologias Apache, Mysql e PHP. 
Então optei por usar apenas o exemplo abaixo como base do nosso playbook:
https://github.com/ansible/ansible-examples/tree/master/lamp_simple_rhel7

Alguns erro foram identificados no projeto oficial, principalmente relativo ao mysql, mas todos foram sanados.

>> MYSQL E PHP
Devido a familiaridade e entender que possui um código mais estável e ainda assim ser um Mysql, optei por usar o MariaDB como Mysql deste projeto.

>> Apache
O sistema operacional utilizado foi o Centos 7, por compatibilidade usamos o Apache em sua ultima versão (httpd).

>> Sites com dns gratuito
Site de hospedagem gratuita, foi utilizado o NOIP (https://my.noip.com)

Sites criados foram: 
http://desafioredehost01.hopto.org/
http://desafioredehost02.hopto.org/

Conforme solicitado, ambos com códigos PHP interagindo com o banco de dados.

Para melhor funcionamento, ambos estão configurados como virtualhosts no Apache, funcionando perfeitamente na porta 80 no mesmo webserver.

# RESULTADO FINAL:

>> ANSIBLE
Conforme solicitado foi criada a ansible-playbook: site.yml
Estrutura:

site.yml
	|--roles
		|-common
			|-tasks
				main.yml
		|-db
			|-handlers
				main.yml
			|-tasks
				main.yml		
		|-web
			|-handlers
				main.yml
			|-tasks
				main.yml
				copy_code.yml
				install_httpd.yml
			|-templates
				index.php.j2
Este script foi feito para uso geral, para disponibilizar um serviço de hospedagem de site, com acesso ao banco de dados e php, totalmente funcional.

O arquivo pode ser utilizado em outras maquinas bastando disponibilizar o acesso ssh e rodar o script com o comando:
ansible-playbook site.yml ou ansible-playbook site.yml -vvvvvv para melhor visualização de eventuais falhas.

Todos os hosts possuem uma chave publica do host operador Ansible para facilitar o gerenciamento e podem ser acessadas pelo operador via ssh sem a necessidade de digitação da senha em todo o acesso, o que tornaria inviavel a operação se fosse de outra maneira.

APACHE, PHP E MYSQL
Após isso, para complemento do projeto, foram feitos individualmente os sites solicitados.
Para isso foi necessário modificar alguns parametros utilizados no script ansible que prevê somente um site.
Foram adicionados hostsvirtuais e instalado a aplicação do responsável pelo redirecionamento gratuito de dns (noip).

Quanto ao sistema operacional, foi necessário também fazer a modificação do arquivo SELinux para melhor funcionamento do http com maquinas virtuais e acesso ao banco de dados em host remoto. SELinux foi configurado como "Permissive". Também foram modificados os dns dos servidores para o melhor funcionamento, atualizações e acesso externo.

Relativo ao banco de dados MariaDB, foi necessário remover do script a parte onde colocava opções customizadas de log e erro, devido a falha no software. No playbook final o erro já está corrigido, não utilizando configuração personalizada de log, pid e erros. Conforme bug reportado no github na versão mais atualizada.

Os sites entregues estão com código simples, apenas para demonstração. Não houve preocupação com layout final.
Os sites estão com algumas funções e queryes básicas visando somente demonstrar a interação com o banco de dados em host remoto.

# CONSIDERAÇÕES FINAIS

Espero que o desafio tenha sido completado a contento. Aprendi bastante sobre ansible e vou passar a utilizar no meu dia a dia.
Todos os dias estamos aprendendo coisas novas e estar com a mente sempre aberta é muito importante para o desenvolvimnto pessoal.

Para melhor entendimento disponilizei todos os arquivos aqui no github para consultas posteriores.

Desde já agradeço a atenção dispensada.