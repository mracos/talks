---
title: terraform
theme: night
progress: true
revealOptions:
    transition: slide

---

<!-- .slide: data-background="https://i1.wp.com/windowscustomization.com/wp-content/uploads/2018/09/flat-earth.gif" -->

## terraform 🌍
### alguma coisa

@markito

Note:
- mudei o nome pq sim, era com ansible mas isso fica pra próxima
- os slides estão bem cru, o que importa sou eu aqui falando com vocês

---

<!-- .slide: data-background="https://picsum.photos/id/811/1080/720" -->

pq ter uma talk sobre terraform? 🧐

- IaaC no geral parece ser algo mais comum nas empresas
- talvez tenha a possibilidade da gente ter que lidar com isso
- pq é um assunto que eu curto 🤪

Note:
    - Trombamo com isso no projeto passado

----

<!-- .slide: data-background="https://picsum.photos/id/811/1080/720" -->

objetivo da talk 🎯

- dar uma noção sobre o assunto
- melhorar a _pesquisabilidade_ caso apareça no futuro de vocês

Note:
    - n sou expert em nada, então posso esquecer algumas coisas
    - ninguém vai sair especialista em nada aqui

---

<!-- .slide: data-background="https://picsum.photos/id/811/1080/720" -->

mas... pra que serve esse treco? 🤵

- possibilitar a **automatização** da tua infra
    - máquinas virtuais no Google Cloud
    - queues no Amazon SQS

Note:
- tecnicamaente é só cloud
- Da pra usar com alguns serviços locais, tipo rabbitmq
    - criar os tópicos
    - outra coisa vai ter que subir teu servidor do rabbitmq

----

<!-- .slide: data-background="https://picsum.photos/id/811/1080/720" -->

<span class="fragment fade-out">blz, já sei pra que serve 👍</span>
<span class="fragment">mas o que exatamente é `terraaform`? 🤔</span>

<ul class="fragment">
    <li>aplicação CLI escrita em GO + conjunto de arquivos com a extensão `.tf`</li>
    <li><b>não é o que provisiona as tuas máquinas</b></li>
</ul>

Note:
- n provisiona: não instala o ruby, somente cria as máquinas
- onde tu vai "escrever a tua infra"

----

<!-- .slide: data-background="https://picsum.photos/id/811/1080/720" -->

e agora, porque usar? 📄📈📊

<ul>
    <li class="fragment">
        IaaC: automatização; testabilidade; processos; replicabilidade; documentação.
    </li>
    <li class="fragment">Cross vendor (qualquer cloud)</li>
    <li class="fragment">Bem mantido e ativo</li>
</ul>

Note:
- Muitos dos benefícios vem de IaaC como um todo
    - processos: ao redor da mudança da tua infra
    - automatização: replicabilidade
    - confiabilidade:
- poderia ser cloudformation (mas não ser é melhor? vendor lock-in)
- é bem mantido, tem uma empresa por trás (hashicorp)

---

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

o mínimo para fazer alguma coisa 💡

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

conceitinhos 📚

<ul>
    <li style="position:absolute;left: 35%" class="fragment fade-out">
        <em><code>*.tf</code> files</em>
        <ul>
            <li>
                <a href="https://www.terraform.io/docs/providers/index.html">providers</a>
                <ul><li>aws, digital ocean</li></ul>
            </li>
            <li>
                resources
                <ul>
                    <li>máquinas virtuais no EC2</li>
                    <li>banco de dados no RDS</li>
                    <li>buckets no S3</li>
                </ul>
            </li>
        </ul>
    </li>
    <li style="position:absolute;left: 35%" class="fragment">
        <em>state</em>
        <ul>
            <li>
                <a href="https://www.terraform.io/docs/backends/types/index.html">backends</a>
                <ul><li>pode ser um arquivo local ou S3 por exemplo</li>
            </li>
        </ul>
    </li>
</ul>

Note:
- tf files
    - providers: onde são criadas as coisas;
    - resources: as coisas que tu cria;
    - cada provider tem seu subset de resources: aws != DO
- state
    - assim que o terraform mantém o histórico e sabe o que criar ou destruir
    - é um arquivo json basicamente
    - onde ficam as referências das coisas que tu criou **pelo terraform**

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

comandinhos 💻

- `init`
    - inicializa o repositório tf, baixa as "depedências" (providers, backends)
    - sincroniza o state "remoto" com o local

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

comandinhos 💻

- `plan`
    - planeja qualquer mudança que você fizer nos arquivos (criação, destruição)

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

comandinhos 💻

- `apply`
    - "commita" as mudanças que você checou no `plan`

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

hora das coisas darem errado 🚨

---

<!-- .slide: data-background="https://picsum.photos/id/681/1080/720" -->

mais do que o mínimo 🕯

----

<!-- .slide: data-background="https://picsum.photos/id/681/1080/720" -->

conceitinhos 📚

- `*.tf` files
    - data
    - _variables_
        - `TF_VAR_variable`
        - `-var-file=`
    - referências cruzadas

----

<!-- .slide: data-background="https://picsum.photos/id/681/1080/720" -->

comandinhos 💻

- `fmt`
    - formata os arquivos
-  `validate`
    - valida os arquivos

----

<!-- .slide: data-background="https://picsum.photos/id/681/1080/720" -->

comandinhos 💻

- `plan` e `apply`
    - argumento `-plan-file=`

----

<!-- .slide: data-background="https://picsum.photos/id/172/1080/720" -->

hora das coisas darem errado 🚨

---

<!-- .slide: data-background="https://picsum.photos/id/1031/1080/720" -->

agora o bagui é loco 🔥

----

<!-- .slide: data-background="https://picsum.photos/id/1031/1080/720" -->

conceitinhos 📚

- modules
    - código externo, organização de código, coisas reutilizáveis

Note:
- Modulo base
- tipo herança

----

<!-- .slide: data-background="https://picsum.photos/id/1031/1080/720" -->

conceitinhos 📚

- [provisioners](https://www.terraform.io/docs/provisioners/index.html)
    - script
    - chef
- workspace
    - diferentes ambientes, mesma infra
        - qa vs prod

Note:
- provisioner
    - é o que vai instalar os teus pacotes
    - não cheguei a usar mt, só o de ansible
    - usei docker images e packer
    - podem ser plugins comunitários
- workspaces
    - mesma infra, diferentes ambientes
----

<!-- .slide: data-background="https://picsum.photos/id/1031/1080/720" -->

conceitinhos 📚 / comandinhos 💻

- import
- output

Note:

- import: infra que já existe e quer trackear pelo tf
- output: informações que podem ser mostradas no console

---

<!-- .slide: data-background="https://picsum.photos/id/1022/1080/720" -->

extras 🎁

----

<!-- .slide: data-background="https://picsum.photos/id/1022/1080/720" -->

- provisionaamento (ansible)
- packer, docker images (usar imagens pra não precisar provisionar)
- vault, aws secrets manager, gerenciamento de secrets
- cloud-formation, específico da aws