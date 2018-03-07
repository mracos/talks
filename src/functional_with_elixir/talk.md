---
title: Existe um mundo além de OOP e procedural
theme: league
progress: true
revealOptions:
    transition: slide
---

<!-- .slide: data-background="./bg_1.webp" -->
# Existe um mundo além de OOP e procedural
[@mracos](https://github.com/mracos) 🔝

---

## ou sobre programação funcional

Note:
  Sobre os conceitos que permiam programação, ou vários tipos

  Mas antes:

---

### paradigmas
#### (de programação)

- são as diferentes formas de "pensar" em programação

---

### paradigmas
#### procedural (imperativo)

- receitinha de bolo
- um passo a passo

linguagens: **Pascal**zin, **C**top

----

### paradigmas
#### procedural

```ruby
customer = {name: "marcos", balance: 100, products: []}
seller = {name: "julia", balance: 0, product: :water}

# saque
customer_money = 10
customer[:balance] -= customer_money

# compra
seller[:balance] += customer_money
customer[:products] << seller[:product]
```

Note: eu defino tudo o que tem que ser feito, todo o passo-a-passo

---

### paradigmas
#### oop (orientação a objeto)

- objetos que tentam "abstrair" a vida real
- estado (atributos) e ações (métodos) com objetos interagindo consigo

linguagens: **java**li, **ruby**pop 360 HD

----

### paradigmas
#### oop

```ruby
customer = Customer.new("marcos", 100)
seller = Seller.new("julia", 0, :water)

seller.set_product_price(10)
customer.buy(seller)
```

---

### paradigmas
- **declarativo**
- **lógico**
- **simbólico**
- ...

---

### paradigmas
#### misto (n de queijo)

- maioria das liguagens na real

Note: mistura alguns paradigmas
      tipo, encapsula em objetos mas a lógica é em procedural

---

### paradigma
#### funcional

---

### funcional

- lambda cálculo (modelo téorico) (1930)
- lisp e serviu de inspiração para linguagens mais novas
- IPL |> APL |> FP |> ML |> ... |> Haskell (foi tipo uma implementação referência)
- bastante emabasamento acadêmico/matemático
  - type theory (em linguagens fortementes tipadas)

---

### funcional

- trata a computação como uma avaliação de funções matemáticas
  1. tenta chegar mais perto do conceito acadêmico de funções
  1. modelagem matemática
    - função identidade: `f(x) = x`
    - função quadrática: `f(x) = x^2`

Note: a gente abstraiu o conceito de funções para "execução de um pequeno bloco de código"
       porém não é só isso, não precisa saber matemátoca avançada pra entender
       o básico é (teoricamente) mais de boa

---

### funcional

- enfatiza a aplicação de funções
  - ou seja, a tua aplicação/sistema funciona operando em cima de dados com funções trabalhando em conjunto
  - maior enfoque em **transformações de dado** ao invés de **mudança de estado**

Note: ao contrário de oop (objetos e estado + ações) ou imperativo (mudança passo-a-passo)

----

```
                                        \|/
 o           v----------v       o        o
/|\    ->    |função  de|      /|\  +   /|\
/ \          | clonagem |      / \      / \  <---- retorna novo com peruca
             | + peruca |       ^      
             V----------V       |_ antigo
```

---

### funcional

- imutabilidade
- pureza de funções
- aridade
- lazy/strict evaluation

---

### funcional
#### imutabilidade

- enfatiza não manter estado ou dados mutáveis (!!)
  1. imutabilidade

```elixir
defmodule Example do
  def add_four_to_array(array) do
    array ++ [4]
  end
end

arr = [1, 2, 3]
new_arr = Example.add_four_to_array(arr)

IO.puts(arr) # [1, 2, 3]
IO.puts(new_arr) # [1, 2, 3, 4]
```

Note: não muda o valor do array
        é bom porque tu não tem surpresas com estado mudando
       funções nomeadas só podem ser definidas dentro de módulos
       (ajuda a organizar o código)
       (não é sobre elixir)

---

### funcional
#### funções puras

funções não deveriam ter efeitos colaterais
  1. "imutabildade" no resultado (resultado só depende dos argumentos passados)

```elixir
sum = fn (x, y) -> x + y end
sum.(1, 2) # SEMPRE vai ser 3
```

```elixir
sum_with_api = fn (x, y) -> x + get_y_from_api(y) end
sum.(1, 2) # não me dá certeza, pode ter erro etc...
```

Note: (predição, certeza, testabilidade, consistência e confiança)
---

### funcional

- acaba sendo mais declarativo
  - gente define pequenas funções que a gente sabe exatamente o que faz

Note: por que tu seta exatamente o que a função vai fazer, e vai transformando o dado
---

### funcional
#### aridade

quantos parâmetros uma função tem

- `Example.add_four_to_array(array)` tem aridade de **1**
- `Example.add_x_to_array(array, x)` aridade seria **2**

Se escreve como `Example.add_four_to_array/1`

Note: só um conceito pra entender o próximo slide

---

### funcional
#### strict/lazy evaluation

1. avaliação preguiçosa / avaliação apressada (lazy evaluation)
  - **lazy evaluation**:
    Só computa o valor/código se realmente necessário
  - **strict evaluation**:
    Computa o valor de qualquer forma

----

### funcional
#### strict/lazy evaluation

```elixir
# demora um senhor tempo
list = 1..1000000
filtered_list = Enum.filter(list, &(rem(&1, 2))
Enum.take(filtered_list, 2) # [2, 4]

# não demora nada
lazy_list = 1..1000000
filtered_lazy_list = Stream.filter(lazy_list, &(rem(&1, 2) == 0))
Enum.take(filtered_lazy_list, 2) # [2, 4]
```

Note:
    Demorou um puta tempo pq mesmo a gent só pegando 2 no final, ele executou toda a interação de
    1..1000000 primeior antes de continuar
    Não demorou quase nada porque não executou toda a interação, e sim fecha a "pipeline" pra cada item
    Se a gente ver a estrutura da `stream` é uma representação da lista e uma sequência de funções a *serem* aplicadas

---

### funções
- como se comportam em um paradigma funcional?

Note: algumas particularidades

---

### funções
- **lambdas (funções anônimas)**

  (*lambda lambda jovem nerdsss*)
- **closures**

Note: alguns conceitos pra falar

----

### funções
#### lambdas

são funções sem um nome

```elixir
# funções não anônimas
defmodule Multiply do
  def by_two(value) do
    value * 2
  end
end

Enum.map([1, 2, 3], &Multiply.by_two/1) # [2, 4, 6]

# funções anônimas
Enum.map([1, 2, 3], fn x -> x * 2 end) # [2, 4, 6]
```

Note: fn é como a gente define uma função anônima

----

### funções
#### closures

funções que mantém o escopo em que foram definidas (!!)

```èlixir
x = 10
sum_ten = fn (y) -> x + y end

sum_ten.(10) # 20

x = 20
sum_ten.(10) # 10
```

----

### funções
#### closures

- a função foi definida quando `x` era 10
- mudou a definição de `x` para 20
- a função continou com a definição de quando `x` era 10
  - Porque ela é uma closure
- consistência irmãos!

Note: operador `&` é o que a gente usa pra passar a referência daquela função

---

### funções

- **first class** (funções de primeira classe)
- **funções de alta ordem** (high order)
- **curry**

----

### funções
#### first class functions

funções podem ser guardadas em variáveis, retornadas de funções e passadas como parâmetro

```elixir
# podém ser guardadas em variáveis
multiply_by_two = fn (x) -> x * 2 end
multiply_by_two.(2) # 4

# podem ser passadas como argumento
mutiply_by = fn (x, function) -> function.(x) end
multiply_by.(2, &multiply_by_two/1) # 4
```

Note: o que as funções tem que ser em um paradigma funcional

----

### funções
#### high order functions

- é uma função que retorna outra função

```èlixir
hello_to_name = fn
  (name) -> fn -> "Hello, #{name}" end
end

greet_marcos = hello_to_name.("Marcos")
greet_marcos.() # Hello, Marcos
```

Note: funções mais especializadas sem precisar passar o parêmtro
----

### funções
#### curry (não é a comida rs)

Uma função que retorna outra função de menor aridade
com algum arguemnto já *"preenchido"*

```elixir
print_if_debug = fn
  (value, debug) -> if (debug), do: IO.puts(value)
end

always_print = fn (value) -> print_if_debug.(value, true) end

print_if_debug.(123, true) # 123
print_if_debug.(123, false) # nil

always_print.(123) # 123
```

Note: exemplo com configurações, já que é imutável a gente passa muita coisa por argumento
      fazer uma função com o argumento já "ligado" pode ser que faça escrever menos código

---

### funções
#### pattern match

Funções podem ser definidas com base nos seus parâmetros

```elixir
print_if_debug = fn (value, true) -> IO.puts(value)

print_if_debug.(123, true) # 123
print_if_debug.(123, false) # Erro, função não encontrada
```

Note: pq as funções podem ser definidas com base nos seus argumentos!!

----

#### pattern match

Um dado que "casa" com o outro
- `=` é um operador de pattern match

```èlixir
variavel = 4
4 = variavel

[1, 2, 3, 4] = [1, 2, 3, variavel]
[primeiro, 2, 3] = [1, 2, 3]

sum_only_with_one = fn (1, y) -> 1 + y end # só é chamada caso o primeiro parêmtro seja 1
```

Note: Muito bom porque tu nõa precisa ficar checando dado, tu seta isso na própria definição da função

---

### functional programming?

----

### functional programming?
#### the good fellas

- imutabilidade
  - sem surpresas
  - mais explícito

----

### functional programming?
#### the good fellas

- sucinta, mais fácil de ler
- de grátis building blocks para paralelismo | concorrência
- "força" composibildade (de funções)
- geraelmente devs "melhores" (buscam além do que precisam)
  - código mais maintanable

----

### functional programming?
#### the bad fellas

1. outra forma de pensar -> curva de aprendizado
1. alta memória
1. outra format de pensar
1. (pra algumas coisas) too much mathy

----

Devs ruins vão desenvovler código ruim de qualquer forma

---

### lhes apresento
#### Elixir

----

Não é sobre elixir, é sobre os conceitos lá atrás :)

