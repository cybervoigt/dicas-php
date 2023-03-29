<?php

/**
 * SOLID
 * https://medium.com/desenvolvendo-com-paixao/o-que-%C3%A9-solid-o-guia-completo-para-voc%C3%AA-entender-os-5-princ%C3%ADpios-da-poo-2b937b3fc530
 * 
 * 
 * S - Single Resposibility principle
 * O - Open-closed principle
 * L - Liskov Substitution principle
 * I - Interface Segreggation principle
 * D - Dependency Inversion principle
 * 
 */


# S - Single Resposibility principle
# High cohesion, low coupling.



# O - Open-closed principle



# L - Liskov Substitution principle
class A 
{
    public function getNome()
    {
        echo 'Meu nome é A';
    }
}

class B extends A 
{ 
    public function getNome()
    {
        echo 'Meu nome é B';
    }
}

$objeto1 = new A;
$objeto2 = new B;

function imprimeNome(A $objeto)
{
    return $objeto->getNome();
}

imprimeNome($objeto1); // Meu nome é A
echo "\n";
imprimeNome($objeto2); // Meu nome é B



# I - Interface Segreggation principle



# D - Dependency Inversion principle



?>