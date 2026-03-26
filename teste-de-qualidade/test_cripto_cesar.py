import pytest
from mod_jvbb2004 import cripto_cesar

# Casos Tipicos com parametrize:

@pytest.mark.parametrize("mensagem, k, esperado", [
    ("abc", 2, "cde"),              # Minúsculas
    ("ABC", 2, "CDE"),              # Maiúsculas
    ("AbC", 2, "CdE"),              # Mistura de maiúsculas e minúsculas
    ("Oi 123!", 2, "Qk 123!")       # Com espaços e números
])
def test_cripto_parametrize(mensagem, k, esperado):
    assert cripto_cesar(mensagem, k) == esperado

#Casos de borda com parametrize:

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

# Exceções com parametrize:

@pytest.mark.parametrize("mensagem, k", [
    (123, 1),       # Mensagem não é string
    ("abc", "1"),   # k não é inteiro
    (None, 1)       # Mensagem é None
])
def test_cripto_excecoes_parametrize(mensagem, k):
    with pytest.raises(TypeError):
        cripto_cesar(mensagem, k)