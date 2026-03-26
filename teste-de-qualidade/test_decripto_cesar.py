import pytest
from mod_jvbb2004 import decripto_cesar, cripto_cesar

# Casos Tipicos: 

def test_decripto_minusculas():
    mensagem = "abc"
    k = 2
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_maiusculas():
    mensagem = "ABC"
    k = 2
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_mista():
    mensagem = "AbC"
    k = 2
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_espacos_e_numeros():
    mensagem = "Oi 123!"
    k = 2
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

# Casos de borda:

def test_decripto_string_vazia():
    mensagem = " "
    k = 2
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_k_zerado():
    mensagem = "Morder"
    k = 0
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_k_negativo():
    mensagem = "DEF"
    k = -3
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_ultima_letra_alfabeto():
    mensagem = "Zz"
    k = 1
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_somenteSimbolos():
    mensagem = "!@$%&*"
    k = 3
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

def test_decripto_k_grande():
    mensagem = "abc"
    k = 27
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

# Exceções: (Utilizando pytest.raises)

def test_decripto_mensagem_nao_string():
    with pytest.raises(TypeError):
        decripto_cesar(123, 1)

def test_decripto_k_nao_inteiro():
    with pytest.raises(TypeError):
        decripto_cesar("abc", "1")

def test_decripto_mensagem_none():
    with pytest.raises(TypeError):
        decripto_cesar(None, 3)

# Casos Tipicos com parametrize: (Mesmos Casos de Tipicos acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k", [
    ("abc", 2),             # Minúsculas
    ("ABC", 2),             # Maiúsculas
    ("AbC", 2),             # Mistura de maiúsculas e minúsculas
    ("Oi 123!", 2),         # Caracteres não alfabéticos e Números
])
def test_decripto_cesar_casos_tipicos(mensagem, k):
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

#Casos de borda com parametrize: (Mesmos Casos de Bordas acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k", [
    ("", 2),              # String vazia
    ("Morder", 0),        # k = 0
    ("DEF", -3),          # k negativo
    ("Zz", 1),            # Última letra do alfabeto
    ("!@$%&*", 3),        # Apenas símbolos
    ("abc", 27),          # k grande
])
def test_decripto_cesar_casos_de_borda(mensagem, k):
    criptografado = cripto_cesar(mensagem, k)
    resultado = decripto_cesar(criptografado, k)
    assert resultado == mensagem

# Exceções com parametrize: (Mesmos Casos de Exceções acima, mas usando parametrize)

@pytest.mark.parametrize("mensagem,k", [
    (123, 1),              # mensagem não é string
    ("abc", "1"),          # k não é inteiro
    (None, 3),             # mensagem é None
])
def test_decripto_cesar_excecoes(mensagem, k):
    with pytest.raises(TypeError):
        decripto_cesar(mensagem, k)