Note: Mas o porque de eu ter escolhido essa inguagem e não jshit 

----

#### Elixir
#### pq?

1. pq?
  1. feita na vm da erlang (tolerância a falhas de grátis, concorrência, maturidade)
  1. feita por um br !!!!!
  1. tooling MUITO bom (ferramentas que permeiam a linguagem)
  1. sintaxe (só sintaxe) inspirado em ruby (<3)
  1. comunidade mt top

Note: php tem que baixar o composer, npm vive dando merda ai e tem que baixar um react-cli, vue-cli...
---

Dicas

- *prependar* é sempre preferível a *appendar* uma lista

  listas em elixir/erlang sõa linked lists, ou seja, adicionar no início da lista é sempre
  O(1) (mais rápido) que no final O(n) (velocidade depende do tamanho da lista)

  dora o lance de ser imutável e ter que copiar toda a lista pq foi no final

Note: prependar: adicionar no início, appendar: adicionar no final

---

Questions?

---

énós! 😸

---

# learn more

----

- https://elixir-lang.com
- https://elixirschool.com/pt/
- https://elixirforum.com/

----

- [talk jose valim](https://youtu.be/IZvpKhA6t8A)
- https://medium.com/making-internets/functional-programming-elixir-pt-1-the-basics-bd3ce8d68f1b
- https://medium.com/@cameronp/functional-programming-is-not-weird-you-just-need-some-new-patterns-7a9bf9dc2f77
- https://speakerdeck.com/arthurbragaa/introducao-a-programacao-funcional-com-elixir

---
