import pytest
from mod_jvbb2004 import cripto_cesar

# Casos Tipicos: 

def test_cripto_minusculas():
    assert cripto_cesar("abc", 2) == "cde"

def test_cripto_maiusculas():
    assert cripto_cesar("ABC", 2) == "CDE"

def test_cripto_mista():
    assert cripto_cesar("AbC", 2) == "CdE"

def test_cripto_espacos_e_numeros():
    assert cripto_cesar("Oi 123!", 2) == "Qk 123!"

# Casos de borda:

def test_cripto_string_vazia():
    assert cripto_cesar(" ", 2) == " "

def test_cripto_k_zerado():
    assert cripto_cesar("Morder", 0) == "Morder"

def test_cripto_k_negativo():
    assert cripto_cesar("DEF", -3) == "ABC"

def test_cripto_ultima_letra_alfabeto():
    assert cripto_cesar("Zz", 1) == "Aa"

def test_cripto_k_maior_que_alfabeto():
    assert cripto_cesar("abc", 27) == "bcd"

def test_cripto_k_muito_grande():
    assert cripto_cesar("abc", 52) == "abc" 

def test_cripto_somenteSimbolos():
    assert cripto_cesar("!@$%&*", 3) == "!@$%&*"

# Exceções: (Utilizando pytest.raises)

def test_cripto_k_nao_inteiro():
    with pytest.raises(TypeError):
        cripto_cesar("abc", "1")

def test_cripto_mensagem_nao_string():
    with pytest.raises(TypeError):
        cripto_cesar(123, 1)

def test_cripto_mensagem_none():
    with pytest.raises(TypeError):
        cripto_cesar(None, 1)

# Casos Tipicos com parametrize: (Mesmos Casos de Tipicos acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem, k, esperado", [
    ("abc", 2, "cde"),              # Minúsculas
    ("ABC", 2, "CDE"),              # Maiúsculas
    ("AbC", 2, "CdE"),              # Mistura de maiúsculas e minúsculas
    ("Oi 123!", 2, "Qk 123!")       # Com espaços e números
])
def test_cripto_parametrize(mensagem, k, esperado):
    assert cripto_cesar(mensagem, k) == esperado

#Casos de borda com parametrize: (Mesmos Casos de Bordas acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem, k, esperado", [
    (" ", 2, " "),                  # String vazia (apenas espaço)
    ("Morder", 0, "Morder"),        # k = 0
    ("DEF", -3, "ABC"),             # k negativo
    ("Zz", 1, "Aa"),                # Última letra do alfabeto
    ("abc", 27, "bcd"),             # k grande
    ("!@$%&*", 3, "!@$%&*")         # Apenas símbolos
])
def test_cripto_borda_parametrize(mensagem, k, esperado):
    assert cripto_cesar(mensagem, k) == esperado

# Exceções com parametrize: (Mesmos Casos de Exceções acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem, k", [
    (123, 1),       # Mensagem não é string
    ("abc", "1"),   # k não é inteiro
    (None, 1)       # Mensagem é None
])
def test_cripto_excecoes_parametrize(mensagem, k):
    with pytest.raises(TypeError):
        cripto_cesar(mensagem, k)