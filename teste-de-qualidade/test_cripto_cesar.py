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

def test_k_grande():
    assert cripto_cesar("abc", 27) == "bcd"

# Exceções:

def test_mensagem_nao_string():
    with pytest.raises(TypeError):
        cripto_cesar(123, 1)

def test_k_nao_inteiro():
    with pytest.raises(TypeError):
        cripto_cesar("abc", "1")

def test_mensagem_none():
    with pytest.raises(TypeError):
        cripto_cesar(None, 3)

# Casos Tipicos com parametrize: (Mesmos Casos de Tipicos acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k,esperado", [
    ("ABC", 3, "DEF"),             # Maiúsculas
    ("abc", 3, "def"),             # Minúsculas
    ("AbC", 3, "DeF"),             # Mistura de maiúsculas e minúsculas
    ("Oi 123!", 5, "Tn 123!"),     # Caracteres não alfabéticos e Números
])
def test_cripto_cesar_casos_tipicos(mensagem, k, esperado):
    assert cripto_cesar(mensagem, k) == esperado

#Casos de borda com parametrize: (Mesmos Casos de Bordas acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k,esperado", [
    ("", 5, ""),              # String vazia
    ("abc", 0, "abc"),        # k = 0
    ("bcd", -1, "abc"),       # k negativo
    ("abc", 27, "bcd"),       # k maior que 26
])
def test_cripto_cesar_borda(mensagem, k, esperado):
    assert cripto_cesar(mensagem, k) == esperado

#Exceções com parametrize: (Mesmos Casos de Exceções acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k,esperado", [
    (123, 1, "TypeError"),        # Mensagem não é string
    ("abc", "1", "TypeError"),     # k não é inteiro
    (None, 3, "TypeError"),        # Mensagem é None
])
def test_cripto_cesar_excecoes(mensagem, k, esperado):
    with pytest.raises(TypeError):
        cripto_cesar(mensagem, k)