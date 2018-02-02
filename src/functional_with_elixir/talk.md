---
title: {{TITLE}}
theme: night
progress: true
revealOptions:
    transition: slide
---

# Functional Programming
### com uns mililitros de Elixir
[@mracos](https://github.com/mracos) 🔝

---

1. paradigmas e o que é programação funcional?
  1. trata a computação como uma avaliação de funções matemáticas (conceitozão acadêmico)
  1. enfatiza a aplicação de funções (ao contrário de oop (objetos) ou imperativo (mudança de estado))
  1. evita manter estado ou dados mutáveis
1. história
  1. lambda cálculo (modelo téorico)
  1. lisp (não exatamente funcional, mas construções como map)
  1. ...
1. conceitos
  1. modelagem matemática
  1. imutabilidade (por que: estados em sistemas complexos, sem incosistências) (n pq: muito uso de memória)
    1. listas em elixir, variáveis
  1. pureza em funções
    1. sem efeitos colaterais (side effects) (IO, memória)
    1. imutabildade no resultado (predição, certeza, testabilidade, consistência e confiança)
  1. sobre funções em si
    1. funções de primeira classe/funções de alta ordem
      1. composabilidade entre as funções
    1. funções anônimas
    1. recursão (não para loops tradicionais)
    1. avaliação preguiçosa / avaliação apressada
    1. são + transparentes


> blokquote **bold** *italic* [link](https://www.google.com)

---
---

slide with lists and some markdown markup
- item 1
- item 2

> blokquote **bold** *italic* [link](https://www.google.com)

---


<!-- .slide: data-background="./assets/path/to/something.png" -->
slide with meta data

---

slide with sub slides

----

```elixir
# slide with code snippets
IO.puts "yay"
```

Note:
- and notes

----

slide with embed html and appear effects
html ahead <sup>[1](mixed with markdown)</sup>
<ul>
    <li class="fragment"> 1 item </li>
    <li class="fragment"> 2 item </li>
    <li class="fragment">
        3 item
        <ul>
            <li class="fragment"> 3.1 item </li>
            <li class="fragment"> 3.2 item </li>
        </ul>
    </li>
</ul>

---

Questions?

---

Thanks! 😸

---

# EXTRAS

---
