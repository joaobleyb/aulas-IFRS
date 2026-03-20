import pytest
from mod_jvbb2004 import cripto_cesar

# Casos Tipicos: 

def test_criptar_maiusculas():
    assert cripto_cesar("ABC", 3) == "DEF"

def test_criptar_minusculas():
    assert cripto_cesar("abc", 3) == "def"

def test_criptar_mista():
    assert cripto_cesar("AbC", 3) == "DeF"

def test_espacos_e_numeros():
    assert cripto_cesar("Oi 123!", 5) == "Tn 123!"

# Casos de borda:

def test_string_vazia():
    assert cripto_cesar(" ", 5) == " "

def test_k_zerado():
    assert cripto_cesar("Morder", 0) == "Morder"

def test_k_negativo():
    assert cripto_cesar("DEF", -3) == "ABC"

def test_ultima_letra_alfabeto():
    assert cripto_cesar("Zz", 1) == "Aa"

def test_somenteSimbolos():
    assert cripto_cesar("!@$%&*", 3) == "!@$%&*"