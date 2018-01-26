---
title: OOP
theme: night
progress: true
revealOptions:
    transition: slide
---

# OOP
### ~~Pure~~ Object Oriented Programming
[@mracos](https://github.com/mracos) 🔝

---

- Object oriented programming is not **only** about **classes**!!
    - For instance, in javascript and lua we have prototype based inhiterance (no classes)
    - will explain later 😼

---

Object oriented programming is about: PASMEN, **objects**

Remeber objects? That little things that you say that are **only** instantiated classes?

Well, they are much more

---

<!-- .slide: data-background="./assets/matrix.gif" -->
Take the red pill neo 🔴 💊

---

Objects were made to simplify and abstract some concepts like
- state (data)
- ~~complex~~ interactions between and using *state*

Note: Back there when alan key came with the concept

---

One example:
- we have an `Account` object, with a `bankroll` state of 100 dollars
- we also want to have the possibility of `withdrawing` and `depositing` money

----

```ruby
account = Object.new
# => #<Object:0x00005645237b8810>
account.instance_eval do
    def bankroll
        @bankroll
    end
    def deposit(quantity)
        if @bankroll
            @bankroll += quantity
        else
            @bankroll = quantity
        end
    end
    def withdraw(quantity)
        @bankroll -= quantity
        quantity
    end
end
# => :withdraw
```
Note:
- I'm just executing in the context of the class
- the instance_eval is just the way the language do this
- in javascript we could do the same

----

```ruby
account.bankroll
# => nil
account.deposit 12
# => 12
account.bankroll
# => 12
account.withdraw 4
# => 4
account.bankroll
# => 8
```
Note:
I can have an object `user` that has the account `state`
And it iteracts via method call

---

- See that we didin't touch about `classes`, `inhiterances`, `methods`, `properties`, `polymorphism` and all that things?

> And yet, we covered the **OOP core**, that is **state and interactions** regarding objects


---

- With **state** we can relate to `instance properties`
- As for **message passing**, here we can call then `methods`

----

- we are passing the `deposit` message to the account object
- with the 100 "body"

```ruby
account.deposit 100
# => 108
```

----

- we have the bankroll state

```ruby
account.instance_variables
# => [:@bankroll]
account.instance_variable_get "@bankroll"
# => 108
```

---

But why call then that? Because at least on more pure OOP languages, that is exactly what it means

When we call the objects methods we are *passing a message* to that object,
we do **operations on properties to mess with the state**

----

**We don't mess with the state directly!!**

----

```ruby
class Account
    @bankroll
end
# => nil
account = Account.new
# => #<Account:0x000055b5abac0b00>
account.bankroll
# => NoMethodError: undefined method `bankroll' for #<Account:0x000055b5abac0b00>
account.bankroll = 12
# => NoMethodError: undefined method `bankroll=' for #<Account:0x000055b5abac0b00>
```

Note:
Ruby kinda enforces not mess with the state

----

```ruby
class Account
    def bankroll
        @bankroll
    end
    def bankroll=(bankroll)
        @bankroll = bankroll
    end
end
# => :bankroll=
```

Note:
Note that even the instance variable accessor and writer are methods

But it gets tiring could it also be with `attr_accessor :bankroll`

----

- The accessor is a method

```ruby
account = Account.new
# => #<Account:0x000055b5ab5a9f68>
account.bankroll
# => nil
```

- Even the assignment of a instance is a method!!

```ruby
account.bankroll = 12
# => 12
account.bankroll
# => 12
```

- can be like this too

```ruby
account.bankroll= 52
# => 52
account.bankroll
# => 52
```

---

To a language be *pure* OOP (like smalltalk, and on some points ruby)
they have to have some properties like <sup>[1](http://wiki.c2.com/?AlanKaysDefinitionOfObjectOriented)</sup>
<ul>
    <li class="fragment"> **EVERYTHING** is an object </li>
    <li class="fragment"> no primitives like: `int`, `float` (they also are a class) </li>
    <li class="fragment">
        objects **ONLY** communicate by message passing
        <ul>
            <li class="fragment">that mean no operators</li>
            <li class="fragment">no public properties</li>
        </ul>
    </li>
    <li class="fragment"> ...  </li>
</ul>

----

- Everything is an object

```ruby
number = 1
# => 1
string = "marcos"
# => "marcos"
number.class
# => Integer
string.class
# => String
```

```ruby
1.class
# => Integer
"marcos".class
# => String
true.class
# => TrueClass
```

----

- A class is also an object!!! MINDBLOWN

```ruby
class A
end
# => nil

A.is_a? Object
# => true
A.class
# => Class
```

----

- We only communicate by message passing
```ruby
1.positive?
# => true
1.methods.slice(18, 6)
# => [:==, :===, :[], :inspect, :size]
1.== 2
# => false
1.size
# => 8
1.respond_to? "+"
# => true
```

----

- not so pure

```ruby
if.class
# => SyntaxError: unexpected '.'
```

---

Questions?

---

Thanks! 😸

---

# EXTRAS

1. Prototype based inheritance

---
