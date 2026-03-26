import pytest
from mod_jvbb2004 import decripto_cesar, cripto_cesar

# Casos Tipicos com parametrize:

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

#Casos de borda com parametrize:

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

# Exceções com parametrize:

@pytest.mark.parametrize("mensagem,k", [
    (123, 1),              # mensagem não é string
    ("abc", "1"),          # k não é inteiro
    (None, 3),             # mensagem é None
    (True, 1)              # Boolean
])
def test_decripto_cesar_excecoes(mensagem, k):
    with pytest.raises(TypeError):
        decripto_cesar(mensagem, k)